<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use DB;
use Carbon\Carbon;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class UserController extends Controller
{


    public function ktra_Login()
    {
        $ma_user= Session::get('ma_user');
        $role= Session::get('role'); 
        $ma_pb= Session::get('phong_ban');
        if($ma_user){
            if($role=='employee')
            {
            return Redirect::to('form-employee');
            }
            if($role=='user_danhgia')
            {
            return Redirect::to('form-user-danhgia');
            }
            if($role=='admin')
            {
            return Redirect::to('form-admin');
            }
        }
        else{
            return Redirect::to('')->send();
        }
    }
    //Show
    public function index(){
    	return view('user_login');
    }

    //Show
    public function employee(){
    	return view('user_layout');
    }
 

    //Show
    public function form_employee(){
    	$this->ktra_Login();
    	$ma_pb= Session::get('phong_ban');
      $ma_user= Session::get('ma_user');	
      $parentCategories = \App\Http\Controllers\Category::where('parent_id',0)->where('phong_ban',$ma_pb)->orderBy('position','ASC')->get();
      $ndg = DB::table('nguoidanhgia')->where('phong_ban',$ma_pb)->get();
      $showdiem = DB::table('ketqua')->where('ma_user',$ma_user)->get();

        return view('user.form_employee', compact('parentCategories'))->with('ndg',$ndg)->with('showdiem',$showdiem);
    }

     public function form_user_danhgia(){
      $this->ktra_Login();
      return view('user_danhgia.create_form');
    }

    // login
     public function dashboard(Request $request){
   		$email= $request->email;
   		$password= md5($request->password);
        $result= DB::table('user')->where('email',$email)->where('password',$password)->first();
            if($result)
            {
              Session::put('hoten',$result->ho_ten);
              Session::put('role',$result->role);
              Session::put('ma_user',$result->ma_user);
              Session::put('phong_ban',$result->ma_pb);
              $role= Session::get('role');  
              if($role=='employee')
              return Redirect::to('form-employee');
              if($role=='user_danhgia')
              return Redirect::to('form-user-danhgia');
              if($role=='admin')
              return Redirect::to('form-admin');

            }
            else
            {
              Session::put('message','Tài khoản hoặc mật khẩu không đúng');
              return Redirect::to('/');
            }
        }
   }
  
