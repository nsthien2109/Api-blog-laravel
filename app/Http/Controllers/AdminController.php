<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\V1\Customer;
use App\Models\V1\Favorite;
use App\Models\V1\CategoryPost;
use App\Models\V1\Post;
session_start();

class AdminController extends Controller
{
// SHOW THE LOGIN PAGE
  public function index(){
    return view('Admin.Content.Account.login');
  }

// LoGIN SUCCESS
  public function dashboard(Request $request){
      $email_admin  = $request->email_admin;
      $password_admin = md5($request->password_admin);
      $account = DB::table('admin')
                  ->where('email_admin',$email_admin)
                  ->where('password_admin',$password_admin)
                  ->first();
      if($account){
        Session::put('name_admin' , $account->name_admin);
        Session::put('id_admin', $account->id_admin);
        return Redirect::to('/dashboard');
      }else{
        Session::put('message','Please enter exits infomation');
        return Redirect::to('/admin');
      }
  }

  // LOGOUT

  public function show_dashboard(){
    $customer = Customer::all();
    $CountCustomer = count($customer);
    $category = CategoryPost::all();
    $CountCategory = count($category);
    $post = Post::all();
    $CountPost = count($post);
    return view('Admin.Content.dashboard')->with(compact('post','CountCustomer','CountCategory','CountPost'));
  }

  public function logout(){
    Session::put('name_admin',null);
    Session::put('id_admin',null);
    return Redirect::to('/admin');
  }

}
