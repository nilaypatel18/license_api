<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $user =  User::with('licensekeys')->find(Auth()->user()->id);
            return view('home', compact('user'));
    }
    public function showchangepasswordForm()
    {
        $user = Auth()->user();
        return view('auth.passwords.changepassword',compact('user'));
    }
    public function updatePassword(Request $request)
    {
        
        if (!(Hash::check($request->get('current-password'), Auth()->user()->password))) {
            return back()->withErrors(["msg" => "Your current password does not matches with the password you provided. Please try again."]);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return back()->withErrors(["msg" => "New Password cannot be same as your current password. Please choose a different password."]);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6',
            'confirmed' => 'required_with:new-password|same:new-password|min:6',
        ]);
        //Change Password
        $user = Auth()->user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();
      
        return back()->with("success","Password changed successfully !");
    }

}
