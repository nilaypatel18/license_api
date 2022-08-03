<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $users =  User::all();
            return view('admin.dashboard', compact('users'));
    }

    public function show()
    {
            $users =  User::all();
            return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
       // return view('companies.create');
    }
   
    public function store(Request $request)
    {
   
    }

    public function edit(User $user)
    {
          return view('admin.edit_user',compact('user'));
    }
    public function update($id, Request $request)
    {
      $license_count = isset($_REQUEST['edlicensecount']) ? $_REQUEST['edlicensecount'] : '';
      $user = User::find($id);
      if($license_count){
        $user->api_key_limit = $license_count;
        $user->save(); 
        session()->flash('msg', 'User updated Successfully');
      }
      else{
        $user->status = ($user->status == 'Its works' ? 'Its suspended' : 'Its works');
        $user->save(); 
        session()->flash('msg', 'User Status Changed');
      }
    
      return back();
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->licensekeys()->delete();
        activity()->log( $user->email . ' deleted  Date ' . now());
        $user->delete();
        session()->flash('msg', 'User Deleted');
        return back();
    }
    
}
