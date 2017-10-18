<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Crypt;
use App\Blog;
use Auth;
use DB;
use Carbon\Carbon;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  Auth::user()->id;
        $address = DB::table('address_details')->select('address')->where('user_id',$id)->pluck('address');
        
        $address = $address[0];
        
         $tranxCount = DB::table('transactions')->where('address_from', '=', $address)
                                                           ->orWhere('address_to', '=', $address)->count();
         
         $blogs = Blog::all();
         return view('home', ['tranxCount' => $tranxCount], compact('blogs'));
    }
}
