@extends('admin.layouts')

@section('admin_content')

<link rel="stylesheet" href="{{ asset('admin/plugins/tagsinput/tagsinput.css') }}" crossorigin="anonymous">

<form action="{{ url('admin/update-product/'. $product->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  {{-- <input type="hidden" value="{{ $product->id }}" id="pro_id" name="id"> --}}
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
              <h3 class="text-bold">Update Product</h3>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
             
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-control-label">Product Name : <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name" value="{{ $product->product_name}}" required>
                    </div>

                      <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="{{ $product->product_code}}"  required>
                    </div>

                    <div class="form-group">
                      <label class="form-control-label">Quantity <span class="text-danger">*</span></label>
                      <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity}}"  required>
                    </div>
                      
                      <div class="form-group">
                        <label class="form-control-label">Selling Price <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price"  value="{{ $product->selling_price}}" placeholder="Selling Price" required>
                      </div>
 
                      
                      <div class="form-group">
                        <label class="form-control-label">Discount Price</label>
                        <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price}}"  placeholder="Discount Price">
                      </div>

                    
                 
                 
                </div>
                <!-- /.card-body -->

                
            </div>
            <!-- /.card -->


            <!-- /.card -->

          </div>
          
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              
              <div class="card-body">

                   

                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Category: <span class="text-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Category" required name="cat_id" required>
                        <option value="" label="Choose Category"></option>
                        @foreach($category as $row)
                            <option value="{{ $row->id }}" 
                                @if ($row->id == $product->category_id) selected="selected" @endif>
                                {{ $row->cat_name }}
                            </option>
                        @endforeach
                      </select>
                    </div>


                  <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Subcategory: <span class="text-danger">*</span></label>
                      <select class="form-control select2" name="subcat_id" required>
                        
                        @foreach($subcategory as $row)
                            <option value="{{ $row->id }}"
                                @if ($row->id == $product->subcat_id) selected="selected" @endif>
                                {{ $row->subcat_name }}
                            </option>
                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand: <span class="text-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose country" name="brand_id" required>
                        <option label="Choose Brand"></option>
                        @foreach($brand as $br)
                            <option value="{{ $br->id }}"
                                @if ($product->brand_id ==$br->id) selected="selected" @endif>
                                {{ $br->brand_name }}
                            </option>
                        @endforeach
                      </select>
                    </div>
                     
                    <div class="form-group">
                      <label class="form-control-label">Video Link</label>
                       <input class="form-control" placeholder="video link" value="{{ $product->video_link}}" name="video_link">
                    </div>

                    <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Color :</label><br>
                          <input class="form-control lg-4" type="text" name="product_color"  value="{{ $product->product_color}}" data-role="tagsinput" id="color">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Size :</label><br>
                          <input class="form-control" type="text" name="product_size" value="{{ $product->product_size}}" id="size" data-role="tagsinput">
                        </div>
                      </div>

                    </div>

              </div>
              <!-- /.card-body -->
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline ">
            <div class="card-header">
              <h3 class="card-title">
               <b>Product Details : </b><span class="text-danger">*</span>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                <textarea class="textarea" name="product_details" >
                    {{$product->product_details}}
                </textarea>
              
              
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>



    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline">
            <div class="card-header">
              <h3 class="card-title">
               <b>Product Images</b>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                      <div class="col-lg-4">

                        <div class="form-group">
                          <label for="exampleInputFile">Image One (Main Thumbnail) <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" accept="image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                          <span class="custom-file-control"></span>
                          <img src="{{ URL::to($product->image_one)}}" style="height:100px; width:100px;" id="one" alt="">
                        </div>

                       </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                              <label for="exampleInputFile">Image Two : </label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" accept="image">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                              </div>
                              <span class="custom-file-control"></span>
                              <img src="{{ URL::to($product->image_two)}}" style="height:100px; width:100px;" id="two" alt="image">
                            </div>

                        </div>

                        <div class="col-lg-4">

                          <div class="form-group">
                            <label for="exampleInputFile">Image Three :</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" accept="image">
                                
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                            <span class="custom-file-control"></span>
                            
                            <img src="{{ URL::to($product->image_three)}}" style="height:100px; width:100px;"  id="three" alt="image">
                          </div>

                      </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card  card-info">
            
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
            
                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="main_slider" @if ($product->main_slider == 1) checked="checked" @endif value="1">
                        <span>Main Slider</span>
                      </label>
                  </div>
                  <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="hot_deal" @if ($product->hot_deal == 1) checked="checked" @endif value="1">
                        <span>Hot Deal</span>
                      </label>
                  </div>
                  <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="best_rated" @if ($product->best_rated == 1) checked="checked" @endif value="1">
                        <span>Best Rated</span>
                      </label>
                  </div>
                  <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="trend" value="1" @if($product->trend == 1) checked="checked" @endif>
                        <span>Trend Product</span>
                      </label>
                  </div>
                  <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="mid_slider" value="1" @if ($product->mid_slider == 1) checked="checked" @endif >
                        <span>Mid Slider</span>
                      </label>
                  </div>
                  <div class="col-lg-4">
                      <label class="ckbox">
                              <input type="checkbox" name="hot_new" value="1" @if($product->hot_new == 1) checked="checked" @endif>
                              <span>Hot New</span>
                            </label>
                  </div>
        
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="buyone_getone" @if($product->buyone_getone == 1) checked="checked" @endif value="1">
                    <span>Buy One Get One</span>
                  </label>
                </div>
    
    
              </div>
              
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            
            <!-- /.card-header -->
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                <button type="reset" class="btn btn-danger btn-block">Cancel</button>
              
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  


</section>
</form>
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/tagsinput/bootstrap-tagsinput.min.js') }}"></script>


<script type="text/javascript">
  $(document).ready(function() {

      //add new brand data
      $('#addProductForm').on('submit', function(e){
         e.preventDefault();
         $.ajax({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             method: "POST",
             url: "{{ route('store.product') }}",
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData: false,
             success: function(data){

                 toastr.success('Product created succefully !!');
                 location.reload();
          
             },
              error: function (error) {
                 
             }
         });
     });


     
     $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
       if(fileName){
         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
       }else{
         $(this).siblings(".custom-file-label").html("No file choosen");
       }
     });
            

     $('select[name="cat_id"]').on('change', function(){
         var cat_id = $(this).val();
         if(cat_id) {
             $.ajax({
                 url: "{{  url('admin/get-subcat') }}/"+cat_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    var d =$('select[name="subcat_id"]').empty();
                       $.each(data, function(key, value){

                           $('select[name="subcat_id"]').append('<option value="'+ value.id +'">' + value.subcat_name + '</option>');

                       });

                 },
                
             });
         } else {
             alert('danger');
         }

     });

    





 });

</script>

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#one')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>
<script type="text/javascript">
  function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#two')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>
<script type="text/javascript">
  function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#three')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>
@endsection
