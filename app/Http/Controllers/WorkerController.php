<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\salon;
use App\user;
use Auth;

class WorkerController extends Controller
{
    

    public function index()
    {
        $user_id = Auth::user()->id;
        $salons  = salon::whereIn('user_id',[$user_id])->get();
        return  view('worker.index',compact('salons'));
    } 
 
    public function addsalon(Request $request)
    {
        $data = new salon; 
        $data->name = $request->name;
        $data->address = $request->address;
        $data->user_id = Auth::user()->id;
        $check = 'true';  
        $file = $request->file('imgpath');
        if(!empty($file))
        {   
         	$file_name =  $file->getClientOriginalName();
	        $file_extension  = $file->getClientOriginalExtension();
	        $destinationPath = 'uploads';
	        if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || 
	           $file_extension == 'gif')
	        {
	           $file->move($destinationPath,$file_name);
        	   $data->imgpath = $file_name;
	        }else{
	        	$check = 'false';
	        }          
        }else{
        	$data->imgpath = 'default.png';	
        }
        if($check == 'true')
        {
            $response = $this->checkaddress($request->address);
            if($response == 'wrong'){
                return 'wrong';
            }else{
             $data->lat = $response['lat'];
             $data->long = $response['long'];
             $data->save();
             return 'success';
            }
        }
        return 'success';
    } 
    public function checkaddress($address)
    {
        $prepAddr = str_replace(' ','+',$address);
        $sd = urlencode( $prepAddr );
       
        $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$sd.'&key=');
        $output  = json_decode($geocode);
        $status = $output->status;
        if( $status != 'OK' )
        {
            return 'wrong';
        }else
        {
           $latitude = $output->results[0]->geometry->location->lat;
           $longitude = $output->results[0]->geometry->location->lng;
           $response = [];
           $response['lat']=$latitude;
           $response['long'] =$longitude; 
           return $response;
        }
    } 
    public function editsalon(Request $request)
    {
        if(!empty($request->id))
        {
             return  salon::find($request->id);
    	} 
    } 
    public function updatesalon(Request $request)
    {
    	$salon = salon::find($request->id);
        $salon->name =$request->name;
        $salon->address =$request->address;
        $check = 'true';  
        $file = $request->file('editimgpath');
        if(!empty($file))
        {   
	     	$file_name =  $file->getClientOriginalName();
	        $file_extension  = $file->getClientOriginalExtension();
	        $destinationPath = 'uploads';
	        if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || 
	           $file_extension == 'gif')
	        {
	           $file->move($destinationPath,$file_name);
        	   $salon->imgpath = $file_name;
	        }else{
	        	$check = 'false';
	        	$salon->imgpath = 'defaukt.png';
	        }          
        }
        if($check == 'true' )
        {
           $salon->save();
        }
        return 'success'; 
    }
    public function deletesalon(Request $request)
    {
        if(!empty($request->id))
        {
            $salon = salon::find($request->id);
            $salon->delete(); 
            return 'success';
    	} 
    }

}
