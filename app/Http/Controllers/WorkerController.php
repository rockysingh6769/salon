<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\salon;
use App\user;
use Auth;

class WorkerController extends Controller
{
    public function checksession()
    {
       return 'aaa';
       if(!auth::user())
       {
         redirect('login');
       }
    }

    public function index()
    {
        $this->checksession(); 
        $user_id = '1';
        $salons = salon::whereIn('user_id',[$user_id])->get();
        return  view('worker.index',compact('salons'));
    } 


    public function addsalon(Request $request)
    {
        $data = new salon; 
        $data->name = $request->name;
        $data->address = $request->address;
        $data->user_id = '1';
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
            $data->save();
        }
        return 'success';
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
