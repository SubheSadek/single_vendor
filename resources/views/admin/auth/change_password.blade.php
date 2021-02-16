@extends('admin.auth.auth_layouts')

@section('auth_content')
<div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
            <h4 class="text-center m-3">Change password</h4>
        <form id="submitChangePassForm" enctype="multipart/form-data">
            @csrf
          <div class="input-group mb-3">
            <input type="password" name="oldpass" class="form-control" placeholder="Old Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <span class="invalid-feedback-custome" id="oldMessage"></span>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="New Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <span class="invalid-feedback-custome" id="newMessage"></span>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mt-3 mb-1">
          <a href="{{ url('/admin/home') }}">Back to home</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  
@endsection