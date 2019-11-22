<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Hash;
use Session;
use App\user;
use App\state;
use Validator;
use App\country;
use Illuminate\Http\Request;
use App\Rules\GoogleMapAddress;


class UsersController extends Controller
{
 
    public function worker()
    {
        $role = 2;
    	  $url='worker';
    	  $countryies=country::all();
  	    return view('signup',compact('role','countryies','url'));
    }
    public function customer()
    {
      	$role = 4;
       	$url  = 'customer';
    	  $countryies=country::all();
    	  return view('signup',compact('role','countryies','url'));
    }
    public function getstates(Request $request)
    {
        if(!empty($request->country_id)){
 	        $states = country::find($request->country_id)->state;
        	if($states){
               return $states; 
        	}else{
        		return 'not';
        	}
        } 
    }
    // public function login(Request $request)
    // {
    // 	  $users = user::where('email', '=', $request->email)->first();
    //     return $users;
    //     $test=Hash::check('', $user->password); 
    //     $users = DB::table('users')
    //                 ->where('email', '=', $request->email)
    //                 ->where('password', '=', $request->password)
    //                 ->get();
    //     Session::put('user', $users);
    //     $request->session()->put('user', $users);
         

    // }

    public function profile()
    {
      return view('profile');

    }
    public function store(Request $request)
    {
        
        $data = new user;
        $this->validate($request,[
               'fname'     => 'required',
               'lname'     => 'required',
               'number'    => 'required',
               'email'     => 'required|email|unique:users',
               'password'  => 'required',
               'cpassword' => 'required|same:password',
               'address'   => ['required', new GoogleMapAddress],
               'country_id'=> 'required',
               'state_id'  => 'required',
        ]); 
          
        $data->fname       = $request->fname;
       	$data->lname       = $request->lname;
       	$data->number      = $request->number;
        $data->email       = $request->email;
        $data->password    = Hash::make($request->password);
        $data->address     = $request->address;
        $data->address     = $request->address;
        $data->country_id  = $request->country_id;
        $data->state_id    = $request->state_id;
        $data->role_id     = $request->role_id;
        $address =$request->address; 
        $prepAddr = str_replace(' ','+',$address);
        $sd = urlencode( $prepAddr );
       
        $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$sd.'&key=');
        $output  = json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
  	    $longitude = $output->results[0]->geometry->location->lng;
  	    $data->lat  = $latitude;
  	    $data->long = $longitude;   
        $data->save();
       	
    }
    public function destroy()
    {
      Auth::logout();
      return redirect('/login');
    }

}
