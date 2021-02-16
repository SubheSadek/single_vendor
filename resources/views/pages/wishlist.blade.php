@extends('welcome')

@section('content')

<div class="cart-main-area pt-95 pb-100 wishlist">
    {{-- <div class="container text-center">
        <h2 style="margin-top:20px;">Your Wishlist is Empty !!</h2>
        <a href="#" class="bnt btn-success rounded p-2">Continue to Shipping</a>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">wishlist</h1>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishProduct as $product)
                                    <tr>
                                        <td class="product-remove"><a href="{{ url('delete-wishlist/'.$product->id) }}"><i class="pe-7s-close"></i></a></td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{ $product->image_one }}" height="100px" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{ $product->product_name }}</a></td>
                                        <td class="product-price-cart"><span class="amount">$ {{ $product->discount_price }}</span></td>

                                        <td class="product-name">
                                            <form action="{{ url('/wishto-cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                               <button type="submit" class="btn btn-success rounded text-white" style="cursor: pointer;">Add to Cart</button>
                                            </form>
                                            
                                        </td>
                                    </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection