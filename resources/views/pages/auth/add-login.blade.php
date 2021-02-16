        <!-- login-area start -->
        <div class="register-area pt-40 pb-50">
            <div class="container-fluid">
                <h2 style="color: #050035; text-align:center;margin-bottom:25px;">Login Form</h2>
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">

                                    <form id="loginForm" method="post">
                                        @csrf
                                        <input type="email" name="email" placeholder="Email">
                                        <div id="emailMessage" class="custome-message"></div>

                                        <input type="password" name="password" placeholder="Password">
                                        <div id="passMessage" class="custome-message"></div>

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="{{ url('/register') }}">Register an account.</a>
                                            </div>
                                            <button type="submit" class="default-btn floatright">Login</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login-area end -->
        
<script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script>
    $(document).ready( function () { 
        $('#loginForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ url('/user-login') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                $('#emailMessage').html('');
                $('#passMessage').html('');
                if(data.message){
                  $('#passMessage').append(`<span>` + data.message + ` </span>`); 
                
                }else{
                    toastr.success('Login Successfully !!');
                    if(window.location.pathname == "/cart"){
                        window.location = "/checkout";
                    }else{
                        window.location = "/home";
                    }
                  
                }
                
              },
               error: function (error) {
                $('#emailMessage').html('');
                $('#passMessage').html('');

                
                 if(error.responseJSON.errors.email){
                  $('#emailMessage').append(`<span>` + error.responseJSON.errors.email + ` </span>`); 
                  }
               
                 if(error.responseJSON.errors.password){
                  $('#passMessage').append(`<span>` + error.responseJSON.errors.password + ` </span>`); 
                  }
                 
                  
              }
          });
      });




    });
</script>