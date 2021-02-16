@extends('admin.layouts')

@section('admin_content')

<section class="content">
  <div class="content-wrapper"> <br>
    <div class="container">
        <div class="row">
            <div class="con-lg-8 col-md-8 m-auto">
                        <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="text-center">Company Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('/admin/update-setting') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $info->id }}">
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Company name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="company_name" @if($info->company_name) value="{{ $info->company_name }}" @endif class="form-control" required> 
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" @if($info->email) value="{{ $info->email }}" @endif class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone One:</label>
                            <div class="col-sm-8 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+880</span>
                                  </div>
                                <input type="tel" name="phone_one" @if($info->phone_one) value="{{ $info->phone_one }}" @endif class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone Two: (optional)</label>
                            <div class="col-sm-8">
                                <input type="tel" name="phone_two" @if($info->phone_two) value="{{ $info->phone_two }}" @endif class="form-control" placeholder="Phone Two">
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Address:</label>
                            <div class="col-sm-8">
                                <input type="text" name="address"  @if($info->address) value="{{ $info->address }}" @endif class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Company Logo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="logo" class="form-control" onchange="readURL(this);" accept="image">
                                @error('logo')
                                <div class="invalid-feedback-custom">{{ $message }}</div>
                               @enderror
                               @if ($info->logo) 
                               <br>
                                   <img src="{{ URL::to($info->logo)}}" id="one" alt="">
                               @endif
                               
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Facebook:</label>
                            <div class="col-sm-8">
                                <input type="text" name="facebook" @if($info->facebook) value="{{ $info->facebook }}" @endif class="form-control" placeholder="Facebook">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Youtube:</label>
                            <div class="col-sm-8">
                                <input type="text" name="youtube" @if($info->youtube) value="{{ $info->youtube }}" @endif class="form-control" placeholder="Youtube">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Instagram:</label>
                            <div class="col-sm-8">
                                <input type="text" name="instagram" @if($info->instagram) value="{{ $info->instagram }}" @endif class="form-control" placeholder="Instagram">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Twitter:</label>
                            <div class="col-sm-8">
                                <input type="text" name="twitter" @if($info->twitter) value="{{ $info->twitter }}" @endif class="form-control" placeholder="Twitter">
                            </div>
                            </div>
                            
                            
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-info text-bold"> Update Info </button>
                    </div>
                    <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>

  </div>
</section>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script>
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

@endsection