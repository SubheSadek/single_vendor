@extends('welcome')

@section('content')
<style>
    .nav-pills .nav-link.active{
        color: rgb(85, 81, 81);
        border: 1px solid rgb(199, 185, 185);
       /* background-color: rgb(189, 185, 185); */
       background: none;
    }
    .nav-pills{
        /* border: 1px solid #38c172!important;  */
        /* padding-top:30px;
        padding-bottom:30px;
        padding-left:5px;
        padding-right:5px; */
        border-radius:10px;
        width:200px;
        margin:auto;
    }
    .nav-pills a{
       
    }
    .nav-pills .container img{
        width:120px;
        margin-left:20px;
        margin-bottom:7px;
    }
    .user-content{
        /* border: 1px solid #38c172!important;  */
        padding:30px;
        border-radius:20px;
        margin:auto;
        width:auto;
        margin-left:-50px;
    }
    .user-content .tab-pane h4{
        border-bottom:1px solid grey;
        width:400px;
        margin:auto;
        margin-bottom:30px;
        padding-bottom:10px;
        
    }
    .user-info h6{
        border-bottom:1px solid #b9b8b8;
        width:200px;
        margin:auto;
        margin-bottom:15px;
        padding-bottom:5px;
    }
    .user-info .table td{
        border-top:none;
        padding:0;
        margin:0;
        
    }
    .user-info-2 .table td{
        border-top:none;
        margin:0;
        
    }
   </style>
