<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Illuminate\Support\Facades\Auth;
use App\Models\CashWallet;
use App\Models\Withdraw;
use App\Models\Rank;
use App\Models\UserRank;
use App\Models\GeneralSettings;
use App\Models\Purchase;

class UserDashboardController extends Controller
{
  public function __construct()
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
  }
    public function index($id)
    {
    // $users=User::where('sponsor',Auth::id())->select('package_id')->get();


    //  dd($users);

      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      //dd($data);

      return view('users.pages.index',compact('data'));
    }
    public function registration($id)
    {
      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      return view('users.pages.registration',compact('data'));
    }
    public function Manage($id)
    {
      $users=User::where('sponsor',Auth::id())->get();
      return view('users.pages.registration_history',compact('users'));
    }
    public function sponsor_bonus($id)
    {
      $incomeData = CashWallet::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get();
      return view('users.pages.sponsor_bonus',compact('incomeData'));
    }
    public function daily_bonus($id)
    {
        $incomeData = CashWallet::where('user_id',Auth::id())->where('method','daily bonus')->get();
      return view('users.pages.daily_revenue_history',compact('incomeData'));
    }
    public function royality_bonus($id)
    {
      $incomeData = CashWallet::where('user_id',Auth::id())->where('method','royality sponsor bonus')->get();
      return view('users.pages.royality_bonus_history',compact('incomeData'));
    }
    public function level_bonus($id)
    {
        $incomeData = CashWallet::where('user_id',Auth::id())->where('method','Level Bonus')->get();
      return view('users.pages.level_bonus_history',compact('incomeData'));
    }
    public function pair_bonus($id)
    {
      $incomeData = CashWallet::where('user_id',Auth::id())->where('method','Pair Bonus')->get();
      return view('users.pages.pair_bonus_history',compact('incomeData'));
    }
    public function team_bonus($id)
    {
        $incomeData = CashWallet::where('user_id',Auth::id())->where('method','Team Bonus')->get();
      return view('users.pages.team_bonus_history',compact('incomeData'));
    }
    public function club_bonus($id)
    {
      $incomeData = CashWallet::where('user_id',Auth::id())->where('method','Club Bonus')->get();
      return view('users.pages.club_bonus_history',compact('incomeData'));
    }
    public function withdraw_history($id)
    {
      $withdraw=Withdraw::where('user_id',Auth::id())->get();
      return view('users.pages.withdraw_history',compact('withdraw'));
    }
    public function transfer_history($id)
    {
      $users=User::all();
      return view('users.pages.transfer_history',compact('users'));
    }
  public function MyRank($id)
    {
        $ranks= Rank::where('status',1)->get();
        return view('users.pages.my_rank',compact('ranks'));
    }
    public function ClaimRank(Request $request)
    {
      $user= User::find($request->user_id);
      $user->my_rank=$request->rank_name;
      $user->rank= $user->rank + 1;
      $user->save();
      $rank= new UserRank();
      $rank->user_id= $request->user_id;
      $rank->rank_id= $request->rank_id;
      $rank->save();
        return back()->with('rank_claimed','Successfully claimed the bonus. Wait for confirmation!!!');

    }
    public function purchase_history($id)
    {
      $purchases=Purchase::where('user_id',Auth::id())->get();
      return view('users.pages.purchase_history',compact('purchases'));
    }

}
