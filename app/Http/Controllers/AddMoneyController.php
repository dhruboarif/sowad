<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneralSettings;
use App\Models\CashWallet;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\ClubWallet;

use Carbon\Carbon;

class AddMoneyController extends Controller
{
     public function BalanceAdjust()
  {
    $adjusts= AddMoney::where('method','Adjustment')->get();
    return view('admin.pages.balance_adjust',compact('adjusts'));
  }
  public function BalanceAdjustStore(Request $request)
  {
    $user_adjust_id = User::where('user_name', $request->user_id)->pluck('id')->first();
    if($request->wallet == 'deposit_wallet')
    {
        $adjust = new AddMoney();
    $adjust->user_id = $user_adjust_id;
    $adjust->received_from= Auth::id();
    $adjust->amount = $request->amount;
    $adjust->method = 'Adjustment';
    $adjust->type = 'Credit';
    // $adjust->note = 'Bonus';
    $adjust->status = 'approve';
    $adjust->created_at = Carbon::now();
    $adjust->save();
        
    }else 
    {
         $adjust = new CashWallet();
    $adjust->user_id = $user_adjust_id;
    $adjust->received_from= Auth::id();
    $adjust->bonus_amount = $request->amount;
    $adjust->method = 'Adjustment';
    $adjust->type = 'Credit';
     $adjust->note = 'Bonus';
   // $adjust->status = 'approve';
    $adjust->created_at = Carbon::now();
    $adjust->save();
    }
    

    return back()->with('Money_Adjust', 'Money Adjusted Successfully!!');
  }
  public function BalanceDeductStore(Request $request)
  {
    $user_adjust_id = User::where('user_name', $request->user_id)->pluck('id')->first();
    if($request->wallet == 'deposit_wallet')
    {
        $adjust = new AddMoney();
    $adjust->user_id = $user_adjust_id;
    $adjust->received_from= Auth::id();
    $adjust->amount = -($request->amount);
    $adjust->method = 'Adjustment';
    $adjust->type = 'Debit';
    // $adjust->note = 'Bonus';
    $adjust->status = 'approve';
    $adjust->created_at = Carbon::now();
    $adjust->save();
    }else 
    {
        $adjust = new CashWallet();
    $adjust->user_id = $user_adjust_id;
    $adjust->received_from= Auth::id();
    $adjust->bonus_amount = -($request->amount);
    $adjust->method = 'Adjustment';
    $adjust->type = 'Debit';
     $adjust->note = 'Bonus';
   // $adjust->status = 'approve';
    $adjust->created_at = Carbon::now();
    $adjust->save();
    }
        
    
    

    return back()->with('Money_Adjust', 'Money Deducted Successfully!!');
  }
  public function Store(Request $request)
  {
    //dd($request);
      $request->validate([
      'amount' => 'required',
      'method' => 'required',

  ]);
    $user_id = $request->user_id;
    $amount = $request->amount;
    //$method=$request->method;
    $txn_id=$request->txn_id;
    $deposit = new AddMoney();
    $deposit-> user_id = $user_id;
    $deposit-> amount =$amount;
    //$deposit->method=$method;
    $deposit->method='Deposit';
    $deposit->txn_id=$txn_id;
    $deposit->save();

    return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
  }


