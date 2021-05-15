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