<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Crypt;
use App\Blog;
use Auth;
use DB;
use Feeds;
use Carbon\Carbon;


use App\User;

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
    public function index(Request $request)
    {
        $id =  Auth::user()->id;
        $address = DB::table('address_details')->select('address')->where('user_id',$id)->pluck('address');
        
        $address = $address[0];
        
         $tranxCount = DB::table('transactions')->where('address_from', '=', $address)
                                                           ->orWhere('address_to', '=', $address)->count();
         
         $blogs = Blog::all();
         
    
        $feed = Feeds::make('http://www.coindesk.com/feed');
        $data = array(
          'title'     => $feed->get_title(),
          'permalink' => $feed->get_permalink(),
          'items'     => $feed->get_items(),
        );
        // echo '<pre>';
        $coindeskRss = $data['items'][0]->feed->data['child']['']['rss'][0]['child']['']['channel'][0]['child']['']['item'];
        
        return view('home', ['tranxCount' => $tranxCount], compact('blogs','coindeskRss'));
    }
    
    public function demo() {
    $feed = Feeds::make('http://www.coindesk.com/feed');
    $data = array(
      'title'     => $feed->get_title(),
      'permalink' => $feed->get_permalink(),
      'items'     => $feed->get_items(),
    );
    // echo '<pre>';
    $coindeskRss = $data['items'][0]->feed->data['child']['']['rss'][0]['child']['']['channel'][0]['child']['']['item'];
    // foreach($coindeskRss as $rss){
    //     $title = $rss['child']['']['title'][0]['data'];
    //     print_r($link = $rss['child']['']['link'][0]['data']);
    //     echo '<br>';
    //     print_r($pubDate = $rss['child']['']['pubDate'][0]['data']);
    //     echo '<br>';
    //     print_r($description = $rss['child']['']['description'][0]['data']);
    //     echo '<br>';
    // }
    // echo '</pre>';
    // exit;
    return View::make('feed', $data);
  }
}
