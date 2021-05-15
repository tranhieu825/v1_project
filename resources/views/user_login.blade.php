<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>LOGIN EMPLOYEE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{asset('resources/css/style.css')}}" rel='stylesheet' type='text/css' />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">LOGIN EMPLOYEE</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
				     <form action="{{URL::to('v1/user/dashboard')}}" method="post" id="form_login">
          	{{csrf_field()}}
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="email" name="email" id="email"  class="form-control rounded-left" placeholder="Username" required>
		      						@if($errors->has('email'))
                                    <p style="color: red;">{{$errors->first('email')}}</p>
                                    @endif
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password"  name="password" id="password" class="form-control rounded-left" placeholder="Password" required>
	                                @if($errors->has('password'))
                                    <p style="color: red;">{{$errors->first('password')}}</p>
                                    @endif
	            </div>
	            <div class="form-group d-flex align-items-center">
	            	<div class="w-100">
	            		<label class="checkbox-wrap checkbox-primary mb-0">Save Password
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-100 d-flex justify-content-end">
		            	<button type="submit" class="btn btn-primary rounded submit">Login</button>
	            	</div>
	            </div>
	            <div class="form-group mt-4">
								<div class="w-100 text-center">
							
									<p><a href="#">Forgot Password</a></p>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

  <script src="{{asset('resources/js/jquery.min.js')}}"></script>
  <script src="{{asset('resources/js/popper.js')}}"></script>
  <script src="{{asset('resources/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('resources/js/main.js')}}"></script>


  

	</body>
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
					'url' : 'v1/user/dashboard',
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

</html>

