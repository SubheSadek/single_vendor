@extends('welcome')

@section('content')

@if (Cart::subtotal() == 0)
<div class="cart-main-area pt-35 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <img src="{{ asset('assets/img/product/empty_cart.png') }}" alt="">
                <h4>Your cart is empty.</h4><button type="button" class="btn btn-success rounded" onclick="(window.location='/')">Continue to Shipping</button>

            </div>
        </div>
    </div> 
</div>   
@else
<div class="cart-main-area pt-35 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading text-center">Cart</h1>
                
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th style="width: 15%;">Quantity</th>
                                    <th style="width: 10%;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                                @foreach ($carts as $row)
                                    <tr>
                                        <td class="product-remove"><a href="{{ url('remove-cart/'.$row->rowId) }}"><i class="pe-7s-close"></i></a></td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{ $row->options->images }}" width="85" height="100" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{ $row->name }} </a></td>
                                        <td class="product-name"><a href="#">{{ $row->options->size }} </a></td>
                                        <td class="product-name"><a href="#">{{ $row->options->color }} </a></td>
                                        <td class="product-price-cart"><span id="amount" >{{ $row->price }}</span></td>
                                        <td class="product-quantity">
                                           
                                           
                                            
                                                    <button class="btn btn-danger decrement" @if ($row->qty < 2) style="cursor: no-drop;" disabled @else  style="cursor: pointer;" @endif id="{{ $row->rowId }}">-</button>
                                                    
                                                    <input type="text" value="{{ $row->qty }}" style="height: auto;padding:5px;" name="qty" readonly>
                                                    <button class="btn btn-success increment" @if ($row->qty >=10) style="cursor: no-drop;"  disabled @else style="cursor: pointer;" @endif id="{{ $row->rowId }}">+</button>
                                                
                                            
                                        </td>
                                        <td>$ <span id="product-subtotal">{{$row->price*$row->qty}}</span></td>
                                    </tr>
                                @endforeach
                              
                                
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                  <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$<span class="subtotal">{{Cart::subtotal()}}</span></span></li>
                                    <li>(+) Shipping<span>$ 50</span></li>
                                    {{-- <li>Total<span>$ {{ Cart::Subtotal() +50 }}</span></li> --}}
                                    <li>Total<span>$ <span class="totalamount">{{ Cart::Subtotal() +50 }}</span></span></li>
                                </ul>
                                
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="cart-page-total text-center" style="margin-top:100px;">
                                @if (Auth::guard()->check())
                                <a href="{{ url('/checkout') }}">Proceed to checkout</a>
                                @else
                                <a href="#" data-target="#exampleModal" data-toggle="modal">Proceed to checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endif
                                    {{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width" style="margin: 73px auto !important;" role="document">
        <div class="modal-content">
            {{-- <div class="modal-body"> --}}
                @include('pages.auth.add-login')

            {{-- </div> --}}
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>

<script>
$(document).ready( function () {


            //load table via ajax
            function loadDataTable(){
                $.ajax({
                    url: "{{ url('/cart-cartdata') }}",
                    success: function(data){
                        $('#tableData').html(data);
                        
                    }
                })
            };
            loadDataTable();

            $(document).on('click', '.increment', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{url('/cart-subtotal')}}",
                method: "GET",
               
                success: function(data){
                        $('.subtotal').text(data);
                        $('.totalamount').text(parseInt(data)+50);
                }
            })
        

            $.ajax({
                url: "{{url('/update-qty')}}/"+id,
                method: "GET",
                beforeSend: function(){
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
                success: function(data){
                        if (data == "done") {
                            loadDataTable();
                        };
                }
            })
        });

            $(document).on('click', '.decrement', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{url('/cart-subtotal')}}",
                method: "GET",
               
                success: function(data){
                        $('.subtotal').text(data);
                        $('.totalamount').text(parseInt(data)+50);
                }
            })
            $.ajax({
                url: "{{url('/decrement-qty')}}/"+id,
                method: "GET",
                beforeSend: function(){
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
                success: function(data){
                        if (data == "done") {
                            loadDataTable();
                        };
                }
            })
        });


























})

</script>

@endsection