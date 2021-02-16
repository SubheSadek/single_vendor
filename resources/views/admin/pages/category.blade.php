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
            <h1>Category Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategory">
                    <i class="fa fa-plus"> <b>Create new</b></i> 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Category name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($sl = 1)
                    @foreach($categories as $category)
                  <tr id="tableBody">
                    <td>{{ $sl++ }}</td>
                    <td class="text-capitalize">{{ $category->cat_name }}</td>
                    <td>
                        @if($category->cat_status == 1)
                        <a href="{{ URL::to('admin/category-unpublish/' .$category->id) }}" class="btn btn-light unpublish text-success" data-toggle="tooltip" title="Published">
                            <i class="fa fa-check"></i>
                        </a>
                        @else
                        <a href="{{ URL::to('admin/category-publish/' .$category->id) }}" class="btn btn-light text-danger publish" data-toggle="tooltip" title="Unpublished">
                            <i class="fa fa-times"></i>
                        </a>
                        @endif
                    </td>
                    <td>
                        <a id="{{$category->id}}" class="btn btn-info btn-sm edit  text-white" data-toggle="modal" data-target="#editCategoryModal">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a id="{{$category->id}}" href="" class="btn btn-danger btn-sm delete text-white ml-2">
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
 <div class="modal fade" id="addCategory">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left:145px;">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form id="addCategoryForm" enctype="multipart/form-data">
            @csrf
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Category name</label>
                <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Enter category">
                <span id="category_name" class="invalid-feedback-custom"></span>
              </div>
              
              <div class="form-group">
                <label for="cat_status">Publication status</label>
                <select class="form-control" id="cat_status" name="cat_status" style="width: 100%;">
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
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
 <div class="modal fade" id="editCategoryModal">
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
          <form id="editCategoryForm" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="edit_id">
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Category name</label>
                <input type="text" name="cat_name" id="edit_cat_name" class="form-control">
                <span id="editCatMessage" class="invalid-feedback-custom"></span>
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


    $('#addCategoryForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: "POST",
              url: "{{ route('create.category') }}",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                location.reload();
                toastr.success('Category created succefully !!');
                // window.history.back();

              },
               error: function (error) {
                $('#category_name').html('');

                 if(error.responseJSON.errors.cat_name){
                  $('#category_name').append(`<span>` + error.responseJSON.errors.cat_name + ` </span>`); 
                  }

                  
              }
          });
      });

     // create modal set to default
     $('#addCategory').on('hidden.bs.modal', function (e) {
        let input = $('#addCategoryForm #cat_name');
        $('#addCategoryForm').find('#category_name').html('');
        $(input).val('');
      })


        //delete category
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            Swal.fire({
               title: 'Are you sure to delete?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                 if (result.value) {
                   $.ajax({
                       url: "{{url('admin/delete-category')}}/"+id,
                       method: "GET",
                       success: function(data){
                           location.reload();
                           toastr.success('Category Deleted succefully !!');
                       }
                   })
                   
                 }
               })
          });

                  //show data for edit modal
        $(document).on('click', '.edit', function(e){
            // 
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{url('admin/category-edit')}}/"+id,
                method: "GET",
                success: function(data){
                        $('#edit_id').val(data.id);
                        $('#edit_cat_name').val(data.cat_name);
                }
            })
        });

        //update category
            $('#editCategoryForm').on('submit', function(e){
                //var table = $('#category').DataTable();
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ url('admin/category-update') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                      $('#editCategoryModal').modal('hide');
                      toastr.success('Category Updated succefully !!');
                      location.reload();
                      
                      
                    },
                    error: function (error) {
                        $('#editCatMessage').html('');

                        if(error.responseJSON.errors.cat_name){
                          $('#editCatMessage').append(`<span>` + error.responseJSON.errors.cat_name + ` </span>`); 
                          }
                    }
                });
            });




             // edit modal set to default
          $('#editCategoryModal').on('hidden.bs.modal', function (e) {
             let input = $('#editCategoryForm #edit_cat_name');
             $('#editCategoryForm').find('#editCatMessage').html('');
             $(input).val('');
           })



                //popover
        
        
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        //tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
  

  } );
  

</script>

@endsection
