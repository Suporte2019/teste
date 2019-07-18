<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Http\Request;
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
    public function index()
    {
     return view('home');
    }

    public function RolePermission ()
    {

     $nameuser= auth()->user()->name;

     echo "<h1>$nameuser</h1>";

     //dd(session('roles'));

     foreach ( auth()->user()->roles as $role ) 
     {
        echo "$role->nome => ";

      
        $permissions = $role->permissions;
       foreach ( $permissions as $permission ) 
        {
          
          
          echo  "$permission->nome / ";
        }
      

        echo '<hr>';

     }    

     
    }
}
