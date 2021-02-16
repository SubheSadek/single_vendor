@extends('admin.auth.auth_layouts')

@section('auth_content')
<div class="login-box">

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to your account</p>
  
        <form id="submitLoinForm" enctype="multipart/form-data">
            @csrf
          <div class="input-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="invalid-feedback-custome2" id="emailMessage"></div>
          

          <div class="input-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          {{-- <span class="invalid-feedback-custome2" id="Message"></span> --}}
          <div class="invalid-feedback-custome2" id="passwordMessage"></div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary"> Submit
            </button>
          </div>


        </form>
  
        {{-- <p class="mb-1">
          <a href="{{ route('show.admin.forgot') }}">I forgot my password</a>
        </p> --}}
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  
@endsection