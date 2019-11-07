<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Shopping extends Model
{
    public static function allproducts() {
    	$all=DB::table('shopping')
    				->where('delFlag','=','0')
    				->get();
    	return $all;
    }
    public static function single($hidid) {
    	$data= DB::table('shopping')
    				->where('id','=',$hidid)
    				->where('delFlag','=','0')
    				->get();
    	return $data;
    }
    public static function addtocart($cartid,$cus_id) {
    	$data= DB::table('cart')
    				->insert(['productId'=>$cartid,
                              'delFlag'=>'0',
                              'cus_Id'=>$cus_id,
                              'CreatedDateTime'=>date('Y-m-d H-m-s'),
                              'selday'=>date('d')]);
    }
    public static function getcartdata($cus_id) {
        $cartdata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.delFlag','=','0')
                        ->where('cus_Id','=',$cus_id)
                        ->get();
        return $cartdata;
    }
    public static function removetocart($delid,$hiddate,$cus_id) {
        $data= DB::table('cart')
                    ->where('id','=',$delid)
                    ->where('cus_Id','=',$cus_id)
                    ->where('selday','=',$hiddate)
                    ->update(['delFlag'=>'2']);
    }
    public static function getremoveddata($cus_id) {
        $cartdata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.delFlag','=','0')
                        ->where('cus_Id','=',$cus_id)
                        ->get();
        return $cartdata;
    }
    public static function paid($hidid,$hiddate) {
        $data= DB::table('cart')
                    ->where('ProductId','=',$hidid)
                    ->where('selday','=',$hiddate)
                    ->update(['payFlag'=>'1',
                              'delFlag'=>'1',
                              'UpdatedDateTime'=>date('Y-m-d H-m-s')]);
        
    }
    public static function purchased($cus_id) {
        $paiddata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.payFlag','=','1')
                        ->where('carts.delFlag','=','1')
                        ->where('carts.cus_Id','=',$cus_id)
                        ->get();
        return $paiddata;
    }
    public static function placeorders($hidid) {
        $cartdata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.productId','=',$hidid)
                        ->where('carts.delFlag','=','0')
                        ->get();
        return $cartdata;
    }
    public static function viewcarts() {
        $cartdata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.delFlag','=','0')
                        ->get();
        return $cartdata;
    }
    public static function Count() {
      $count=DB::table('customer_detail')->count();
      $countnum=$count+1;
      return $countnum;
   }
   public static function inserts($request,$uid,$passwords) {
    $ins=DB::table('customer_detail')
              ->insert(['FirstName'=>$request->username,   
                        'Gender'=>$request->gender,
                        'phoneNo'=>$request->phone,
                        'Email'=>$request->mail,
                        'CreatedBy'=>$request->username,
                        'password'=> $passwords,
                        'CreatedDateTime'=>date('y-m-d h:i:s'),
                        'cus_Id'=>$uid,
                        'delFlag'=>'0']);
        return $ins;
   }
   public static function logins($request) {
      $login=DB::table('customer_detail')
                    ->where('password','=',md5($request->password))
                    ->where(function ($query) use ($request){
                        $query->where('FirstName','=',$request->username)
                              ->orWhere('phoneNo','=',$request->username)
                              ->orWhere('Email','=',$request->username);
                    })
                    ->get();
     return $login;
   }
   public static function purchase($cus_id) {
       $paiddata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('carts.payFlag','=','1')
                        ->where('carts.delFlag','=','1')
                        ->where('carts.cus_Id','=',$cus_id)
                        ->get();
        return $paiddata;
   }
   public static function buyNow($hidid,$cartid,$cus_id) {
       $ins= DB::table('cart')
                    ->insert(['productId'=>$cartid,
                              'delFlag'=>'0',
                              'cus_Id'=>$cus_id,
                              'CreatedDateTime'=>date('Y-m-d H-m-s'),
                              'selday'=>date('d')]);
        $cartdata= DB::table('shopping AS shop')
                        ->leftjoin('cart AS carts','shop.productId','=','carts.productId')
                        ->where('shop.id','=',$hidid)
                        ->where('carts.delFlag','=','0')
                        ->where('carts.cus_Id','=',$cus_id)
                        ->get();
        return $cartdata;
   }
}
