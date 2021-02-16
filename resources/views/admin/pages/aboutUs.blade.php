@extends('admin.layouts')

@section('admin_content')

<link rel="stylesheet" href="{{ asset('admin/plugins/tagsinput/tagsinput.css') }}" crossorigin="anonymous">

{{-- <form action="" method="post" enctype="multipart/form-data"> --}}
<form action="{{ url('admin/update-about/') }}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-2">

            <!-- /.card-header -->
            <div class="card-body text-center">
              <h3 class="text-bold">ABOUT US</h3>
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

            <!-- general form elements -->
            <div class="card card-primary">
             
                <div class="card-body row">
                  <input type="hidden" value="{{ $abouts->id }}" name="id">
                    <div class="col-md-4">
                      
                        <div class="form-group">
                            <label class="form-control-label">Title-1 : <span class="text-danger">*</span></label>
                            <input class="form-control " type="text" maxlength="250" name="title1" value="{{ $abouts->title1 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des1" rows="3"  required>{{ $abouts->des1 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block1" value="1" @if ($abouts->block1 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-control-label">Title-2 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="50" name="title2" value="{{ $abouts->title2 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des2" rows="3"  required>{{ $abouts->des2 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block2" value="1" @if ($abouts->block2 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-control-label">Title-3 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title3" value="{{ $abouts->title3 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des3" rows="3"  required>{{ $abouts->des3 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block3" value="1" @if ($abouts->block3 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->

                
            </div>
            
          
      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <!-- general form elements -->
            <div class="card card-primary">
             
                <div class="card-body row">

                    <div class="col-md-4">
                      
                        <div class="form-group">
                            <label class="form-control-label">Title-4 : <span class="text-danger">*</span></label>
                            <input class="form-control " type="text" maxlength="250" name="title4" value="{{ $abouts->title4 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des4" rows="3"  required>{{ $abouts->des4 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block4" value="1" @if ($abouts->block4 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-control-label">Title-5 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title5" value="{{ $abouts->title5 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des5" rows="3"  required>{{ $abouts->des5 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block5" value="1" @if ($abouts->block5 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="form-control-label">Title-6 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title6" value="{{ $abouts->title6 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des6" rows="3"  required>{{ $abouts->des6 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block6" value="1" @if ($abouts->block6 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->

                
            </div>
            
          
      </div><!-- /.container-fluid -->

    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline ">
           
            <!-- /.card-header -->
            <div class="card-body">
              
              <div class="form-group">
                <label class="form-control-label">Title-7 : <span class="text-danger">*</span></label>
                <input class="form-control" type="text" maxlength="250" name="title7" value="{{ $abouts->title7 }}" required>
            </div>

            <div class="form-group">
                <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                <textarea class="form-control" name="des7" rows="3"  required>{{ $abouts->des7 }}</textarea>
            </div>

            <div class="form-check">
              <label class="ckbox">
                <input type="checkbox" name="block7" value="1" @if ($abouts->block7 == 1) checked="checked" @endif>
                <span> Enable Block</span>
              </label>
            </div>
              
              
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

            <!-- general form elements -->
            <div class="card card-primary">
             
                <div class="card-body row">

                    <div class="col-md-3">
                      
                        <div class="form-group">
                            <label class="form-control-label">Title-8 : <span class="text-danger">*</span></label>
                            <input class="form-control " type="text" maxlength="250" name="title8" value="{{ $abouts->title8 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des8" rows="3"  required>{{ $abouts->des8 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block8" value="1" @if ($abouts->block8 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="form-control-label">Title-9 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title9" value="{{ $abouts->title9 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des9" rows="3"  required>{{ $abouts->des9 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block9" value="1" @if ($abouts->block9 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="form-control-label">Title-10 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title10" value="{{ $abouts->title10 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des10" rows="3"  required>{{ $abouts->des10 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block10" value="1" @if ($abouts->block10 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="form-control-label">Title-11 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title11" value="{{ $abouts->title11 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des11" rows="3" required>{{ $abouts->des11 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block11" value="1" @if ($abouts->block11 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->

                
            </div>
            
          
      </div><!-- /.container-fluid -->

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <!-- general form elements -->
            <div class="card card-primary">
             
                <div class="card-body row">

                    <div class="col-md-3">
                      
                        <div class="form-group">
                            <label class="form-control-label">Title-12 : <span class="text-danger">*</span></label>
                            <input class="form-control " type="text" maxlength="250" name="title12" value="{{ $abouts->title12 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des12" rows="3"  required>{{ $abouts->des12 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block12" value="1" @if ($abouts->block12 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="form-control-label">Title-13 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="50" name="title13" value="{{ $abouts->title13 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des13" rows="3"  required>{{ $abouts->des13 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block13" value="1" @if ($abouts->block13 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label class="form-control-label">Title-14 : <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" maxlength="250" name="title14" value="{{ $abouts->title14 }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="des14" rows="3"  required>{{ $abouts->des14 }}</textarea>
                        </div>

                        <div class="form-check">
                          <label class="ckbox">
                            <input type="checkbox" name="block14" value="1"@if ($abouts->block14 == 1) checked="checked" @endif>
                            <span> Enable Block</span>
                          </label>
                        </div>

                    </div>



                </div>
                <!-- /.card-body -->

                
            </div>
            
          
      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline">
            <div class="card-header">
              <h3 class="card-title">
               <b>Banner Images</b>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                      <div class="col-lg-4">

                        <div class="form-group">
                          <label for="exampleInputFile">Image-1 </label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="file" class="custom-file-input" name="banner1" onchange="readURL(this);" accept="image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                          @error('banner1')
                              <div class="invalid-feedback-custom">{{ $message }}</div>
                             @enderror <br>
                          <span class="custom-file-control"></span> 
                          <img src="{{ URL::to($abouts->banner1)}}" style="height:100px; width:100px;" id="one" alt="image1">
                        </div>

                       </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                              <label for="exampleInputFile">Image-2 : </label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" id="file" class="custom-file-input" name="banner2" onchange="readURL1(this);" accept="image">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                              </div>
                              
                              @error('banner2')
                              <div class="invalid-feedback-custom">{{ $message }}</div>
                             @enderror <br>
                              <span class="custom-file-control"></span>
                              <img src="{{ URL::to($abouts->banner2)}}" style="height:100px; width:100px;" id="two" alt="image2">
                            </div>

                        </div>

                        <div class="col-lg-4">

                          <div class="form-group">
                            <label for="exampleInputFile">Image-3 :</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="banner3" onchange="readURL2(this);" accept="image">
                                
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                              @error('banner3')
                              <div class="invalid-feedback-custom">{{ $message }}</div>
                              @enderror <br>
                            <span class="custom-file-control"></span>
                            <img src="{{ URL::to($abouts->banner3)}}" style="height:100px; width:100px;"  id="three" alt="image3">
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
          <div class="card card-info">
            
            <!-- /.card-header -->
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              
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


<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {




     
     $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
       if(fileName){
         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
       }else{
         $(this).siblings(".custom-file-label").html("No file choosen");
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
