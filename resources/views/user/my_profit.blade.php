
@extends('user_layout')
@section('user_content')


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="bg-light text-dark">
              <div class="card-body box-profile bg-light text-dark">
                <div class="text-center">
               
                </div>

                <h3 class="profile-username text-center">
                  
                <span class="username">
                    <?php
                        $hoten= Session::get('hoten');
                        if($hoten)
                        {
                            echo $hoten;
                        }
                    ?>
                  
                </h3>
               @foreach($user as $key => $user_check) 
                <p class="text-muted text-center">{{$user_check->ten_cv}}</p>
            
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user_check->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{$user_check->sdt}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of birth </b> <a class="float-right">{{$user_check->ngay_sinh}}</a>
                  </li>
                </ul>
              
                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary bg-light text-dark">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light text-dark">
                <strong> Role </strong>

                <p class="text-muted">
                 {{$user_check->role}}
                </p>

                <hr>

                <strong></i> Location</strong>

                <p class="text-muted">{{$user_check->dia_chi}}</p>

                <hr>

                <strong> Skills</strong>

                <p class="text-muted">
                 {{$user_check->ki_nang}}
                </p>

                <hr>

                <strong>Notes</strong>

                <p class="text-muted">  {{$user_check->nodes}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        
          <!-- /.col -->
          <div class="col-md-9 bg-light text-dark">
            <div class="card bg-light text-dark">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body bg-light text-dark">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->

                  <div class="tab-pane active bg-light text-dark" id="settings">
                    <form class="form-horizontal bg-light text-dark"  action="{{URL::to('/v1/user/update/'.$user_check->ma_user)}}" method="post">
                         {{csrf_field()}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
                               @if ($errors->has('name'))
                               <p class="help is-danger"  style="color: red;">{{ $errors->first('name') }}</p>
                               @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail"  name="email" placeholder="Email">
                              @if ($errors->has('email'))
                               <p class="help is-danger"  style="color: red;">{{ $errors->first('email') }}</p>
                               @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2"  name="phone" placeholder="Name">
                              @if ($errors->has('phone'))
                               <p class="help is-danger"  style="color: red;">{{ $errors->first('phone') }}</p>
                               @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Date Of Birth</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience"  name="ngay_sinh" placeholder="Experience"></textarea>
                              @if ($errors->has('ngay_sinh'))
                               <p class="help is-danger"  style="color: red;">{{ $errors->first('ngay_sinh') }}</p>
                               @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills"  name="ki_nang" placeholder="Skills">
                              @if ($errors->has('ki_nang'))
                               <p class="help is-danger"  style="color: red;">{{ $errors->first('ki_nang') }}</p>
                               @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
              @endforeach
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    @endsection