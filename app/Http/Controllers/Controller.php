<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\User;
use Auth;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Google2FA;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function google_auth(){
         
        $google2fa = new Google2FA();
        
        $user = new User;
        
        $key = Google2FA::generateSecretKey();
    
        $id = Auth::user()->id;
        
        $email = DB::table('users')->select('email')->where('id', $id)->pluck('email');
        
        User::where('id',$id)->update(['secret_key'=>$key]);
        
        $email = $email[0];
        $google2fa_url = Google2FA::getQRCodeGoogleUrl(
            'HostCoin Wallet',
            $email,
            $key
        );
        $verify_error = '';
        return view('auth.token', compact('google2fa_url','key','verify_error')); 
        
    }
    
    public function verify(Request $request)
    {
        //echo $google2fa_url;
        
        
        $secret = $request->input('secret');
        $key = $request->input('key');
        $google2fa = new Google2FA();
        $valid = $google2fa::verifyKey($key, $secret);
        if ($valid){
                return redirect('/home/value='.$key);
            } else {
                $google2fa = new Google2FA();
        
                $user = new User;
                
                $key = Google2FA::generateSecretKey();
            
                $id = Auth::user()->id;
                
                $email = DB::table('users')->select('email')->where('id', $id)->pluck('email');
                
                User::where('id',$id)->update(['secret_key'=>$key]);
                
                $email = $email[0];
                $google2fa_url = Google2FA::getQRCodeGoogleUrl(
                    'HostCoin Wallet',
                    $email,
                    $key
                );
                $verify_error = 'Oops..! Could not Verify. Please try again ';
                return view('auth.token', compact('google2fa_url','key','verify_error')); 
            }
    }
}
