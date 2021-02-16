@extends('welcome')

@section('content')

        <!-- register-area start -->
        <div class="register-area pt-40 pb-50">
            <div class="container-fluid">
                <h2 style="color: #050035; text-align:center;margin-bottom:25px;">Register Form</h2>
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form id="registerForm" method="post">
                                        @csrf
                                        <input type="text" name="name" placeholder="Username">
                                        <div id="nameMessage" class="custome-message"></div>

                                        <input name="email" placeholder="Email" type="email">
                                        <div id="emailMessage" class="custome-message"></div>

                                        <input type="password" name="password" placeholder="Password">
                                        <div id="passMessage" class="custome-message"></div>

                                        <input type="password" name="password_confirmation" placeholder="Password">
                                        <div id="pass_conMessage" class="custome-message"></div>

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <a href="{{ url('/login') }}">Already have an account?</a>
                                            </div>
                                            <button type="submit" class="default-btn floatright">Register</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register-area end -->

<script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script>
   $(document).ready( function () { 


        $('#registerForm').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                url: "{{ url('/user-register') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                toastr.success('Admin Registration Successful !! Please Login.');
                window.location.href = "/login";

                },
                error: function (error) {
                $('#nameMessage').html('');
                $('#emailMessage').html('');
                $('#passMessage').html('');
                $('#pass_conMessage').html('');

                if(error.responseJSON.errors.name){
                    $('#nameMessage').append(`<span>` + error.responseJSON.errors.name + ` </span>`); 
                    }
                if(error.responseJSON.errors.email){
                    $('#emailMessage').append(`<span>` + error.responseJSON.errors.email + ` </span>`); 
                    }
                if(error.responseJSON.errors.password){
                    $('#passMessage').append(`<span>` + error.responseJSON.errors.password + ` </span>`); 
                    }
                if(error.responseJSON.errors.password_confirmation){
                    $('#pass_conMessage').append(`<span>` + error.responseJSON.errors.password_confirmation + ` </span>`); 
                    }
                
                    
                    
                    
                }
            });
        });


      
      
   });
</script>
@endsection