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


class EmployeeController extends Controller
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
    
    public function danh_gia(Request $request)
    {
        $this->ktra_Login();
        $ma_user= Session::get('ma_user');
        $data=array();

        $data['ma_user']=$ma_user;

        
         $message =[
           'diemtong.required' => 'Đã đánh giá',
         ];
         $rule = [
          'diemtong'=>'required ',
        ];

         $messages =[
           'diemnv[].required' => 'Điểm là trường bắt buộc',
        
         ];
         $rules = [
          'diemnv[]' => 'required',
        ];
         $validator = Validator::make($request->all(), $rules, $messages);
         $validator1 = Validator::make($request->all(), $rule, $message);

        if( $validator->fails()&&array_sum($request->diemnv)=='')
            {
              return Redirect()->back()->withErrors( $validator)->withInput();
            }
        else
        {
        $data['diem_employee']=array_sum($request->diemnv);
        $check=$request->diemtong;

        if( $validator1->fails())
        {
           DB::table('ketqua')->insert($data);
           return Redirect::to('v1/user/form')->with('message_success', 'Đánh giá thành công'); 
        }

        else {       
           return Redirect::to('v1/user/form')->with('message_error', 'Bạn đã đánh giá'); 
        }
      }
    }


     public function show_danh_gia(Request $request)
     {
        $this->ktra_Login();
        $ma_user= Session::get('ma_user');
        $ketqua= DB::table('ketqua')->join('user', 'ketqua.ma_user', '=', 'user.ma_user')->get();
        $user= DB::table('user')->where('ma_user',$ma_user)->get();
        if($ketqua)
        {
        return view('user.ketqua_employee')->with('ketqua',$ketqua)->with('user',$user);
        }
     }

    public function show_profit(Request $request,$id)
     {
        $this->ktra_Login();
        $ma_user= Session::get('ma_user');
        $user= DB::table('user')->where('ma_user',$id)->join('chucvu', 'user.ma_cv', '=', 'chucvu.ma_cv')->get();
        return view('user.my_profit')->with('user',$user);
    
     }

    public function update_profit(Request $request,$id)
     {
        $this->ktra_Login();
        $ma_user= Session::get('ma_user');
        $messages =[
           'name.required' => 'Họ tên là trường bắt buộc',
           'ngay_sinh.required' => 'Ngày sinh là trường bắt buộc',
           'email.required' => 'Email là trường bắt buộc',
           'email.email' => 'Email không đúng đinh dạng',
           'ki_nang.required' => 'Kĩ năng là trường bắt buộc',
           'phone.required' => 'Số điện thoại là trường bắt buộc',
        
         ];
         $rules = [
          'name' => 'required',
          'ngay_sinh' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'ki_nang' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if( $validator->fails())
            {
              return Redirect()->back()->withErrors( $validator)->withInput();
            }
        else
        {
        $data= array();
        $data['ho_ten']= $request->name;
        $data['ngay_sinh']= $request->ngay_sinh;
        $data['email']= $request->email;
        $data['ki_nang']= $request->ki_nang;
        $data['sdt']= $request->phone;
        $update= DB::table('user')->where('ma_user',$id)->update($data);
        $user= DB::table('user')->where('ma_user',$id)->join('chucvu', 'user.ma_cv', '=', 'chucvu.ma_cv')->get();
        return view('user.my_profit')->with('user',$user)->with('update',$update);
        }
     }

}
  
