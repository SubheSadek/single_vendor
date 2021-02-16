<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .invalid-feedback-custome{
      color: red;
      font-weight: bolder;
      font-size: 12px;
      font-family:sans-serif;
      margin: 0;
      padding: 0;
    }
    .invalid-feedback-custome2{
      color: red;
      font-weight: bolder;
      font-family:sans;
      font-size: 12px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body class="hold-transition register-page">
    @yield('auth_content')

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>


<script>
    
  $(document).ready( function () { 


      $('#submitRegisterForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ route('admin.register') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                toastr.success('Admin Registration Successful !!');
                window.location.href = "/admin/home";

              },
               error: function (error) {
                $('#nameMessage').html('');
                $('#emailMessage').html('');
                $('#passwordMessage').html('');
                $('#password_confirmationMessage').html('');

                 if(error.responseJSON.errors.name){
                  $('#nameMessage').append(`<span>` + error.responseJSON.errors.name + ` </span>`); 
                  }
                 if(error.responseJSON.errors.email){
                  $('#emailMessage').append(`<span>` + error.responseJSON.errors.email + ` </span>`); 
                  }
                 if(error.responseJSON.errors.password){
                  $('#passwordMessage').append(`<span>` + error.responseJSON.errors.password + ` </span>`); 
                  }
                 if(error.responseJSON.errors.password_confirmation){
                  $('#password_confirmationMessage').append(`<span>` + error.responseJSON.errors.password_confirmation + ` </span>`); 
                  }
                 
                     
                    
                  
              }
          });
      });

  
 
      $('#submitChangePassForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ route('admin.change') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                $('#oldMessage').html('');
                $('#newMessage').html('');
                if(data.error){
                  $('#oldMessage').append(`<span>` + data.error + ` </span>`); 
                
                }else{
                  toastr.success('Password Changed Successfully !!');
                  window.location.href = "/admin/login";
                }
              },
               error: function (error) {
                $('#oldMessage').html('');
                $('#newMessage').html('');

                 if(error.responseJSON.errors.oldpass){
                  $('#oldMessage').append(`<span>` + error.responseJSON.errors.oldpass + ` </span>`); 
                  }
                 if(error.responseJSON.errors.password){
                  $('#newMessage').append(`<span>` + error.responseJSON.errors.password + ` </span>`); 
                  }
               
                  
              }
          });
      });

  
 
      $('#submitLoinForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ route('admin.login') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                $('#emailMessage').html('');
                $('#passwordMessage').html('');
                if(data.message){
                  $('#passwordMessage').append(`<span>` + data.message + ` </span>`); 
                
                }else{
                  toastr.success('Login Successfully !!');
                  window.location.href = "/admin/home";
                }
                
              },
               error: function (error) {
                $('#emailMessage').html('');
                $('#passwordMessage').html('');

                
                 if(error.responseJSON.errors.email){
                  $('#emailMessage').append(`<span>` + error.responseJSON.errors.email + ` </span>`); 
                  }
               
                 if(error.responseJSON.errors.password){
                  $('#passwordMessage').append(`<span>` + error.responseJSON.errors.password + ` </span>`); 
                  }
                 
                  
              }
          });
      });

  

  } );
  

</script>
</body>
</html>
