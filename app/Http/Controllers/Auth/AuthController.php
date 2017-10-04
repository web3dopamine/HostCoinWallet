<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Captcha;    
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Ixudra\Curl\Facades\Curl;
use Crypt;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
       $user_details =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        $user_id = DB::table('users')->select('id')->orderBy('id', 'desc')->take(1)->pluck('id');
        
        $id = $user_id[0];
        
        $response = Curl::to('http://multichainrpc:CYeoxgR14cyptsTavbvcPXnLtcJULfRBaCj4DChfDEf8@localhost:6808')
         ->withContentType('text/plain')
         ->withData( '{"jsonrpc": "1.0", "id":"curltest", "method": "createkeypairs", "params": [] }' )
         ->post();
        
        $arr = json_decode($response, true);
        
        $address = $arr['result'][0]['address'];
        $pubkey = $arr['result'][0]['pubkey'];
        $privkey = $arr['result'][0]['privkey'];
        
        $response = Curl::to('http://multichainrpc:CYeoxgR14cyptsTavbvcPXnLtcJULfRBaCj4DChfDEf8@localhost:6808')
         ->withContentType('text/plain')
         ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "importaddress", "params": ["'.$address.'","",false] }')
         ->post();
        
        
        // Permissions
        $response = Curl::to('http://multichainrpc:CYeoxgR14cyptsTavbvcPXnLtcJULfRBaCj4DChfDEf8@localhost:6808')
         ->withContentType('text/plain')
         ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "grant", "params": ["'.$address.'","send,receive"] }')
         ->post();
        $arr = json_decode($response, true);
        $encrypted = Crypt::encrypt($privkey);
        
        DB::table('address_details')->insert(
                array('user_id' => $id, 'address' => $address, 'public_key'=>$pubkey, 'private_key'=> $encrypted)
                );
                
        return $user_details;
    }
}
