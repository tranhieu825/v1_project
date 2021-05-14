@extends('user_layout')
@section('user_content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


</style>
<h2>FORM ĐÁNH GIÁ NHÂN VIÊN</h2>

    @if (Session::has('message_error'))
          <p class="help is-danger"  style="color: red;">  {{Session::get('message_error')}}</p>
    @endif
    @if (Session::has('message_success'))
          <p class="help is-danger"  style="color: green;">  {{Session::get('message_success')}}</p>
    @endif

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-left top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="username">
                    <?php
                        $hoten= Session::get('hoten');
                        if($hoten)
                        {
                            echo $hoten;
                        }
                    ?>
                </span>
            </a>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
<br>

<table>

  <tr>
    <th> Tiêu chuẩn </th>
     <th> Tự đánh giá </th>
     @foreach($ndg as $dg)
     <th>{{ $dg->ten_user}}</th>
     @endforeach
  </tr>
 <form  action="{{URL::to('/v1/user/danhgia')}}" method="post" id="form_danhgia">
    {{csrf_field()}}
  @foreach($parentCategories as $category)
  <tr>
    <th> {{$category->name}} </th>
    <th>  Điểm:  </th>
    @foreach($ndg as $dg)
    <th> Điểm: {{$category->diem}}  </th>
    @endforeach
  </tr>

  @if(count($category->subcategory))
    @include('user.subCategoryList',['subcategories' => $category->subcategory])
  @endif
  @endforeach

  <tr>
    <th> </th>
     @foreach($ndg as $dg)
    <th> </th>
     @endforeach
  </tr>

  <tr>
    <th> Tổng điểm </th>
       @foreach($showdiem as $diem)
    <th id="diemtong" value="{{ $diem->diem_employee}}" >{{ $diem->diem_employee}} </th>
    <input type="text" name="diemtong" id="diemtong" value="{{ $diem->diem_employee}}" style="display: none">
       @endforeach
    @foreach($ndg as $dg)
    <th> </th>
    @endforeach
  </tr>

 <tr>
    <th> Đánh giá </th>
    <th> 

     <button type="submit" class="btn btn-primary" onclick="danhgia()" <?php if(session::get('role')!='employee') { echo 'disabled'; }?> >Submit</button>

    </th>
    @foreach($ndg as $dg)
    <th>   <button type="submit" class="btn btn-primary" <?php if(session::get('role')!='user_danhgia') { echo 'disabled'; }?> >Submit</button> </th>
    @endforeach
  </tr>
  </form>
</table>

@endsection


