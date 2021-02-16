@extends('welcome')

@section('content')


<div class="electronic-banner-area">
    <div class="custom-row-2">
        <div class="custom-col-style-2 electronic-banner-col-3 mb-30">
            <div class="electronic-banner-wrapper">
                <img src="assets/img/product/baner15.jpg" alt="">
                <div class="electro-banner-style electro-banner-position">
                    <h1>Live 4K! </h1>
                    <h2>up to 20% off</h2>
                    <h4>Amazon exclusives</h4>
                    <a href="{{ url('/product/details/50') }}">Buy Now→</a>
                </div>
            </div>
        </div>
        <div class="custom-col-style-2 electronic-banner-col-3 mb-30">
            <div class="electronic-banner-wrapper">
                <img src="assets/img/product/baner16.jpg" alt="">
                <div class="electro-banner-style electro-banner-position2">
                    <h1>Xoxo ssl </h1>
                    <h2>up to 15% off</h2>
                    <h4>Amazon exclusives</h4>
                    <a href="{{ url('/product/details/46') }}">Buy Now→</a>
                </div>
            </div>
        </div>
        <div class="custom-col-style-2 electronic-banner-col-3 mb-30">
            <div class="electronic-banner-wrapper">
                <img src="assets/img/product/baner17.jpg" alt="">
                <div class="electro-banner-style electro-banner-position3">
                    <h1>BY Laptop</h1>
                    <h2>Super Discount</h2>
                    <h4>Amazon exclusives</h4>
                    <a href="{{ url('/product/details/46') }}">Buy Now→</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
    <div class="container-fluid">
        <div class="section-title-4 text-center mb-40">
            <h2>Products</h2>
        </div>
        <div class="top-product-style">
            <div id="myDiv" class="product-tab-list3 text-center mb-50 nav product-menu-mrg" role="tablist">
                <a class="demo active-custome mb-3" href="#electro1" data-toggle="tab" role="tab">
                    <h4>All Products </h4>
                </a>
                @foreach ($categories as $cat)
                  <a class="demo" href="#electro3"  id="{{$cat->id}}" onclick="productview(this.id)" data-toggle="tab" role="tab">
                    <h4>{{ $cat->cat_name }}</h4>
                  </a>
                @endforeach
                

               
            </div>
            <div class="tab-content">
                <div class="tab-pane active show fade" id="electro1" role="tabpanel">
                    <div class="custom-row-2">
                        @foreach ($allproducts as $product)
                            <div class="custom-col-style-2 custom-col-4">
                                <div class="product-wrapper product-border mb-24">
                                    <div class="product-img-3">
                                        <a href="{{ url('product/details/' .$product->id) }}">
                                            <img src="{{ $product->image_one}}" alt="">
                                        </a>
                                        <div class="product-action-right">
                                            <a id="{{$product->id}}" class="animate-right addtocart" href="#" data-target="#exampleModal" data-toggle="modal" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            {{-- <a class="animate-top" title="Add To Cart" href="#">
                                                <i class="pe-7s-cart"></i>
                                            </a> --}}
                                            <a data-id="{{ $product->id}}" class="animate-left addwishlist" title="Wishlist" href="#">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <div class="product-content-4 text-center">
                                        <div class="product-rating-4">
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star"></i>
                                        </div>
                                        <h4><a href="{{ url('product/details/' .$product->id) }}">{{ $product->product_name }}</a></h4>
                                       
                                        <h5>$ {{ $product->discount_price }}</h5>
                                    </div> --}}
                                    <div class="product-content text-center">
                                        <h4><a href="{{ url('product/details/' .$product->id) }}">{{ $product->product_name }} </a></h4>
                                        <span class="mr-15">${{ $product->discount_price }}</span>
                                        <span class="text-secondary"><strike>${{ $product->selling_price }}</strike> </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="custom-col-style-2 custom-col-4">
                            <div class="product-wrapper product-border mb-24" style="border:none;">
                                <div class="product-img-3" style="margin-top:100px;">
                                    <a href="">
                                        <img src="assets/img/product/view_more.png" alt="">
                                    </a>
                                   
                                </div>
                                
                            </div>
                        </div>
                        


                    </div>
                </div>
                <div class="tab-pane fade" id="electro3" role="tabpanel">
                    <div class="custom-row-2"  id="ptable">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area wrapper-padding pt-30 pb-95">
    <div class="container-fluid">
        <div class="electro-fexible-banner bg-img" style="background-image: url(assets/img/product/baner19.jpg)">
            <div class="fexible-content">
                <h3>Play with flexible</h3>
                <p>Multicontrol Smooth Controller, Black Color All Buttons
                    <br>are somooth, Super Shine.</p>
                <a class="btn-hover flexible-btn" href="{{ url('/category/13') }}">Buy Now</a>
            </div>
        </div>
    </div>
