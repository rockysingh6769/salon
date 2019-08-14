<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\role;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        
        return view('home');
    }
    public function checkurl()
    {
        $role=role::find(auth::user()->role_id);
        if($role->name == 'Worker'){
         return redirect('worker/page');
        }if($role->name == 'Customer'){
          return redirect('customer/page');
        } 

    }
}
