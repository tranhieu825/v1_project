@foreach($subcategories as $subcategory)


  <tr>
    <td>{{$subcategory->name}}</td>
      <td><input type="text" id="diemnv"  name="diemnv[]" aria-describedby="emailHelp" placeholder="Enter điểm"  <?php if(session::get('role')!='employee') { echo 'disabled'; }?>>
     @if ($errors->has('diemnv[]'))
          <p class="help is-danger"  style="color: red;">{{ $errors->first('diemnv[]') }}</p>
     @endif
     </td>
      
        @foreach($ndg as $dg)
  
      <td><input type="text" id="diem" name="diem" <?php if(session::get('role')!='user_danhgia') { echo 'disabled'; }?>></td>
     @endforeach
    @if(count($subcategory->subcategory))
    @include('user.subCategoryList',['subcategories' => $subcategory->subcategory])
   @endif
  </tr>


<script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/frontend/js/scripts.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/frontend/js/jquery.scrollTo.js')}}"></script>


@endforeach