</div>
<div class="best-selling-area pb-95">
    <div class="section-title-4 text-center mb-60">
        <h2>Best Selling</h2>
    </div>
    <div class="best-selling-product">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <div class="best-selling-left">
                    <div class="product-wrapper">
                        <div class="product-img-4">
                            <a href="#"><img src="assets/img/product/electro9.jpg" alt=""></a>
                            <div class="product-action-right">
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content-5 text-center">
                            <div class="product-rating-4">
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                            </div>
                            <h4><a href="product-details.html">desktop C27F551</a></h4>
                            <span>Headphone</span>
                            <h5>$133.00</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="best-selling-right">
                    <div class="custom-container">
                        <div class="coustom-row-3">
                            @foreach ($bestproducts as $product)
                                <div class="custom-col-style-3 custom-col-3">
                                <div class="product-wrapper mb-6">
                                    <div class="product-img-4">
                                        <a href="{{ url('product/details/' .$product->id) }}">
                                            <img src="{{ $product->image_one }}" alt=" ">
                                        </a>
                                        <div class="product-action-right">
                                             {{-- <a id="{{$product->id}}" class="animate-right addtocart" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                    <i class="pe-7s-look"></i>
                                </a> --}}
                                            <a id="{{$product->id}}" class="animate-top addtocart" title="Add To Cart" href="#" data-target="#exampleModal" data-toggle="modal" >
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            <a data-id="{{ $product->id}}" class="animate-left addwishlist" title="Wishlist" href="#">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-6">
                                        <div class="product-rating-4">
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                            <i class="icofont icofont-star yellow"></i>
                                        </div>
                                        <h4><a href="{{ url('product/details/' .$product->id) }}">{{ $product->product_name }}</a></h4>
                                        <h5>$ {{ $product->discount_price }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="androit-banner-wrapper wrapper-padding pb-175">
    <div class="container-fluid">
        <div class="androit-banner-img bg-img" style="background-image: url(assets/img/product/baner36.jpg)">
            <div class="androit-banner-content">
                <h3>Xolo Fast T2 Smartphone, Android <br>7.0 Unlocked.</h3>
                <a href="{{ url('product/details/49') }}">Buy Now →</a>
            </div>
            <div class="banner-price text-center">
                <div class="banner-price-position">
                    <span class="banner-price-new">$125.00</span>
                    <span class="banner-price-old">$199.00</span>
                </div>
            </div>
            <div class="phn-img">
                <img src="assets/img/product/baner10.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="product-area-2 wrapper-padding pb-70">
    <div class="container-fluid">
        <div class="row">

            @foreach ($bestproducts as $product)
                <div class="col-lg-6 col-xl-4">
                    <div class="product-wrapper product-wrapper-border mb-30">
                        <div class="product-img-5">
                            <a href="#">
                                <img src="{{ $product->image_one }}" alt="">
                            </a>
                        </div>
                        <div class="product-content-7">
                            <h4><a href="#">{{ $product->product_name }}</a></h4>
                            <div class="product-rating-4">
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star"></i>
                            </div>
                            <h5>$ {{ $product->discount_price }}</h5>
                            <div class="product-action-electro">
                               
                                <a id="{{$product->id}}" class="animate-top addtocart" href="#" title="Add To Cart" data-target="#exampleModal" data-toggle="modal">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a data-id="{{ $product->id}}" class="animate-left addwishlist" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                {{-- <a class="animate-right" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                    <i class="pe-7s-repeat"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           

        </div>
    </div>
</div>
<div class="brand-logo-area-2 wrapper-padding ptb-80">
    <div class="container-fluid">
        <div class="brand-logo-active2 owl-carousel">
            @foreach ($brands as $brand)
                <div class="single-brand">
                    <img src="{{ $brand->brand_logo }}" height="90" width="90" alt=" ">
                </div>
            @endforeach
            

        </div>
    </div>
</div>
{{-- <div class="newsletter-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="section-title-5">
                    <h2>Newsletter</h2>
                    <p>Sign Up for get all update news & Get <span>15% off</span></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="newsletter-style-3">
                    <div id="mc_embed_signup" class="subscribe-form-3 pr-50">
                        <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Enter Your E-mail" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div class="mc-news" aria-hidden="true">
                                    <input type="text" name="" tabindex="-1" value="">
                                </div>
                                <div class="clear">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


                                    {{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-left">
                    <div class="quick-view-learg-img">
                        <div class="quick-view-tab-content tab-content">
                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                <img src="" class="pimage" alt="">
                            </div>
                            <div class="tab-pane fade" id="modal2" role="tabpanel">
                                <img src="" class="pimage2" alt="">
                            </div>
                            <div class="tab-pane fade " id="modal3" role="tabpanel">
                                <img src="" class="pimage3" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="quick-view-list nav" role="tablist">
                        <a class="active" href="#modal1" id="modal_test" data-toggle="tab" role="tab">
                            <img src="" class="pimage" height="112" width="100" alt="">
                        </a>
                        <a href="#modal2" data-toggle="tab" role="tab" >
                            <img src="" class="pimage2" height="112" width="100" alt="">
                        </a>

                        <a href="#modal3" data-toggle="tab" role="tab" id="pimage3" class="pimage3_test">
                            {{-- <img src="" class="pimage3" height="112" width="100" alt=" "> --}}
                        </a>
                    </div>
                </div>
                <form  action="{{ route('add.cart')}}" method="post">
                    @csrf
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <h3 class="pname"></h3>
                        <div class="price">
                            <span class="new">$<i id="pdiscount"></i></span>
                            <span class="old">$<i id="pselling"></i></span>
                        </div>
                        <div class="rating-number">
                            <div class="quick-view-rating">
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                            </div>
                            <div class="quick-view-number">
                                <span>2 Ratting (S)</span>
                            </div>
                        </div>
                        <p id="pdetails"></p>

                        <input type="hidden" name="id" id="proId">

                        <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Size*</label>
                                <select class="select" name="size" id="size">
                                </select>
                            </div>
                            <div class="select-option-part">
                                <label>Color*</label>
                                <select class="select" name="color" id="color">
                                </select>
                            </div>
                        </div>
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <button class="btn-hover-black" style="cursor: pointer;" type="submit">add to cart</button>
                            </div>
                            {{-- <div class="quickview-btn-wishlist">
                                <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script type="text/javascript">
    function productview(id){
        
        $.ajax({
             url: "{{  url('/category-product') }}/"+id,
             type:"GET",
             dataType:"json",
             success:function(data) {
                 $("#ptable").html("");
                //  console.log(data);
                    $.each(data.product, function(key,value){
                    $("#ptable").append(`
                    <div class="custom-col-style-2 custom-col-4">
                            <div class="product-wrapper product-border mb-24">
                                <div class="product-img-3">
                                    <a href="{{ url('product/details/`+value.id+`') }}">
                                        <img src="`+value.image_one+`" alt="">
                                    </a>
                                    <div class="product-action-right">
                                        <a id="`+value.id+`" class="animate-right addtocart" href="#" data-target="#exampleModal" data-toggle="modal" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a id="`+value.id+`" onclick="testing(this.id)" class="animate-left addwishlist" title="Wishlist" style="cursor:pointer;">
                                                <i class="pe-7s-like"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4><a href="{{ url('product/details/`+value.id+`') }}">{{ $product->product_name }} </a></h4>
                                    // <span class="mr-15">$`+value.discount_price+`</span>
                                    <span class="text-secondary"><strike>$`+value.selling_price+`</strike> </span>
                                </div>
                                

                            </div>
                        </div>
                    `);
                   
                });


             }
        })
    }

    function testing(id){
        if(id) {
               $.ajax({
                   url: "{{  url('/add-wishlist') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                    
                     if(data=='error'){
                        toastr.error('At first, Login to your account !');
                     }else if(data=='warning'){
                        toastr.warning('Product Already has on your wishlist.');
                     }else{
                        toastr.success('Successfully Added to wishlist !');  

                     }

                   },
                  
               });
           } else {
               alert('danger');
           }
            
    }

    $(document).on('click', '.addtocart', function(e){
            // 
            e.preventDefault();
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                url: "{{url('/product-shortview')}}/"+id,
                method: "GET",
                success: function(data){
                    $('#modal_test').click();
                    $('#proId').val(data.product.id);
                   $('.pname').text(data.product.product_name);
                   $('.pimage').attr('src', data.product.image_one);
                   $('.pimage2').attr('src', data.product.image_two);
                   $('.pimage3').attr('src', data.product.image_three);
                //    $('#pimage3').html("");
                    if(data.product.image_three ==null){
                        $('#pimage3').html("");
                    }else{
                        $('.pimage3_test').html("");
                        
                        $('#pimage3').append(`
                        <img src="`+data.product.image_three+`" height="112" width="100" alt=" ">
                        `);
                        
                    }
                   

                   $('#pselling').text(data.product.selling_price);
                   $('#pdiscount').text(data.product.discount_price);
                   $('#pdetails').html(data.product.product_details).text();
				

                    var d=$('select[name="size"]').empty();
                    $('select[name="size"]').append('<option value="">--please select--</option>');
					$.each(data.size, function(key,value){
						$('select[name="size"]').append('<option value="' + value +'">' + value + '</option>');
					});

					var d=$('select[name="color"]').empty();
                    $('select[name="color"]').append('<option value="">--please select--</option>');
					$.each(data.color, function(key,value){
						$('select[name="color"]').append('<option value="' + value +'">' + value + '</option>');
					});
                }
            })
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
          $('.addwishlist').on('click', function(e){  
            var id = $(this).data('id');
            if(id) {
               $.ajax({
                   url: "{{  url('/add-wishlist') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                    
                     if(data=='error'){
                        toastr.error('At first, Login to your account !');
                     }else if(data=='warning'){
                        toastr.warning('Product Already has on your wishlist.');
                     }else{
                        toastr.success('Successfully Added to wishlist !');  

                     }

                   },
                  
               });
           } else {
               alert('danger');
           }
            e.preventDefault();
       });
   });

</script>



@endsection