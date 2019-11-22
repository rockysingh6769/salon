<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\salon;
use Auth;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $lat = Auth::user()->lat;
        $lon = Auth::user()->long;
        $distance = 5; 
        $R = 6371;
        $maxLat = $lat + rad2deg($distance/$R);
        $minLat = $lat - rad2deg($distance/$R);
        $maxLon = $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
        $minLon = $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
        $salons = salon::getlist($maxLat,$minLat,$maxLon,$minLon);        
        return view('customer.index',compact("salons"));
    }
    public function viewsalon(Request $request)
    {
    	if(!empty($request->id))
        {
             $list =[];
             $user = salon::find($request->id)->user;
             $salon = salon::find($request->id);
             $owner = $user->fname ." ". $user->lname;
             $list['owner'] = $owner;
             $list['email'] = $user->email;
             $list['number'] = $user->number; 
             $list['salon_name'] = $salon->name;
  	         $list['imgpath'] = $salon->imgpath;
             $list['address'] = $salon->address; 
             $list['lat'] = $salon->lat;
  	         $list['lan'] = $salon->long;
             return $list;
    	} 
    }
}
