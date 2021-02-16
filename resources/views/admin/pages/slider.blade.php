@extends('admin.layouts')

@section('admin_content')
      <!-- Main content -->
<section class="content">
         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSliderModal">
                    <i class="fa fa-plus"> <b>Create new</b></i> 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Title(Big)</th>
                    <th>Title(Small)</th>
                    <th>Image </th>
                    <th>Status</th>
                    <th>Action action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($sl = 1)
                    @foreach($sliders as $slider)
                  <tr>
                    <td>{{ $sl++ }}</td>

                    {{-- <td>{{ $slider->title }}</td> --}}
                    <td>{{ Str::limit($slider->title, 30) }}</td>
                    <td>{{ Str::limit($slider->title_two, 30) }}</td>

                    <td>
                      @if($slider->image == '')
                      No Image
                      @else
                      <img src="{{ asset($slider->image) }}" height="50px" width="50px" alt="">
                      @endif
                    </td>

                    <td>
                        @if($slider->status == 1)
                        <a href="{{ URL::to('admin/slider-unpublish/' .$slider->id) }}" class="btn btn-light unpublish text-success" data-toggle="tooltip" title="Published">
                            <i class="fa fa-check"></i>
                        </a>
                        @else
                        <a href="{{ URL::to('admin/slider-publish/' .$slider->id) }}" class="btn btn-light text-danger publish" data-toggle="tooltip" title="Unpublished">
                            <i class="fa fa-times"></i>
                        </a>
                        @endif
                    </td>
                    <td>
                        <a id="{{$slider->id}}" class="btn btn-info btn-sm edit  text-white" data-toggle="modal" data-target="#editSliderModal">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a id="{{$slider->id}}" href="" class="btn btn-danger btn-sm text-white ml-2 delete">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
                                   <!--Create Modal-->

 <div class="modal fade" id="addSliderModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left:145px;">Create Brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form id="addSliderForm" enctype="multipart/form-data">
            @csrf
            <div class="card-body pt-0">

              <div class="form-group">
                <label>Title(Big)</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Big title">
                <span id="title_message" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Title(Small)</label>
                <input type="text" name="title_two" class="form-control input-group-sm" id="title_two" placeholder="Small Title">
                <span id="title_two_message" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Slider Image</label>
                <input type="file" name="image" class="form-control" id="filePhoto">
                <span id="image_message" class="invalid-feedback-custom"></span>
                <img src="" id="previewHolder" width="150px">
              </div>
              
              <div class="form-group">
                <label for="status">Publication status</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="modal-footer justify-content-between border-0 pt-0">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
              <button type="submit" class="btn btn-success"><b>Create</b></button>
            </div>
          </form>

        </div>
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
                                  <!--Edit Modal-->
<div class="modal fade" id="editSliderModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left:145px;">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form id="editSliderForm" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="edit_id">
            <div class="card-body pt-0">
              
              <div class="form-group">
                <label>Title(Big)</label>
                <input type="text" name="title" class="form-control" id="edit_title">
                <span id="editSliderMessage" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Title(Small)</label>
                <input type="text" name="title_two" class="form-control" id="edit_title_two">
                <span id="editSliderMessage_two" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Image</label>
                 <input type="file" name="image" class="form-control" id="filePhoto2">
                  <img src="" id="previewHolder2" width="150px">
                  <span id="editImageMessage" class="invalid-feedback-custom"></span>
              </div>
              
              
            </div>
            <!-- /.card-body -->
            <div class="modal-footer justify-content-between border-0 pt-0">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
              <button type="submit" class="btn btn-success"><b>Update</b></button>
            </div>
          </form>

        </div>
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

</section>
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready( function () {

         //add new brand data
         $('#addSliderForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ url('admin/create-slider/') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                      $('#addSliderModal').modal('hide');
                        toastr.success('Slider created succefully !!');
                        location.reload();
                 
                    },
                     error: function (error) {
                        $('#title_message').html('');
                        $('#title_two_message').html('');
                        $('#image_message').html('');


                        if(error.responseJSON.errors.title){
                            $('#title_message').append(`<span>` + error.responseJSON.errors.title + ` </span>`); 
                        }
                        if(error.responseJSON.errors.title_two){
                            $('#title_two_message').append(`<span>` + error.responseJSON.errors.title_two + ` </span>`); 
                        }
                        if(error.responseJSON.errors.image){
                            $('#image_message').append(`<span>` + error.responseJSON.errors.image + ` </span>`); 
                        }


                    }
                });
            });

            // create modal set to default
            $('#addSliderModal').on('hidden.bs.modal', function (e) {
                let input = $('#addSliderForm #title');
                let input2 = $('#addSliderForm #title_two');
                $('#addSliderForm').find('#title_message').html('');
                $('#addSliderForm').find('#title_two_message').html('');
                $('#addSliderForm').find('#image_message').html('');
                $(input).val('');
                $(input2).val('');
            });

            //uploaded image preview
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewHolder').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                }
                $("#filePhoto").change(function() {
                    readURL(this);
                });

            //uploaded image preview
            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewHolder2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                }
                $("#filePhoto2").change(function() {
                    readURL2(this);
                });


                        //show data for edit modal
              $(document).on('click', '.edit', function(e){
                  // $('#editBrandModal').modal('show');
                  e.preventDefault();
                  var id = $(this).attr('id');
                  $.ajax({
                      url: "{{url('admin/slider-edit')}}/"+id,
                      method: "GET",
                      success: function(data){
                              $('#edit_id').val(data.id);
                              $('#edit_title').val(data.title);
                              $('#edit_title_two').val(data.title_two);
                              $('#previewHolder2').attr('src', "{{asset('')}}"+data.image);
                      }
                  })
              });

                      //update brand
        $('#editSliderForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ url('admin/slider-update/') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){

                      $('#editSliderModal').modal('hide');
                        toastr.success('Slider Updated succefully !!');
                        location.reload();

                    },
                    error: function (error) {
                        $('#editSliderMessage').html('');
                        $('#editImageMessage').html('');
                        $('#editSliderMessage_two').html('');

                        if(error.responseJSON.errors.title){
                            $('#editSliderMessage').append(`<span>` + error.responseJSON.errors.title + ` </span>`); 
                        }
                        if(error.responseJSON.errors.title_two){
                            $('#editSliderMessage_two').append(`<span>` + error.responseJSON.errors.title_two + ` </span>`); 
                        }
                        if(error.responseJSON.errors.image){
                            $('#editImageMessage').append(`<span>` + error.responseJSON.errors.image + ` </span>`); 
                        }
                    }
                });
            });

            // Update modal set to default
            $('#editSliderModal').on('hidden.bs.modal', function (e) {

                $('#editSliderForm').find('#editSliderMessage').html('');
                $('#editSliderForm').find('#editImageMessage').html('');

            })


                    //delete brand
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        $.ajax({
                            url: "{{url('admin/delete-slider')}}/"+id,
                            method: "GET",
                            success: function(data){
                              location.reload();
                              toastr.success('Slider Deleted Succefully !!');
                            }
                        })
                      
                      }
                    })
            
        });
            
                 




    })
</script>

@endsection
