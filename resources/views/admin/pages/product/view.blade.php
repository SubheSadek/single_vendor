@extends('admin.layouts')

@section('admin_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card mt-2">
                  <div class="card-header">
                    <h3 class="card-title">
                     <a href="{{ route('show.product') }}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Previous</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body text-center">
                    <h3 class="text-bold">Product Details</h3>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- ./row -->
          </section>
          

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
            
              
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-6 table-responsive">
                  <table class="table table-borderless">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Product name :</td>
                      <td><b>{{ $product->product_name }}</b></td>
                    </tr>

                    <tr>
                      <td>Product Code :</td>
                      <td><b>{{ $product->product_code }}</b></td>
                    </tr>

                    <tr>
                      <td>Quantity :</td>
                      <td><b>{{ $product->product_quantity }}</b></td>
                    </tr>

                    <tr>
                      <td>Selling Price :</td>
                      <td><b>{{ $product->selling_price }} $</b></td>
                    </tr>

                    <tr>
                      <td>Discount Price :</td>
                      <td><b>{{ $product->discount_price }} $</b></td>
                    </tr>

                     <tr>
                      <td>Product color</td>
                      <td><b>{{ $product->product_color }}</b></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>


                <div class="col-6 table-responsive">
                  <table class="table table-borderless">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                      <td>Category :</td>
                      <td><b>{{ $product->cat_name }}</b></td>
                    </tr>

                    <tr>
                      <td>Subcategory :</td>
                      <td><b>{{ $product->subcat_name }}</b></td>
                    </tr>

                    <tr>
                      <td>Brand :</td>
                      <td><b>{{ $product->brand_name }}</b></td>
                    </tr>

                    <tr>
                      <td>Video link :</td>
                      <td><b>{{ $product->video_link }}</b></td>
                    </tr>
                   
                    <tr>
                      <td>Product Size</td>
                      <td><b>{{ $product->product_size }}</b></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                
                <div class="row">
                    <div class="col-12">
                      <p class="text-info" style="font-size:20px;">Product Details :</p>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="box-shadow: 0 0 33px rgba(0,0,0,0.125), 0 5px 3px rgba(0,0,0,.2) !important;">
                            <div class="card-body">
                              <p>{!! $product->product_details !!}</p>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- Main content -->
            <div class="invoice p-5 mb-3">
                
                <div class="row">
                    <div class="col-4">
                        <lebel>Image One (Main Thumbnail)</lebel>
                        <label class="custom-file">
                          <img src="{{ URL::to($product->image_one) }}" style="height: 100px; width: 100px;" >
                        </label>
                    </div>
                    <div class="col-4">
                        <lebel>Image Two</lebel>
                        <label class="custom-file">
                          <img src="{{ URL::to($product->image_two) }}" style="height: 100px; width: 100px;" >
                        </label>
                    </div>
                    <div class="col-4">
                        <lebel>Image Three</lebel>
                        <label class="custom-file">
                          <img src="{{ URL::to($product->image_three) }}" style="height: 100px; width: 100px;" >
                        </label>
                    </div>
                    
                </div>
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- Main content -->
            <div class="invoice p-5 mb-3">
                
                <div class="row">
                    <div class="col-lg-4">
                        <label class="">
                        @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span> 
                  @endif
                    <span>Main Slider</span>
                  </label>
                      </div>
                      <div class="col-lg-4">
                        <label >
                    @if($product->hot_deal == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span> 
                  @endif
                    <span>Hot Deal</span>
                  </label>
                      </div>
                      <div class="col-lg-4">
                        <label class="">
                    @if($product->best_rated == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span> 
                  @endif
                    <span>Best Rated</span>
                  </label>
                      </div>
                      <div class="col-lg-4">
                        <label class="">
                    @if($product->trend == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span> 
                  @endif
                    <span>Trend Product</span>
                  </label>
                      </div>
                      <div class="col-lg-4">
                        <label class="">
                    @if($product->mid_slider == 1)
                    <span class="badge badge-success">Active</span> 
                  @else
                  <span class="badge badge-danger">Inactive</span> 
                  @endif
                    <span>Mid Slider</span>
                  </label>
                      </div>
                      
                      <div class="col-lg-4">
                        <label class="">
                            @if($product->hot_new == 1)
                            <span class="badge badge-success">Active</span> 
                          @else
                          <span class="badge badge-danger">Inactive</span> 
                          @endif
                        <span>Hot New</span>
                        </label>
                      </div>
                    
                </div>
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection