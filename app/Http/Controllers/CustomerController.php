<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\salon;

class CustomerController extends Controller
{
    public function index()
    {
    	$salons=salon::all(); 
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
             $address = $salon->address; 
             $prepAddr = str_replace(' ','+',$address);
             $sd = urlencode( $prepAddr );
             $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$sd.'&key=');
             $output  = json_decode($geocode);
             $list['lat'] = $output->results[0]->geometry->location->lat;
  	         $list['lan'] = $output->results[0]->geometry->location->lng;
             return $list;
    	} 
    }
}