    public function moneyTransfer(Request $request)
    {
        //dd($request);
        $request->validate([

            'user_id' => 'required',
            'amount' => 'required',

        ]);

        $g_set = GeneralSettings::first();
        
        $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
        $calculated_amount= ($request->amount+ ($request->amount)*$g_set->transfer_charge/100);
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);
        if($request->amount < 0)
        {
             return back()->with('error', 'Incorrect value');
        }else{
             if ($sum_deposit < $calculated_amount) {

          return back()->with('error', 'Insufficient Balance');

        }
        else 
        {
             $user= User::where('user_name',$request->user_id)->first('id');
        //dd($user->id);
        $deduct = new AddMoney;
        $deduct->user_id = Auth::id();
        $deduct->receiver_id=$user->id;
        $deduct->amount = -($request->amount+ ($request->amount)*$g_set->transfer_charge/100);
        $deduct->method ='Transfer';
        $deduct->type ='Debit';
        $deduct->status ='approve';
        $deduct->save();

        $deposit = new AddMoney;
        $deposit->user_id = $user->id;
      //  $deposit->receiver_id=$request->user_id;

        $deposit->amount =$request->amount;
        $deposit->received_from= Auth::id();
        $deposit->method ='Transfer';
        $deposit->type ='Credit';
        $deposit->status ='approve';
        $deposit->save();
        return back()->with('Money_Transfered','Money Transfer Successfully!!');
        }
        }

       
       
    }
    public function walletTransfer(Request $request)
    {
        //dd($request);
        $request->validate([

            'user_id' => 'required',
            'bonus_amount' => 'required',

        ]);
        $g_set = GeneralSettings::first();

        $sum_deposit=CashWallet::where('user_id',Auth::id())->sum('bonus_amount');
        $calculated_amount= ($request->bonus_amount+ ($request->bonus_amount)*$g_set->transfer_charge/100);
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

        if ($sum_deposit < $calculated_amount) {
            return back()->with('error', 'Insufficient Balance');
          //  throw new \Exception("Insufficient Balance", 200);
        }else{
             $user= User::where('user_name',$request->user_id)->first('id');
        $deduct = new CashWallet;
        $deduct->user_id = Auth::id();
        $deduct->receiver_id=$user->id;

        $deduct->bonus_amount = -($request->bonus_amount+ ($request->bonus_amount)*$g_set->transfer_charge/100);
        $deduct->method ='Transfer';
        $deduct->type ='Debit';
        $deduct->status ='approve';
        $deduct->save();

        $deposit_cash_wallet = new CashWallet;
        $deposit_cash_wallet->user_id = $user->id;
        $deposit_cash_wallet->bonus_amount =$request->bonus_amount;
        $deposit_cash_wallet->received_from= Auth::id();
        $deposit_cash_wallet->method ='Transfer';
        $deposit_cash_wallet->type ='Credit';
        $deposit_cash_wallet->status ='approve';
        $deposit_cash_wallet->save();
        return back()->with('Money_Transfered','Money Transfer Successfully!!');
        }
        
    }
    public function walletWithdraw(Request $request)
    {
        $request->validate([

            'user_id' => 'required',
            'amount' => 'required',

        ]);
        $g_set = GeneralSettings::first();
        if($g_set->withdraw_setting == 0)
            {
                  return back()->with('error', 'You Can not make a withdraw request now. Please contact with admininistration');
            }else
            {
                $sum_deposit=CashWallet::where('user_id',Auth::id())->sum('bonus_amount');
        $calculated_amount= ($request->amount+ ($request->amount)*$g_set->withdraw_charge/100);
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);
        if($request->amount < 0 )
        {
             return back()->with('error', 'Incorrect value');
        }else{
                    if ($sum_deposit < $calculated_amount) {
          return back()->with('error', 'Insufficient Balance');
          //  throw new \Exception("Insufficient Balance", 200);
        }else{
            
              $user_id = $request->user_id;
        $amount = $request->amount;
        $payment_method_id=$request->payment_method_id;

        $withdraw = new Withdraw();
        $withdraw-> user_id = $user_id;
        $withdraw-> amount =$amount;
        $withdraw->payment_method_id=$payment_method_id;


        $withdraw->save();

        $deduct = new Cashwallet;
        $deduct->user_id = Auth::id();
        $deduct->bonus_amount = -($request->amount+ ($request->amount)*$g_set->withdraw_charge/100);
        $deduct->method ='Withdraw';

        $deduct->status ='pending';
        $deduct->save();
        }

      

        return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
        }


            }

        
    }
    public function DistributeBonus(Request $request)
    {
      $amount= ClubWallet::sum('amount');
      //dd($amount);
      if ($amount > 0) {
      $users= User::where('membership',1)->get();
      $user_count= User::where('membership',1)->count();
      foreach ($users as $user) {
        $bonus_amount = new CashWallet();
        $bonus_amount->user_id = $user->id;
        //$bonus_amount->received_from = Auth::id();
        //$bonus_amount->package_id =   $request['package_id'];

        $bonus_amount->bonus_amount = $amount/$user_count;
        $bonus_amount->method = 'Club Bonus';
        $bonus_amount->note = 'Bonus';
        $bonus_amount->save();

      }

      $deduct_amount= new ClubWallet();
      $deduct_amount->amount= -($amount);
      //$deduct_amount->received_from= $request->user_id;
      $deduct_amount->type= 'Debit';
      $deduct_amount->save();
        return back()->with('Money_added','Club Bonus Distributed Successfully!!');
      }else {
          return back()->with('Money_added','You don not have sufficient Balance!!');
      }
    }
    
}
