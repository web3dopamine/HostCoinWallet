<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use DB;
use Input;
use Ixudra\Curl\Facades\Curl;
use App\Transaction;
use App\Address_detail;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
// error_reporting(0);
class transacCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  Auth::user()->id;
        $details = DB::table('address_details')->select('*')->where('user_id',$id)->get();
    
        $balanceError = 0;
        $success = 0;
        return view('transactions.index', compact('details', 'balanceError', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function history()
    {
        $id =  Auth::user()->id;
        $address = DB::table('address_details')->select('address')->where('user_id',$id)->pluck('address');
        
        $address = $address[0];
        
        $allTranxs = DB::table('transactions')->select('*')->where('address_from', '=', $address)
                                                           ->orWhere('address_to', '=', $address)->get();
                                                           
        $sent = DB::table('transactions')->select('*')->where('address_from', '=', $address)->get();
        
        $receive = DB::table('transactions')->select('*')->where('address_to', '=', $address)->get();
        
        return view('transactions.history', ['address' => $address], compact('allTranxs', 'sent', 'receive'));
    }
    
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id =  Auth::user()->id;
        $address = DB::table('address_details')->select('*')->where('user_id',$id)->get();
        
        $e1 = '';
        
        //getKeys
        $address_from = Input::get('address_from');
        $address_to = Input::get('address_to');
        $qty = Input::get('amount');
        $description = Input::get('description');
        
        //amount for Address From to Address From for tranx master
        $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$address_from.'",0] }')
                 ->post();
          $arr = json_decode($response, true);
            
        $amount = $arr['result'][0]['qty'] - $qty;
         
        $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$address_from.'",0] }')
                 ->post();
          $arr = json_decode($response, true);
            
            $balance = $arr['result'][0]['qty'];
            if($qty > $balance){
                
          return view('transactions.index',  ['balanceError' => 1], compact('address'));
            }
            
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "listunspent", "params": [0,9999,["'.$address_from.'"]] }')
                 ->post();
          $arr = json_decode($response, true);
           
                $balance = '';
                $a1 = array();
                $params = '';
            foreach($arr['result'] as $a){
                $txid = $a['txid'];
                $vout = $a['vout'];
                if(!empty($a['assets'][0]['qty']) ){
                   $q = $a['assets'][0]['qty'];
                    $balance += $q;
                    $tx = '{"txid":"'.$txid.'", "vout":'.$vout.'}';
                        array_push($a1, $tx);
                        $params = implode(",",$a1);
                    if($balance >= $qty){
                        break;
                    }
                }
            }
        
          //createrawtransaction
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "createrawtransaction", "params": [['.$params.'],{"'.$address_to.'":{"hostcoin":'.$qty.'}}] }')//{"txid":"'.$txid.'", "vout":'.$vout.'}
                 ->post();
          $arr = json_decode($response, true);
          $hex_blob = $arr['result'];
          
          //appendrawchange  
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "appendrawchange", "params": ["'.$hex_blob.'","'.$address_from.'"] }')
                 ->post();
          $arr = json_decode($response, true);        
          $longer_hex_blob = $arr['result'];
         
          //appendrawdata
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "appendrawdata", "params": ["'.$longer_hex_blob.'","5554584f732046545721"] }')
                 ->post();
          $arr = json_decode($response, true);
          $even_longer_hex_blob = $arr['result'];
          
          $private_key = DB::table('address_details')->select('private_key')->where('address','=',$address_from)->orderBy('id', 'desc')->take(1)->pluck('private_key');
            $pk = $private_key[0];
            $decrypted = Crypt::decrypt($pk);
            $private_key = $decrypted;
     
          //signrawtransaction  
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "signrawtransaction", "params": ["'.$even_longer_hex_blob.'",[],["'.$private_key.'"]] }')
                 ->post();
          $arr = json_decode($response, true);
          $arr = $arr['result'];
          $complete = $arr['complete'];
          
          if($complete == 1 ){
              
              $hex = $arr['hex'];
         
         // send Hostcoin
         $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "sendrawtransaction", "params": ["'.$hex.'"] }')
                 ->post();
          $arr = json_decode($response, true);
          
          $tranx_id = $arr['result'];
          
          DB::table('transactions')
            ->where('address_to', $address_from)
            ->update(['spent' => 'true']);
          
          
          // record Trnx address from to address to
          DB::table('transactions')->insert(
                array('tranx_id' => $tranx_id, 'address_from' => $address_from, 'address_to' => $address_to, 'amount'=>$qty, 'spent'=> 'false', 'description' => $description)
                );    
                
          // record Trnx address from to address from
          DB::table('transactions')->insert(
                array('tranx_id' => $tranx_id, 'address_from' => $address_from, 'address_to' => $address_from, 'amount'=>$amount, 'spent'=> 'false', 'description' => $description)
                );                    
            
              
         //Store balances of addresses
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$address_from.'",0] }')
                 ->post();
          $arr = json_decode($response, true);
            
          $address_from_balance = $arr['result'][0]['qty'];
        
          DB::table('address_details')
            ->where('address', $address_from)
            ->update(['balance' => $address_from_balance]);
            
          $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$address_to.'",0] }')
                 ->post();
          $arr = json_decode($response, true);
            
          $address_to_balance = $arr['result'][0]['qty'];
          
          DB::table('address_details')
            ->where('address', $address_to)
            ->update(['balance' => $address_to_balance]);
            
          return redirect('transactions')->with('success', 'The transaction has been successfull..');;  
          } else {
          return redirect('transactions')->with('fail', 'The transaction has Failed..');;        
          }
          
    }

    public function checkBalance()
    {
        $amt = Input::get('amt');
        $addr = Input::get('addr');
        //echo $addr;
        $response = Curl::to('http://multichainrpc:6VFRLn52hgAGdvTXjAbuLG9i6H2rBBWqZ6yRbYDKK7DM@216.245.204.44:6742')//multichainrpc:CYeoxgR14cyptsTavbvcPXnLtcJULfRBaCj4DChfDEf8@localhost:6808
                 ->withContentType('text/plain')
                 ->withData('{"jsonrpc": "1.0", "id":"curltest", "method": "getaddressbalances", "params": ["'.$addr.'",0] }')
                 ->post();
          $arr = json_decode($response, true);
            
            $balance = $arr['result'][0]['qty'];
            if($amt > $balance){
                echo '<p style="color:#a94442">Oops! Amount is Greater Than Your Balance.... :(</p>';
            }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