<div class="register-area ptb-50">
    <div class="container-fluid">
         <h3 class="text-secondary text-center text-uppercase pb-20 text-bold">Hi ! {{ Auth::user()->name }}</h3>

         <div class="card">
            <div class="text-right m-0">
                <a href="{{ url('/logout') }}" class="btn btn-warning text-bold text-white rounded m-2">Logout</a> 
              </div>
            <div class="card-body p-0">
              
         <div class="row">
       
            <div class="col-md-4 col-lg-4 ">
                <div class="nav flex-column align-content-center nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="container">
                        <img src="{{ asset('assets/img/product/user.png') }}" alt="">
                        <h5 class="text-dark text-center text-capitalize mb-10">{{ Auth::user()->name }}</h5>
                    </div>
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Your Orders</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Order Track</a>
                    
                </div>
             </div>
             
            <div class="col-md-8 col-lg-8">
                <div class="tab-content align-content-center user-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active pb-100" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="text-center text-secondary text-uppercase">Your Profile</h4>
   
                          <div class="container-fluid">
                            <div class="row">
                               <div class="col-md-6 col-lg-6 user-info">
                                    <h6 class="text-secondary text-center text-capitalize">Your Address</h6>
                                    <table class="table table-borderless table-responsive-sm" style="display: table; height: 50%;">
                                        
                                        <tbody>
                                            <tr>
                                                <td>Your name : </td>
                                                <td><strong>{{ Auth::user()->name }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Your Email : </td>
                                                <td><strong>{{ Auth::user()->email }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                               </div>
   
                               <div class="col-md-6 col-lg-6 user-info">
                                   @if ($shippings)
                                    <h6 class="text-secondary text-center text-capitalize">Your Billing Address</h6>
                                    <table class="table table-borderless">
                                        
                                        <tbody>
                                            <tr>
                                                <td>Your name : </td>
                                                <td><strong>{{ $shippings->name }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Your Email : </td>
                                                <td><strong>{{ $shippings->email }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Your Phone : </td>
                                                <td><strong>{{ $shippings->phone }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Your Address : </td>
                                                <td><strong>{{ $shippings->address }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                       @else
                                    @endif
                               </div>
   
                            </div>
                          </div>
   
                      </div>
   
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
   
                        <div class="container">
                                    <div class="card">
                                        <div class="card-header text-center">Change Your Password</div>
   
                                        <div class="card-body">
                                            <form id="changePassForm" method="post">
                                               @csrf
                                                <div class="form-group row">
                                                    <label for="oldpass" class="col-md-4 col-form-label text-md-right">Old Password</label>
   
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="oldpass" autofocus>
                                                            <small class="custome-message2" id="oldMessage"></small>
                                                    </div>
                                                </div>
   
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password">
                                                            <small class="custome-message2" id="newMessage"></small>
                                                    </div>
                                                </div>
   
                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
   
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>
   
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary rounded">Change Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                    </div>
   
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
   
                        <nav>
                            <h5 class="text-success text-center text-uppercase mb-20">Your Orders</h5>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pending Order</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Confirmed Order</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Canceled Order</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
   
                             <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="container user-info-2 table-responsive-md">
                                    <h6 class="text-primary text-center pt-20 mb-10">Pending Orders</h6>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Date of Order</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach ($orders as $order)
                                                   @if ($order->order_status=="pending")
                                                   <tr>
                                                       <td>{{ $order->status_code }}</td>
                                                       <td>{{ $order->type }}</td>
                                                       <td>{{ $order->total }}$</td>
                                                       <td>{{ $order->updated_at }}</td>
                                                       <td>
                                                       <a title="Quick View" id="{{ $order->id }}" class="btn btn-primary orderview btn-sm rounded" data-toggle="modal" data-target="#exampleModal" href="#"><i class="pe-7s-look"></i> View</a>
                                                       <button type="button"  title="Cancel Order" class="btn btn-danger btn-sm rounded ml-2"><i class="pe-7s-trash"></i> Cancel</button>
                                                       </td>
                                                   </tr>
                                                   @endif
                                               @endforeach
                                        </tbody>
                                    </table>
                               </div>
   
   
                             </div>
   
   
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="container user-info-2">
                                    <h6 class="text-success text-center pt-20 mb-10">Confirmed Orders</h6>
                                    <table class="table table-borderless table-responsive-sm">
                                        
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Date of Order</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($orders as $order)
                                               @if ($order->order_status=="confirmed")
                                                   <tr>
                                                       <td>{{ $order->status_code }}</td>
                                                       <td>{{ $order->type }}</td>
                                                       <td>{{ $order->total }}$</td>
                                                       <td>{{ $order->updated_at }}</td>
                                                       <td>
                                                       <a title="Quick View" id="{{ $order->id }}" class="btn btn-primary orderview btn-sm rounded" data-toggle="modal" data-target="#exampleModal" href="#"><i class="pe-7s-look"></i> View</a>
                                                       <button type="button"  title="Cancel Order" class="btn btn-danger btn-sm rounded ml-2"><i class="pe-7s-trash"></i> Cancel</button>
                                                       </td>
                                                   </tr>
                                               @endif
                                           @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
   
                            
   
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="container user-info-2">
                                    <h6 class="text-danger text-center pt-20 mb-10">Canceled Orders</h6>
                                    <table class="table table-borderless table-responsive-sm">
                                        
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Date of Order</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($orders as $order)
                                               @if ($order->order_status=="canceled")
                                                   <tr>
                                                       <td>{{ $order->status_code }}</td>
                                                       <td>{{ $order->type }}</td>
                                                       <td>{{ $order->total }}$</td>
                                                       <td>{{ $order->updated_at }}</td>
                                                       <td>
                                                       <a title="Quick View" id="{{ $order->id }}" class="btn btn-primary orderview btn-sm rounded" data-toggle="modal" data-target="#exampleModal" href="#"><i class="pe-7s-look"></i> View</a>
                                                       <button type="button"  title="Cancel Order" class="btn btn-danger btn-sm rounded ml-2"><i class="pe-7s-trash"></i> Cancel</button>
                                                       </td>
                                                   </tr>
                                               @endif
                                           @endforeach
                                        </tbody>
                                    </table>
                               </div>
                            </div>
                        </div>
                      
                      </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="container user-info-2">
                            <h6 class="text-warning text-center pt-20 mb-10">Orders in Progress</h6>
                            <table class="table table-borderless table-responsive-sm">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Date of Order</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($orders as $order)
                                       @if ($order->order_status=="progress")
                                           <tr>
                                               <td>{{ $order->status_code }}</td>
                                               <td>{{ $order->type }}</td>
                                               <td>{{ $order->total }}$</td>
                                               <td>{{ $order->updated_at }}</td>
                                               <td>
                                               <a title="Quick View" id="{{ $order->id }}" class="btn btn-primary orderview btn-sm rounded" data-toggle="modal" data-target="#exampleModal" href="#"><i class="pe-7s-look"></i> View</a>
                                               <button type="button"  title="Cancel Order" class="btn btn-danger btn-sm rounded ml-2"><i class="pe-7s-trash"></i> Cancel</button>
                                               </td>
                                           </tr>
                                       @endif
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
   
           </div>
            </div>
          </div>



     </div>
</div>

    <!-- modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" style="height:120%; top:-106px;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span class="pe-7s-close" aria-hidden="true"></span>
     </button>
     <div class="modal-dialog modal-quickview-width" role="document">
         <div class="modal-content">
             <div class="modal-body bg-white">

                     <div class="container user-info-2 table-responsive-md">
                         <h6 class="text-primary text-center pt-20 mb-10">Order Details</h6>
                         <table class="table table-borderless">
                             <thead>
                                 <tr>
                                     <th scope="col">Image</th>
                                     <th scope="col">code</th>
                                     <th scope="col">Name</th>
                                     <th scope="col">size</th>
                                     <th scope="col">color</th>
                                     <th scope="col">Price</th>
                                     <th scope="col">Qty</th>
                                     <th scope="col">Total</th>
                                 </tr>
                             </thead>
                             <tbody id="orderDetailsbyId">
                                 
                                 <tr>
                                     <td colspan="8"></td>
                                     <td><button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button></td>
                                 </tr>
                             </tbody>
                         </table>
                             

                     </div>

             </div>
         </div>
     </div>
 </div>
 <!--modal-end-->

 <script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script>
    $(document).ready( function () { 

      $('#changePassForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ url('/password-change') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                $('#oldMessage').html('');
                $('#newMessage').html('');
                if(data.message){
                  $('#oldMessage').append(`<span>` + data.message + ` </span>`); 
                
                }else{
                  toastr.success('Password Changed Successfully !!');
                  window.location.href = "/login";
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

    
      $(document).on('click', '.orderview', function(e){
            // 
            e.preventDefault();
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                url: "{{url('/order-quickview')}}/"+id,
                method: "GET",
                success: function(data){
                    $("#orderDetailsbyId").html("");
                //  console.log(data);
                    $.each(data.viewDetails, function(key,value){

                    $("#orderDetailsbyId").append(`
                        <tr v-for='viewDetais in orderQuickView'>
                            <td><img src="`+value.image+`" alt="" style="width:50px; height:50px;"></td>
                            <td>`+value.pro_code+`</td>
                            <td>`+value.product_name+`</td>
                            <td>`+value.size+`</td>
                            <td>`+value.color+`</td>
                            <td>`+value.price+`$</td>
                            <td>`+value.qty+`</td>
                            <td>`+value.price*value.qty+`$</td>
                        </tr>
                                    
                    `);

                    // $("#ptable").append(`
                    // <div class="custom-col-style-2 custom-col-4">
                    //         <div class="product-wrapper product-border mb-24">
                    //             <div class="product-img-3">
                    //                 <a href="product-details.html">
                    //                     <img src="`+value.image_one+`" alt="">
                    //                 </a>
                    //                 <div class="product-action-right">
                    //                     <a id="`+value.id+`" class="animate-right addtocart" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                    //                         <i class="pe-7s-look"></i>
                    //                     </a>
                    //                     <a class="animate-top" title="Add To Cart" href="#">
                    //                         <i class="pe-7s-cart"></i>
                    //                     </a>
                    //                     <a class="animate-left" title="Wishlist" href="#">
                    //                         <i class="pe-7s-like"></i>
                    //                     </a>
                    //                 </div>
                    //             </div>
                    //             <div class="product-content-4 text-center">
                    //                 <div class="product-rating-4">
                    //                     <i class="icofont icofont-star yellow"></i>
                    //                     <i class="icofont icofont-star yellow"></i>
                    //                     <i class="icofont icofont-star yellow"></i>
                    //                     <i class="icofont icofont-star yellow"></i>
                    //                     <i class="icofont icofont-star"></i>
                    //                 </div>
                    //                 <h4><a href="product-details.html">`+value.product_name+`</a></h4>
                    //                 <h5>$ `+value.selling_price+`</h5>
                    //             </div>
                    //         </div>
                    //     </div>
                    // `);
                   
                });
                }
            })
    });


    });
</script>

@endsection