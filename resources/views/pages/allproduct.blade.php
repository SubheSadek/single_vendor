@extends('welcome')

@section('content')

<div class="shop-page-wrapper shop-page-padding ptb-50">
    <div class="container-fluid">
    <h4 class="text-center text-uppercase text-secondary mb-30">
        All Products
    </h4>
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="header-search">
                                <input placeholder="Search Products..." type="text">
                                <button><i class="ti-search"></i></button>
                                
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-categories">
                            <ul>
                                @foreach ($categories as $cat)
                                    <li><a href="{{ url('category/'.$cat->id) }}"> {{ $cat->cat_name }}<span></span></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    {{-- <p>Category Name : <strong> {{ $category->cat_name }}</strong></p> --}}
                                </div>
                                
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab"
                                        aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">
                                    @foreach ($allproducts as $product)
                                       <div class="col-lg-6 col-md-6 col-xl-3">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <a href="{{ url('product/details/' .$product->id) }}">
                                                    <img src="{{ asset($product->image_one) }}" alt="">
                                                </a>
                                                <span>-{{ intval(($product->selling_price-$product->discount_price)/$product->selling_price*100) }}%</span>
                                                <div class="product-action">
                                                    <a data-id="{{ $product->id}}" class="animate-left addwishlist" title="Wishlist" href="#">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                    {{-- <a class="animate-top" title="Add To Cart" href="">
                                                        <i class="pe-7s-cart"></i>
                                                    </a> --}}
                                                    <a id="{{ $product->id }}" class="animate-right addtocart" title="Add to Cart" data-toggle="modal" data-target="#exampleModal" href="#">
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
                                    </div> 
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="margin-left: 280px !important;">
                  {{ $allproducts->links() }}  
                </div>
                

            </div>
        </div>
    </div>
</div>



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