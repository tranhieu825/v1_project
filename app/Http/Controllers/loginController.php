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


class LoginController extends Controller
{


    public function ktra_Login()
    {
        $ma_user= Session::get('ma_user');
        $role= Session::get('role'); 
        $ma_pb= Session::get('phong_ban');
        if($ma_user){
            if($role=='employee')
            {
            return Redirect::to('v1/user/layout');
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
      $this->ktra_Login();
      $ma_user= Session::get('ma_user');
      $user = DB::table('user')->where('ma_user',$ma_user)->get();
    	return view('user_layout')->with('user',$user);
    }
 

    //Show
    public function form_employee(Request $request){
    	$this->ktra_Login();
    	$ma_pb= Session::get('phong_ban');
      $role= Session::get('role');	
      $ma_user= Session::get('ma_user'); 
      $ndg = DB::table('nguoidanhgia')->where('phong_ban',$ma_pb)->get();
      $showdiem = DB::table('ketqua')->where('ma_user',$ma_user)->get();
      $user = DB::table('user')->where('ma_user',$ma_user)->get();

      $parentCategories = \App\Http\Controllers\Category::where('parent_id',0)->where('phong_ban',$ma_pb)->orderBy('position','ASC')->get();
        return view('user.form_employee', compact('parentCategories'))->with('ndg',$ndg)->with('showdiem',$showdiem)->with('user',$user);
    }

     public function form_user_danhgia(){
     $this->ktra_Login();
     return view('user_danhgia.create_form');
    }

    // login
     public function dashboard(Request $request){
   		$email= $request->email;
   		$password= md5($request->password);
      $messages =[
          'email.required' => 'Email l?? tr?????ng b???t bu???c',
          'email.email' => 'Email kh??ng ????ng ??inh d???ng',
          'password.required' => 'M???t kh???u l?? tr?????ng b???t bu???c',
          'password.min' => 'M???t kh???u ??t nh???t ph???i c?? 5 k?? t???',
        ];
        $rules = [
          'email' => 'required|email',
          'password' => 'required|min:5',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return Redirect()->back()->withErrors($validator)->withInput();
        }
        else{
        $result= DB::table('user')->where('email',$email)->where('password',$password)->first();
            if($result)
            {
              Session::put('hoten',$result->ho_ten);
              Session::put('role',$result->role);
              Session::put('ma_user',$result->ma_user);
              Session::put('phong_ban',$result->ma_pb);
              $role= Session::get('role');  
              if($role=='employee')
              return Redirect::to('v1/user/layout');
              if($role=='user_danhgia')
              return Redirect::to('form-user-danhgia');
              if($role=='admin')
              return Redirect::to('form-admin');

            }
            else
            {
              Session::put('message','T??i kho???n ho???c m???t kh???u kh??ng ????ng');
              return Redirect::to('/');
            }
        }
      }
   }
  
