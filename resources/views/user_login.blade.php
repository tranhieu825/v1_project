<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Existing Login Form a Flat Responsive Widget Template :: W3layouts</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<link href="{{asset('public/frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css" media="all">

<!-- Fonts -->
<link href="{{asset('//fonts.googleapis.com/css?family=Quicksand:300,400,500,700')}}" rel="stylesheet">
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>CUSTOMER LOGIN</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Login here</h2>
	     <form action="{{URL::to('/user-dashboard')}}" method="post" id="form_login">
          	{{csrf_field()}}
			<input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
			@if($errors->has('email'))
                 <p style="color: red;">{{$errors->first('email')}}</p>
            @endif
			<input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" value="{{old('password')}}">
			 @if($errors->has('password'))
                  <p style="color: red;">{{$errors->first('password')}}</p>
            @endif
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
					<a href="#">Forgot password?</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="Đăng nhập" name="login">
				<p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<!-- for register popup -->

	<!-- //for register popup -->
	
	<div class="w3footeragile">
		<p> &copy; All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">Hieu && Huy</a></p>
	</div>

	
	<script type="text/javascript" src="{{asset('public/frontend/js/jquery-2.1.4.min.js')}}"></script>

	<!-- pop-up-box-js-file -->  
		<script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

	<script>
	$(function(){
		$('#form_login').validate({
			rules :{
				email :{
					required : true,
					email : true,
				},

				password :{
					required : true,
					minlength : 5
				}
			},
			messages : {

					email :{
						required : "Chưa nhập email",
						email : "Email không đúng định dạng",
					},

					password :{
						required : "Chưa nhập password",
						minlength : "Phải nhập đủ 5 ký tự trở lên"
					}
				},
			submitHandler : function(){
				$.ajax({
					'url' : 'user-dashboard',
					'data' : {
						'email' : $('#email').val(),
						'password' : $('#password').val()
					},
					'type' : 'POST',
				},
				success: function(data){
					console.log(data);
				}
				);
			}
		});
	})
</script>

</body>
<!-- //Body -->

</html>