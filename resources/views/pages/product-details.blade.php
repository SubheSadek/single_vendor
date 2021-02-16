@extends('welcome')

@section('content')

<div class="product-details ptb-50 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-70">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="">
                                        <img src="{{ asset($prodetails->image_one) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pro-details2" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="">
                                        <img src="{{ asset($prodetails->image_two) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pro-details3" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="">
                                        <img src="{{ asset($prodetails->image_three) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="pro-details4" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="assets/img/product-details/bl4.jpg">
                                        <img src="assets/img/product-details/l4.jpg" alt="">
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="product-details-small nav mt-12" role=tablist>
                            <a class="active mr-40" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{ asset($prodetails->image_one) }}" alt="">
                            </a>
                            <a class="mr-40" href="#pro-details2" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{ asset($prodetails->image_two) }}" alt="">
                            </a>
                            <a class="mr-40" href="#pro-details3" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{ asset($prodetails->image_three) }}" alt="">
                            </a>
                            {{-- <a class="mr-12" href="#pro-details4" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="assets/img/product-details/s4.jpg" alt="">
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{ $prodetails->product_name }}</h3>
                    <div class="rating-number">
                        <div class="quick-view-rating">
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                        </div>
                        <div class="quick-view-number">
                            <span>2 Ratting (S)</span>
                        </div>
                    </div>
                    <div class="details-price">
                        <span>$ @if($prodetails->discount_price)
                            {{ $prodetails->discount_price }}
                            @else
                            {{ $prodetails->selling_price }}
                            @endif
                        </span>
                    </div>
                    <p>{!! $prodetails->product_details !!}</p>
                    <form action="{{ route('add.cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $prodetails->id }}">
                        <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Size*</label>
                                <select class="select" name="size">
                                    <option value="">- Please Select -</option>
                                    @foreach($product_size as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                    {{-- <option value="">xl</option>
                                    <option value="">ml</option>
                                    <option value="">m</option>
                                    <option value="">sl</option> --}}
                                </select>
                            </div>
                            <div class="select-option-part">
                                <label>Color*</label>
                                <select class="select" name="color">
                                    <option value="">- Please Select -</option>
                                    @foreach($product_color as $color)
                                    <option value="{{$color}}">{{$color}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <button type="submit" class="btn-hover-black" href="#">add to cart</button>
                            </div>
                            <div class="quickview-btn-wishlist">
                                <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                        </div>
                    </form>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">Categories :</li>
                            <li><a href="#">{{ $prodetails->cat_name }}</a></li>
                            {{-- <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li> --}}
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        {{-- <ul>
                            <li class="categories-title">Tags :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul> --}}
                    </div>
                    <div class="product-share">
                        <ul>
                            <li class="categories-title">Share :</li>
                            <li class="sharethis-inline-share-buttons"></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role=tablist>
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                    Description
                </a>
                <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                    Reviews & Comments (0)
                </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                    <p>{!! $prodetails->product_details !!}</p>
                </div>
                <div class="tab-pane fade" id="pro-review" role="tabpanel">
                    {{-- <a href="#">Be the first to write your review!</a> --}}
                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width="1000"></div>

					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $cat_id = $prodetails->category_id;
    $catProducts =DB::table('products')->where('products.category_id',$cat_id)->get();
@endphp
<!-- product area start -->
<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>Related products</h2>
        </div>
        <div class="product-style">
            <div class="related-product-active owl-carousel">
                @foreach ($catProducts as $product)
                    <div class="product-wrapper">
                    <div class="product-img">
                        <a href="#">
                            <img src="{{ asset($product->image_one) }}" alt="">
                        </a>
                        <span>-{{ intval(($product->selling_price-$product->discount_price)/$product->selling_price*100) }}%</span>
                        <div class="product-action">
                            <a data-id="{{ $product->id}}" class="animate-left addwishlist" title="Wishlist" href="#">
                                <i class="pe-7s-like"></i>
                            </a>
                            {{-- <a class="animate-top" title="Add To Cart" href="#">
                                <i class="pe-7s-cart"></i>
                            </a> --}}
                            <a id="{{$product->id}}" class="animate-right addtocart" title="Add to Cart" data-toggle="modal" data-target="#exampleModal" href="#">
                                <i class="pe-7s-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a class="text-capitalize" href="{{ url('product/details/' .$product->id) }}">{{ $product->product_name }}</a></h4>
                        <span style="margin-right:30px;">${{ $product->discount_price }}</span>
                        <span style="text-decoration: line-through;color:rgb(184 169 142);">${{ $product->selling_price }}</span>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div>
</div>
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
                            <div class="tab-pane fade" id="modal3" role="tabpanel">
                                <img src="" class="pimage3" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="quick-view-list nav" role="tablist">
                        <a class="active" href="#modal1" data-toggle="tab" role="tab">
                            <img src="" class="pimage" height="112" width="100" alt="">
                        </a>
                        <a href="#modal2" data-toggle="tab" role="tab">
                            <img src="" class="pimage2" height="112" width="100" alt="">
                        </a>
                        <a href="#modal3" data-toggle="tab" role="tab">
                            <img src="" class="pimage3" height="112" width="100" alt=" ">
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
                                <button class="btn-hover-black" type="submit">add to cart</button>
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

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=188954235558745&autoLogAppEvents=1"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ebbb2c121f7150012d541ea&product=inline-share-buttons&cms=website' async='async'></script>

<script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script type="text/javascript">

    $(document).on('click', '.addtocart', function(e){
            // 
            e.preventDefault();
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                url: "{{url('/product-shortview')}}/"+id,
                method: "GET",
                success: function(data){
                    $('#proId').val(data.product.id);
                   $('.pname').text(data.product.product_name);
                   $('.pimage').attr('src', "{{asset('')}}"+ data.product.image_one);
                   $('.pimage2').attr('src', "{{asset('')}}"+ data.product.image_two);
                   $('.pimage3').attr('src', "{{asset('')}}"+ data.product.image_three);
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