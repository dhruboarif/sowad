<?php


namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\AddMoney;
use App\Models\CashWallet;
use App\Models\Package;
use App\Models\GeneralSettings;
use App\Models\PairCount;
use App\Notifications\UserCredential;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Storage;

use Facade\FlareClient\Http\Response;
use App\Models\Purchase;
use App\Exceptions\GeneralException;
//use Alert;
use App\Models\ClubSetting;
use App\Models\ClubWallet;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


class ReferralController extends Controller implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

  public function __construct(StatefulGuard $guard)
  {

      //session()->put('checkout', true);

      $this->guard = $guard;
  }
  public function Activation($id)
  {
    $data['user']=User::all();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
    $user= User::where('id',Auth::id())->first();
    return view('users.pages.activation',compact('user','data'));
  }
    public function index($id)
    {
      //  $users = User::where('package_id')->get()->toArray();
      //  dd($user['packages']);
        //dd($id,Auth::id());
      //  $g_set = GeneralSettings::first();
       //$data=$g_set['royality_bonus'];
       //$data=$g_set->pair_percentage;
       //dd($data);
      $users=User::where('sponsor',Auth::id())->get();


      return view('users.pages.referrals',compact('users'));
    }
    public function MyTeam(User $query,$id)
    {

        $user = User::where('id', $id)->first();
        //$allChildren = User::pluck('name','id')->all();
        return view('users.pages.my-team',compact(['user']));
    }


    public function checkPosition(Request $request){
      //dd($request->all());
        $userName = User::where('user_name',$request['sponsor'])->pluck('user_name')->first();


        $check_position = User::where('placement_id',$userName)->where('position',$request['position'])->orderBy('id','desc')->first();

        if(is_null($check_position)){
            $first = User::where('user_name',$userName)->orderBy('id','desc')->first();
            return  $first->user_name;
        }else{
            $all = $check_position->childrenRecursive;
        }


        // loop through category ids and find all child categories until there are no more

        if(count($all)>0)
        {
            foreach($all as $subcat){
                if(count($subcat->childrenRecursive) > 0){
                    //dd($subcat->childrenRecursive());
                    foreach ($subcat->childrenRecursive as $item){
                       return $this->check($item);
                    }
                }else{
                    return $subcat->user_name;
                }
            }
            //dd($all);
        }
        else
        {
            return $check_position->user_name;
        }

    }
   public function check($subcat){
       if(count($subcat->childrenRecursive) > 0){
           foreach ($subcat->childrenRecursive as $item){
           return  $this->check($item);
               //return $item->user_name;
           }
       }else{
           return $subcat->user_name;
       }

   }
   public function getSponsor(Request $request)
   {
   //dd($request->all());
       $userName = User::where('user_name','like',$request->search)->first();
       //dd($userName);

       if ($userName){
         //dd($userName['user_name']);
           return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName['user_name']],200);
       }else{
        // dd('userName');
           return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
       }

   }
   public function getUser(Request $request)
   {
   //dd($request->all());
       $userName = User::where('user_name','like',$request->search)->first();
        //dd($userName);

       if ($userName){
         //dd($userName['user_name']);
           return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName['user_name']],200);
       }else{
        // dd('userName');
           return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
       }

   }


    public function UserActivation(Request $request)
    {





            DB::transaction(function() use ($request){

               $sponsor_amount = Package::find($request['package_id']);
                $activation= GeneralSettings::select('activation_charge')->first();

                $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
                $calculated_amount= ($sponsor_amount->price + ($sponsor_amount->price * $activation->activation_charge/100));
                //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

                if ($sum_deposit < $calculated_amount) {

                   // throw new \Exception("Insufficient Balance", 404);
                    return back()->with('error', 'Insufficient Balance');
                };
                 
                $user_data=User::where('id',Auth::id())->get()->first();
                //dd($user_data->placement_id);
                $this->binary_count($user_data->placement_id,$user_data->position,$sponsor_amount->price);
              //  dd($sponsor_amount);
                $referral_bonus= GeneralSettings::select('referral_percentage')->first();
               
                $sponsor =  User::where('id',$request['user_id'])->first();
               // dd($sponsor->sponsor);


                $activation= GeneralSettings::select('activation_charge')->first();
                $wallet_amount = new AddMoney();
                $wallet_amount->user_id = Auth::id();
                $wallet_amount->amount = -($sponsor_amount->price + ($sponsor_amount->price * $activation->activation_charge/100));
                $wallet_amount->method = 'Activation Charge';
                $wallet_amount->status = 'approve';
                $wallet_amount->created_at = Carbon::now();
                $wallet_amount->save();

                $activate= User::find($request->user_id);
                
                $activate->status = 1;
                $activate->save();

                $purchase= new Purchase();
                $purchase->user_id= $request->user_id;
                $purchase->package_id= $request->package_id;
                $purchase->date= Carbon::now();
                $purchase->save();


                $status= User::where('id',$sponsor->sponsor)->first();
                //dd($status);
                if($status->status == 1)
                {
                $bonus_amount = new CashWallet();
                $bonus_amount->user_id = $sponsor->sponsor;
                $bonus_amount->received_from = Auth::id();
                $bonus_amount->package_id =   $request['package_id'];

                $bonus_amount->bonus_amount = (($sponsor_amount->price)* $referral_bonus->referral_percentage)/100;
                $bonus_amount->method = 'Sponsor Bonus';
                $bonus_amount->note = 'Bonus';
                $bonus_amount->save();
                }
                
         $g_set = GeneralSettings::first();
         
          if($g_set->level_settings == 1)
                {
                      $received_user= User::where('id',$request->user_id)->first();
                $lvl_1=User::where('id',$request->user_id)->first();
                //dd($lvl_1->placement_id);
                $lvl_1_placement= User::where('user_name',$lvl_1->placement_id)->first();
                 $user_pckg_id= Package::where('id',$request->package_id)->first();
                
                //dd($lvl_1_placement);
               
                if($lvl_1_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_1_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_1/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 1;
                                $bonus_amount->description= ($user_pckg_id->price * ($g_set->level_1/100)).' BDT'. ' Level 1 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                $lvl_2= User::where('user_name',$lvl_1_placement->placement_id)->first();
                //dd($lvl_2);
                 if($lvl_2->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_2->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_2/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 2;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_2/100) .' BDT'. ' Level 2 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                
                $lvl_3= User::where('id',$lvl_2->id)->first();
                
                $lvl_3_placement= User::where('user_name',$lvl_3->placement_id)->first();
               // dd($lvl_3_placement);
                if($lvl_3_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_3_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_3/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 3;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_3/100) .' BDT'. ' Level 3 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                
                
                $lvl_4= User::where('id',$lvl_3_placement->id)->first();
                 $lvl_4_placement= User::where('user_name',$lvl_4->placement_id)->first();
                  if($lvl_4_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_4_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_4/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 4;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_4/100) .' BDT'. ' Level 4 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                
                 $lvl_5= User::where('id',$lvl_4_placement->id)->first();
                 $lvl_5_placement= User::where('user_name',$lvl_5->placement_id)->first();
                  if($lvl_5_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_5_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_5/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 5;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_5/100) .' BDT'. ' Level 5 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                 $lvl_6= User::where('id',$lvl_5_placement->id)->first();
                 $lvl_6_placement= User::where('user_name',$lvl_6->placement_id)->first();
                  if($lvl_6_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_6_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_6/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 6;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_6/100) .' BDT'. ' Level 6 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                $lvl_7= User::where('id',$lvl_6_placement->id)->first();
                 $lvl_7_placement= User::where('user_name',$lvl_7->placement_id)->first();
                  if($lvl_7_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_7_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_7/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 7;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_7/100) .' BDT'. ' Level 7 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                 $lvl_8= User::where('id',$lvl_7_placement->id)->first();
                 $lvl_8_placement= User::where('user_name',$lvl_8->placement_id)->first();
                  if($lvl_8_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_8_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_8/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 8;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_8/100) .' BDT'. ' Level 8 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                 $lvl_9= User::where('id',$lvl_8_placement->id)->first();
                 $lvl_9_placement= User::where('user_name',$lvl_9->placement_id)->first();
                  if($lvl_9_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_9_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_9/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 9;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_9/100) .' BDT'. ' Level 9 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                $lvl_10= User::where('id',$lvl_9_placement->id)->first();
                 $lvl_10_placement= User::where('user_name',$lvl_10->placement_id)->first();
                  if($lvl_10_placement->status == 1)
                {
                    
                     $bonus_amount = new CashWallet();
                                $bonus_amount->user_id = $lvl_10_placement->id;
                                $bonus_amount->bonus_amount = $user_pckg_id->price * ($g_set->level_10/100);
                                $bonus_amount->method = 'Level Bonus';
                                $bonus_amount->level= 10;
                                $bonus_amount->description= $user_pckg_id->price * ($g_set->level_10/100) .' BDT'. ' Level 10 Bonus Credited from '. $received_user->user_name;
                                $bonus_amount->received_from = $request->user_id;
                                $bonus_amount->note = 'Bonus';
                                $bonus_amount->save();
                }
                }
                
              
                
                  $member= User::where('id',$sponsor->sponsor)->first();
                $member_count= User::where('sponsor',$sponsor->sponsor)->where('status',1)->count();
                $club= ClubSetting::first();
                $sponsor_count= $club->sponsor_count;
                //dd($sponsor_count);
                //dd($member,$member_count);
                if($member_count >= ($sponsor_count - 1))
                {
                  $membership= User::find($member->id);
                  //dd($membership);
                  $membership->membership=1;
                  $membership->save();
                }

                $club_wallet= new ClubWallet();
                $club_wallet->amount= $club->amount_wallet;
                $club_wallet->received_from= $request->user_id;
                $club_wallet->type= 'Credit';
                $club_wallet->save();
                
                
                
                
               
                
               


              //  $data->notify(new UserCredential($email_data));
                Session::flash('success','Package has been Successfully Activated!!');


            });

       // Alert::success('Success', 'User has been Successfully Registered!!');
        // return response()->json(['success'=>'User has been Successfully Registered!!'],200);
        return Redirect()->back();

    }


  
  
  public function UserAdd1(Request $request)
  {
    dd($request);
    $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    //dd($sponsor->id);
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->sponsor= $sponsor->id;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
     $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd2(Request $request)
  {
   dd($request);
    $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
   // dd($sponsor->id);
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->sponsor= $sponsor->id;
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd3(Request $request)
  {
    dd($request);
    $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    //dd($sponsor->id);
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
     $new_user->sponsor= $sponsor->id;
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd4(Request $request)
  {
    dd($request);
   $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
     $new_user->sponsor= $sponsor->id;
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd5(Request $request)
  {
    dd($request);
     $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
     $new_user->sponsor= $sponsor->id;
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd6(Request $request)
  {
    dd($request);
     $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
     $new_user->sponsor= $sponsor->id;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd7(Request $request)
  {
    /dd($request);
    $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
       $new_user->sponsor= $sponsor->id;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd8(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
      $new_user->sponsor= $sponsor->id;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd9(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
      $new_user->sponsor= $sponsor->id;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd10(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
      $new_user->sponsor= $sponsor->id;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd11(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
      $new_user->sponsor= $sponsor->id;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd12(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
     $new_user->sponsor= $sponsor->id;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 2;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd13(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
      $new_user->sponsor= $sponsor->id;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 1;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }
  public function UserAdd14(Request $request)
  {
    dd($request);
      $sponsor =  User::where('user_name','like',$request['sponsor'])->select('id','user_name')->first();
    $new_user= new User();
    $new_user->name= $request->name;
    $new_user->user_name= $request->user_name;
    $new_user->email= $request->email;
    $new_user->password= Hash::make($request['password']);
    $new_user->country= $request->country;
    $new_user->status= 0;
    $new_user->position= 2;
     $new_user->sponsor= $sponsor->id;
    $new_user->placement_id= $request->placement_id;
    $new_user->number= $request->number;
    $new_user->save();
    $email = $request->email;
      Mail::to($email)->send(new WelcomeMail($new_user));
    return back()->with('user_added','User Registered  successfully');

  }


    public function binary_count($placement_id,$pos,$planAmount)
    {
      if ($pos == 1){
          $pos = 'left_count';
          $pos_ac = 'left_active';
          $totalamount= 'left_total';
      }else{
          $pos = 'right_count';
          $pos_ac = 'right_active';
          $totalamount= 'right_total';
      }

        while($placement_id != '' && $pos != ''){

            DB::statement("UPDATE users SET $totalamount = `$totalamount`+$planAmount WHERE user_name = '$placement_id'");
            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");
            DB::statement("UPDATE users SET $pos_ac = `$pos_ac`+$planAmount WHERE user_name = '$placement_id'");

            $this->is_pair_generate($placement_id);
            $pos= $this->find_position_id($placement_id);
            $pos_ac= $this->find_active_position_id($placement_id);
            $placement_id= $this->find_placement_id($placement_id);

        }

    }
    public function find_position_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            $pos= $user_id->position;
            if ($pos == 1){
                $pos = 'left_count';
            }elseif($pos == 2){
                $pos = 'right_count';
            }

            return $pos;

    }
    public function find_placement_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            return $user_id->placement_id;
    }
    public function find_active_position_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        $pos_ac= $user_id->position;
        if ($pos_ac == 1){
            $pos_ac = 'left_active';
        }elseif($pos_ac == 2){
            $pos_ac = 'right_active';
        }

        return $pos_ac;

    }

    public function is_pair_generate($placement_id)
    {

        $user = User::where('user_name',$placement_id)->first();

        if ($user->left_count == $user->right_count){
            $data = PairCount::where('user_id',$user->id)->where('date',Carbon::today())->get()->toArray();
            $date= date('Y-m-d');
            if(count($data) > 0){
               DB::statement("UPDATE pair_counts SET no_of_pair = `no_of_pair`+1 WHERE date = '$date' and user_id = '$user->id'");
            //    DB::statement("UPDATE pair_counts SET no_of_pair = '$user->right_count' WHERE date = '$date' and user_id = '$user->id'");
            }else{
                $insert= new PairCount();
                $insert->user_id = $user->id;
                $insert->date = Carbon::today();
                $insert->no_of_pair = 1;
                $insert->save();
            }
        }

    }
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd('hel');
        /* Validator::make($input, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           //'password' => $this->passwordRules(),
             'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
         ])->validate();*/
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr(str_shuffle($chars), 0, 10);
        $email_data['email']=$input['email'];
        $email_data['name']=$input['name'];
        $email_data['user_name']=$input['user_name'];
        $email_data['password']=$password;

        $data= User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'number' => $input['number'],

            'country' => $input['country'],

            'sponsor' => $input['sponsor'],
            'position' => $input['position'],
            'package_id' => $input['package_id'],
            'password' => Hash::make($password),

        ]);

        $data->notify(new UserCredential($email_data));

    }
    public function UpdateUser(Request $request)
    {
      //dd($request);
      $address = $request->address;
      $name=$request->name;
      $number=$request->number;
      $national_id=$request->national_id;
      $birth=$request->birth;
      $gender=$request->gender;
      $nominee = $request->nominee;
      $nominee_email = $request->nominee_email;
      $image=$request->file('file');
      $filename=null;
      if ($image) {
          $filename = time() . $image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              '/User',
              $image,
              $filename
          );
      }


      $user = User::find(Auth::user()->id);
      $user->address = $address;
      $user->name =$name;
      $user->number =$number;
      $user->birth =$birth;
      $user->gender =$gender;
      $user->nominee =$nominee;
      $user->national_id=$national_id;
      $user->nominee_email =$nominee_email;
      $user->image=$filename;

      $user->save();

        return back()->with('profile_updated','Profile has been updated successfully!');
    }
    public function changePassStore(Request $request){
      $request->validate([
          'old_password' => 'required',
          'new_password' => 'required|min:5',
          'password_confirmation' => 'required|min:5',
      ]);
      $db_pass = Auth::user()->password;
      $current_password = $request->old_password;
      $newpass = $request->new_password;
      $confirmpass = $request->password_confirmation;

     if (Hash::check($current_password,$db_pass)) {
      if ($newpass === $confirmpass) {
          User::findOrFail(Auth::id())->update([
            'password' => Hash::make($newpass)
          ]);

          Auth::logout();
          $notification=array(
            'message'=>'Your Password Change Success. Now Login With New Password',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notification);

      }else {

        $notification=array(
            'message'=>'New Password And Confirm Password Not Same',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
   }else {
    $notification=array(
        'message'=>'Old Password Not Match',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);
   }
  }
  public function UserRestrict(Request $request)
  {
    $user= User::find($request->id);
    $user->block= 1;
    $user->status= 0;
    $user->save();
      return back()->with('user_restricted','User has been successfully restricted!!!');
  }
  public function UserunRestrict(Request $request)
  {
    $user= User::find($request->id);
    $user->block= 0;
    $user->status= 1;
    $user->save();
      return back()->with('user_restricted','User has been successfully unrestricted!!!');
  }
  public function AddMember(Request $request)
  {
      //dd($request);
      $user_id= User::where('user_name',$request->user_id)->first();
    $user= User::find($user_id->id);
    //dd($user);
    $user->membership= 1;
   // $user->status= 0;
    $user->save();
      return back()->with('Money_added','User has been successfully Added to Club Member!!!');
  }
}
