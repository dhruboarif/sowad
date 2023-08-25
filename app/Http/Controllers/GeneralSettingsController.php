<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Models\User;
use App\Models\ClubSetting;
use App\Models\Rank;
use Illuminate\Support\Facades\Hash;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $row=GeneralSettings::first();
      return view('admin.pages.settings.general_settings',compact('row'));
    }
    public function Store(Request $request)
    {
      //dd($request);

      $referral_percentage = $request->referral_percentage;
      $pair_amount = $request->pair_amount;
      $pair_percentage=$request->pair_percentage;
      $royality_bonus=$request->royality_bonus;
      $min_withdraw=$request->min_withdraw;
      $withdraw_charge=$request->withdraw_charge;
      $min_transfer=$request->min_transfer;
      $activation_charge=$request->activation_charge;
      $transfer_charge=$request->transfer_charge;

      $level_1=$request->level_1;
      $level_2=$request->level_2;
      $level_3=$request->level_3;
      $level_4=$request->level_4;
      $level_5=$request->level_5;
        $level_6=$request->level_6;
          $level_7=$request->level_7;
            $level_8=$request->level_8;
              $level_9=$request->level_9;
                $level_10=$request->level_10;


      $g_settings = new GeneralSettings();
      $g_settings->referral_percentage = $referral_percentage;
      $g_settings->pair_amount =$pair_amount;
      $g_settings->royality_bonus =$royality_bonus;
      $g_settings->min_withdraw =$min_withdraw;
      $g_settings->withdraw_charge =$withdraw_charge;
      $g_settings->min_transfer =$min_transfer;
      $g_settings->activation_charge=$activation_charge;

      $g_settings->pair_percentage=$pair_percentage;
      $g_settings->transfer_charge=$transfer_charge;
      $g_settings->level_1=$level_1;
      $g_settings->level_2=$level_2;
      $g_settings->level_3=$level_3;
      $g_settings->level_4=$level_4;
      $g_settings->level_5=$level_5;
        $g_settings->level_6=$level_6;
          $g_settings->level_7=$level_7;
            $g_settings->level_8=$level_8;
              $g_settings->level_9=$level_9;
                $g_settings->level_10=$level_10;


      $g_settings->save();
      return back()->with('settings_added','Settings has been added successfully!');

    }
    public function Update(Request $request)
    {
      //dd($request);

      $referral_percentage = $request->referral_percentage;
      $pair_amount = $request->pair_amount;
      $pair_percentage=$request->pair_percentage;
      $royality_bonus=$request->royality_bonus;
      $min_withdraw=$request->min_withdraw;
      $withdraw_charge=$request->withdraw_charge;
      $min_transfer=$request->min_transfer;
      $activation_charge=$request->activation_charge;
      $transfer_charge=$request->transfer_charge;
      $level_1=$request->level_1;
      $level_2=$request->level_2;
      $level_3=$request->level_3;
      $level_4=$request->level_4;
      $level_5=$request->level_5;
      $level_6=$request->level_6;
        $level_7=$request->level_7;
          $level_8=$request->level_8;
            $level_9=$request->level_9;
              $level_10=$request->level_10;




      $g_settings = GeneralSettings::find($request->id);
      $g_settings->referral_percentage = $referral_percentage;
      $g_settings->pair_amount =$pair_amount;
      $g_settings->royality_bonus =$royality_bonus;
      $g_settings->min_withdraw =$min_withdraw;
      $g_settings->activation_charge=$activation_charge;
      $g_settings->withdraw_charge =$withdraw_charge;
      $g_settings->min_transfer =$min_transfer;

      $g_settings->pair_percentage=$pair_percentage;
      $g_settings->transfer_charge=$transfer_charge;
      $g_settings->level_1=$level_1;
      $g_settings->level_2=$level_2;
      $g_settings->level_3=$level_3;
      $g_settings->level_4=$level_4;
      $g_settings->level_5=$level_5;
      $g_settings->level_6=$level_6;
        $g_settings->level_7=$level_7;
          $g_settings->level_8=$level_8;
            $g_settings->level_9=$level_9;
              $g_settings->level_10=$level_10;
               $g_settings->currency=$request->currency;
                $g_settings->level_settings=$request->level_settings;
                $g_settings->withdraw_setting=$request->withdraw_setting;
                $g_settings->transfer_setting=$request->transfer_setting;
                 $g_settings->capping_pair_limit=$request->capping_pair_limit;


      $g_settings->save();

        return back()->with('settings_updated','Settings has been updated successfully!');
    }
    public function Delete($id)
    {
      $g_settings = GeneralSettings::find($id);

      $g_settings->delete();

    return back()->with('settings_deleted','Settings has been deleted successfully!');
    }
      public function UpdateUser(Request $request)
    {
      $user= User::find($request->id);
      $user->email= $request->email;
      $user->name= $request->name;
      $user->number= $request->number;
      $user->country= $request->country;
      $user->save();
        return back()->with('user_updated','User details has been updated successfully!');
    }
    public function changePassword(Request $request)
    {
      //dd($request->id)
      $newpass = $request->password;

      $upuser= User::find($request->id);
      $upuser->password = Hash::make($newpass);
      $upuser->save();


      return back()->with('password_updated','User Password has been updated successfully!');

    }
    public function ClubSettings()
    {
      $club= ClubSetting::first();
      return view('admin.pages.club_settings',compact('club'));
    }
    public function ClubSettingsUpdate(Request $request)
    {
      $club= ClubSetting::find($request->id);
      $club->sponsor_count= $request->sponsor_count;
      $club->amount_wallet= $request->amount_wallet;
      $club->save();
        return back()->with('club_updated','Club Settings has been updated successfully!');
    }
      public function RankSettings()
    {
      $ranks= Rank::all();
      return view('admin.pages.rank_settings',compact('ranks'));
    }
    public function StoreRank(Request $request)
    {
      //dd($request);
      $rank= new Rank();
      $rank->rank_name= $request->rank_name;
      $rank->matching=$request->matching;
      $rank->bonus= $request->bonus;
      $rank->save();
        return back()->with('rank_added','Rank Settings has been added successfully!');

    }
    public function UpdateRank(Request $request)
    {
      $rank= Rank::find($request->id);
      $rank->rank_name= $request->rank_name;
      $rank->matching=$request->matching;
      $rank->bonus= $request->bonus;
      $rank->status= $request->status;
      $rank->save();
      return back()->with('rank_updated','Rank Settings has been updated successfully!');

    }
}
