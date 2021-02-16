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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBrandModal">
                    <i class="fa fa-plus"> <b>Create new</b></i> 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Brand name</th>
                    <th>Brand Logo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($sl = 1)
                    @foreach($brands as $brand)
                  <tr>
                    <td>{{ $sl++ }}</td>

                    <td class="text-capitalize">{{ $brand->brand_name }}</td>

                    <td>
                      @if($brand->brand_logo == '')
                      No Image
                      @else
                      <img src="{{ asset($brand->brand_logo) }}" height="50px" width="50px" alt="brand image">
                      @endif
                    </td>

                    <td>
                        @if($brand->brand_status == 1)
                        <a href="{{ URL::to('admin/brand-unpublish/' .$brand->id) }}" class="btn btn-light unpublish text-success" data-toggle="tooltip" title="Published">
                            <i class="fa fa-check"></i>
                        </a>
                        @else
                        <a href="{{ URL::to('admin/brand-publish/' .$brand->id) }}" class="btn btn-light text-danger publish" data-toggle="tooltip" title="Unpublished">
                            <i class="fa fa-times"></i>
                        </a>
                        @endif
                    </td>
                    <td>
                        <a id="{{$brand->id}}" class="btn btn-info btn-sm edit  text-white" data-toggle="modal" data-target="#editBrandModal">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a id="{{$brand->id}}" href="" class="btn btn-danger btn-sm text-white ml-2 delete">
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
 <div class="modal fade" id="addBrandModal">
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
          <form id="addBrandForm" enctype="multipart/form-data">
            @csrf
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Brand name</label>
                <input type="text" name="brand_name" class="form-control text-capitalize" id="brand_name" placeholder="Enter Brand Name">
                <span id="brand_name_message" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Brand Logo</label>
                <input type="file" name="brand_logo" class="form-control-file" id="filePhoto">
                <img src="" id="previewHolder" width="150px">
                <span id="brand_logo_message" class="invalid-feedback-custom"></span>
              </div>
              
              <div class="form-group">
                <label for="brand_status">Publication status</label>
                <select class="form-control" name="brand_status" id="brand_status">
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
<div class="modal fade" id="editBrandModal">
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
          <form id="editBrandForm" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="edit_id">
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Category name</label>
                <input type="text" name="brand_name" class="form-control text-capitalize" id="edit_brand_name" placeholder="Enter Brand Name">
                <span id="editbrandMessage" class="invalid-feedback-custom"></span>
              </div>

              <div class="form-group">
                <label>Brand Logo</label>
                 <input type="file" name="brand_logo" class="form-control-file" id="filePhoto2">
                  <img src="" id="previewHolder2" width="150px">
                  <span id="editbrandLogoMessage" class="invalid-feedback-custom"></span>
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

</section>
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready( function () {

         //add new brand data
         $('#addBrandForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ route('create.brand') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                      $('#addBrandModal').modal('hide');
                        toastr.success('Brand created succefully !!');
                        location.reload();
                 
                    },
                     error: function (error) {
                        $('#brand_name_message').html('');
                        $('#brand_logo_message').html('');


                        if(error.responseJSON.errors.brand_name){
                            $('#brand_name_message').append(`<span>` + error.responseJSON.errors.brand_name + ` </span>`); 
                        }
                        if(error.responseJSON.errors.brand_logo){
                            $('#brand_logo_message').append(`<span>` + error.responseJSON.errors.brand_logo + ` </span>`); 
                        }


                    }
                });
            });

            // create modal set to default
            $('#addBrandModal').on('hidden.bs.modal', function (e) {
                let input = $('#addBrandForm #brand_name');
                $('#addBrandForm').find('#brand_name_message').html('');
                $('#addBrandForm').find('#brand_logo_message').html('');
                $(input).val('');
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
                      url: "{{url('admin/brand-edit')}}/"+id,
                      method: "GET",
                      success: function(data){
                              $('#edit_id').val(data.id);
                              $('#edit_brand_name').val(data.brand_name);
                              $('#previewHolder2').attr('src', "{{asset('')}}"+data.brand_logo);
                      }
                  })
              });

                      //update brand
        $('#editBrandForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ route('brand.update') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){

                      $('#editBrandModal').modal('hide');
                        toastr.success('Brand Updated succefully !!');
                        location.reload();

                    },
                    error: function (error) {
                        $('#editbrandMessage').html('');
                        $('#editbrandLogoMessage').html('');

                        if(error.responseJSON.errors.brand_name){
                            $('#editbrandMessage').append(`<span>` + error.responseJSON.errors.brand_name + ` </span>`); 
                        }
                        if(error.responseJSON.errors.brand_logo){
                            $('#editbrandLogoMessage').append(`<span>` + error.responseJSON.errors.brand_logo + ` </span>`); 
                        }
                    }
                });
            });

            // Update modal set to default
            $('#editBrandModal').on('hidden.bs.modal', function (e) {

              let input = $('#editBrandForm #brand_name');
                $('#editBrandForm').find('#editbrandMessage').html('');
                $('#editBrandForm').find('#editbrandLogoMessage').html('');
                $(input).val('');

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
                            url: "{{url('admin/delete-brand')}}/"+id,
                            method: "GET",
                            success: function(data){
                              location.reload();
                              toastr.success('Brand Deleted succefully !!');
                            }
                        })
                      
                      }
                    })
            
        });
            
                 






    })
</script>

@endsection
