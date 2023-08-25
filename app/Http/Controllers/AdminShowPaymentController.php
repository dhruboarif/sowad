<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\Withdraw;
use App\Models\UserRank;

class AdminShowPaymentController extends Controller
{
    public function Manage()
    {
      $deposit= AddMoney::all();

      return view('admin.pages.deposit_request.manage',compact('deposit'));

    }
    public function approve($id)
    {
        AddMoney::findOrFail($id)->update([
            'status'=>'approve'
        ]);
        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        AddMoney::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Request Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function WithdrawManage()
    {
      $withdraw= Withdraw::all();

      return view('admin.pages.deposit_request.withdraw',compact('withdraw'));

    }
    public function Withdrawapprove($id)
    {
        Withdraw::findOrFail($id)->update([
            'status'=>'approve'
        ]);
        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function Withdrawdestroy($id)
    {
        Withdraw::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Request Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function ManageRankBonus()
    {
      $ranks= UserRank::all();
      return view('admin.pages.rank_bonus_request',compact('ranks'));
    }
    public function RankApprove($id)
    {
      $rank= UserRank::find($id);
      $rank->status= 'approve';
      $rank->save();
      return back()->with('rank_accepted','Request has been approved successfully!');
    }
    public function RankReject($id)
    {
      $rank= UserRank::find($id);
      $rank->status= 'rejected';
      $rank->save();
      return back()->with('rank_rejected','Request has been rejected successfully!');
    }

    

}
