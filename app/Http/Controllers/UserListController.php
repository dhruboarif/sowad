<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function Manage()
    {
      $users=User::all();
      //dd($users);
      return view('admin.pages.user_lists',compact('users'));
    }
     public function ClubMember()
    {
      $users= User::where('membership',1)->get();
      return view('admin.pages.club_members',compact('users'));
    }
}
