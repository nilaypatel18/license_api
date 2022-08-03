<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\LicenseApi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Contracts\Activity;

class LicenseapiController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    protected function create()
    {
        $license_keys_exists = LicenseApi::where('user_id', Auth()->user()->id )->count();
        if($license_keys_exists == Auth()->user()->api_key_limit)
        {
        
            return back()->withErrors(['msg' => 'You can not create new api key']);
        }
        else
        {
            $token =  auth()->user()->createToken('api_key')->accessToken;
            LicenseApi::create([
                'api_key' => $token,
                'user_id' => Auth()->user()->id
            ]);
         
            activity()->log( Auth()->user()->email . ', created new API key.  <span class="text-danger"> IP ' . $_SERVER['REMOTE_ADDR'] . '</span>') ;
            return back()->withSuccess($token);
        }
    }
    public function destroy($id)
    {
        $post = LicenseApi::find($id);
        $post->delete();
        activity()->log( Auth()->user()->email . ' deleted API key. <span class="text-danger"> IP ' .$_SERVER['REMOTE_ADDR'] . '</span>');
        session()->flash('msg', 'Api Key Deleted');
        return back();
    }
}
