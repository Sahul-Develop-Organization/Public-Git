<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Shopping;
use DB;
use Redirect;
use Session;
use Mail;
class ShoppingController extends Controller
{
    function index(Request $request) {
    	$allproducts= Shopping::allproducts();
    	return view('shopping.shopping',['request'=>$request,
    									 'allproducts'=>$allproducts]);
    }
    function sview(Request $request) {
        $hidid=$request->hidid;
        $view = Shopping::single($hidid);
        return view('shopping.Productview',['request' => $request,
                                            'single' => $view]);
    }
    function buynow(Request $request) {
        $hidid=$request->hidid;
        $cartid= $request->cartid;
        $cus_id=Session::get('userid');
        $buy= Shopping::buyNow($hidid,$cartid,$cus_id);
        return view('shopping.checkout',['request' => $request,
                                         'checkout' =>$buy]);
    }
    function addcart(Request $request) {
        $cartid= $request->cartid;
        $cus_id=Session::get('userid');
        $cart=Shopping::addtocart($cartid,$cus_id);
        return Redirect::to('cart');
    }
    function carts(Request $request) {
        $cus_id=Session::get('userid');
        $cart=Shopping::getcartdata($cus_id);
        return view('shopping.cart',['request' =>$request,
                                     'cart' => $cart]);
    }
    function addtocarts(Request $request) {
       $hidid=$request->hidid;
       print_r($hidid);
       exit();
    }
    function removefromcart(Request $request) {
        $delid=$request->delid;
        $hiddate =$request->hiddate;
        $cus_id=Session::get('userid');
        $cart=Shopping::removetocart($delid,$hiddate,$cus_id);
        return Redirect::to('removeproducts');
    }
    function removedproducts(Request $request) {
        $cus_id=Session::get('userid');
        $cart=Shopping::getremoveddata($cus_id);
        $viewflag=1;
        return view('shopping.cart',['request',$request,
                                    'viewflag'=>$viewflag,
                                    'cart'=>$cart]);
    }
    function continueshop() {
         return Redirect::to('/');   
    }
    function cashpayment(Request $request) {
        $proid = $request->proid;
        $hiddate = $request->hiddate;
        $cus_id=Session::get('userid');
        $pay=Shopping::paid($proid,$hiddate,$cus_id);
        return Redirect::to('purchased');
    }
    function purchase(Request $request)
    {
        $cus_id=Session::get('userid');
        $pay=Shopping::purchased($cus_id);
        Session::flash('success', 'Paid Sucessfully!'); 
            Session::flash('type', 'alert-success');
        return view('shopping.paid',['request'=>$request,
                                            'paid'=>$pay]);
    }
    function cardpayment(Request $request) {
        $proid = $request->proid;
        $hiddate = $request->hiddate;
        $cus_id=Session::get('userid');
        $pay=Shopping::paid($proid,$hiddate,$cus_id);
        return Redirect::to('purchased');       
    }
    function placeorder(Request $request) {
        $hidid=$request->hidid;
        $hiddate=$request->hiddate;
        $buy= Shopping::placeorders($hidid);
        return view('shopping.checkout',['request' => $request,
                                         'checkout' =>$buy]);
    }
    function viewcart(Request $request) {
        $cart=Shopping::viewcarts();
        $viewflag=1;
        return view('shopping.cart',['request'=> $request,
                                     'cart'=>$cart,
                                     'viewflag'=>$viewflag]);
    }
    function loginuser(Request $request) {
        return view('shopping.login');
    }
    function loginusers(Request $request) {
        $login=Shopping::logins($request);
        if($login) {
            if(($request->session()->has('userid'))==null) {
              foreach ($login as $key) {
                $request->session()->put('userid',$key->cus_Id);
                
                Session::flash('type', 'alert-success');
              }
              return Redirect::to('/'); 
            }
        }
        else {
            return Redirect::to('loginuser');
        }
    }
    function register(Request $request) {
        return view('shopping.register');
    }
    function registerusers(Request $request) {
        $un="MB";
        $sno=Shopping::Count();
        $userid=str_pad($sno,4,"0",STR_PAD_LEFT);
        $uid=$un.$userid;
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        $passwords=md5($password);
        $reg=Shopping::inserts($request,$uid,$passwords);
        self::sendemail($request,$password);
        if($reg==1)
        {
            Session::flash('success', 'Registered Sucessfully!'); 
            Session::flash('type', 'alert-success');
            return Redirect::to('loginuser');
        }
    }
    function sendemail(Request $request,$password) {
      $data=array('email' => $request->mail,'pass'=>$password,'usname'=>$request->username);
        Mail::send('emails.contact',$data,function ($m)use($data)
         {
          $m->from('mhedsahul@gmail.com');
          $m->to($data['email']);
          $m->subject('Hello User');
         });
    }
    function logout(Request $request) {
        Session::flush();
        return Redirect::to('/');
    }
    function purchasedproducts(Request $request) {
        $cus_id=Session::get('userid');
        $pay=Shopping::purchase($cus_id);
        return view('shopping.paid',['request'=>$request,
                                            'paid'=>$pay]);
    }
}
