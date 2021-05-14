@extends('user_layout')
@section('user_content')

<div class="container">
  <h2>Kết quả đánh giá</h2>
     <?php
        $message= Session::get('message');
        if($message)
        {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',NULL);
        }
      ?>   
  <div class="table-responsive">
 <br>
 <label>Tìm kiếm</label>
 <input placeholder="Search.." class="form-control" id="myInput" type="text" >
 <br>

  <table  class="table table-bordered">
    <thead class="thead-light">
      <tr>
          <th>Người đánh giá</th>
          <th>Đợt đánh giá</th>
          <th>Điểm đánh giá</th>
          <th>Ngày bắt đầu</th>
          <th>Ngày kết thúc</th>
          <th>Ngày đánh giá</th>
          <th>Xóa</th>
          <th>Sửa</th>
      </tr>
    </thead>
    
     @foreach($ketqua as $key => $result_kq) 
    <tbody id="myTable">
      <tr>
        <td>{{ $result_kq->ho_ten }}</td>
        <td>{{ $result_kq->diem_employee }}</td>
        <td>Yes</td>
        <td>Yes</td>
        <td>Yes</td>
        <td>Yes</td>
        <td>
          <a onclick="return confirm('Bạn có chắc xóa không');" href="#">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
        </td>
        <td>
          <a href="#">
            <span class="glyphicon glyphicon-cog" ></span>
          </a>
        </td>
      </tr>
    </tbody>
   @endforeach
  </table>

</div>
</div>



  <div style="background-color:#FFFFFF">
       <a style="margin: 40%" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-user"> Thêm</span>
        </a>
  </div>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm khách hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
     <div class="modal-body">
        <form role="form" action="#" method="POST">
          {{csrf_field()}}
                <div class="form-group">
                <label for="id">Id khách hàng:</label>
                <input type="text" class="form-control" placeholder="Enter mã khách hàng" name="id_khachhang">
                </div>
                <div class="form-group">
                <label for="hoten">Họ tên:</label>
                <input type="text" class="form-control"  placeholder="Enter họ tên" name="hoten_khachhang">
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email_khachhang">
                </div>
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="pass_khachhang">
                </div>
                <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control" placeholder="Enter sdt" name="sdt_khachhang">
                </div>
                <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" class="form-control"  placeholder="Enter địa chỉ" name="diachi_khachhang">
                </div>
                <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ
                </label>
                </div>
                <button type="submit" class="btn btn-primary" name="them_khachhang">Thêm</button>
          </form>
       </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection