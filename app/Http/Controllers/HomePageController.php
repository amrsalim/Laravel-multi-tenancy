<?php

namespace App\Http\Controllers;

use App\Facade\Tenants;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

       return  User::get();
//       $users = User::get();
//       return view('welcome' , compact('users'));
    }
}
