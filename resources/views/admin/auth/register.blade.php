@extends('admin.auth.auth_layouts')

@section('auth_content')
<div class="register-box">
  
    <div class="card">
      <div class="card-body register-card-body"> 
        <p class="login-box-msg">Register a new account</p>

        <form id="submitRegisterForm" enctype="multipart/form-data"> 
            @csrf
          <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          
            <span class="invalid-feedback-custome" id="nameMessage"></span>
         

          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email"  value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
         
              <span class="invalid-feedback-custome" id="emailMessage"></span>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password"  value="{{ old('password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <span class="invalid-feedback-custome" id="passwordMessage"></span>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" id="password_confirm" name="password_confirmation">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <span class="invalid-feedback-custome" id="password_confirmationMessage"></span>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 Remember me
                </label>
              </div>
            </div>
            
          </div> <br>
          <button type="submit" class="btn btn-block btn-primary">
            Submit
          </button>
        </form>
  
        <p class="mt-3 mb-1">
          <a href="{{ route('admin.home') }}">Back</a>
        </p>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->


@endsection