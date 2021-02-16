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
            <h1>Subcategory Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subcategory</li>
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubcatModal">
                    <i class="fa fa-plus"> <b>Create new</b></i> 
                </button>
                <a style="margin-left: 20px; margin-right:20px;" href="{{ url('admin/view/trash') }}">
                    <i class="fa fa-trash"> <b> See all Deleted Data</b></i> 
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Subcategory name</th>
                    <th>Category name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($sl = 1)
                      @foreach($subcats as $subcat)
                    <tr> 
                      <td>{{ $sl++ }}</td>
                      <td class="text-capitalize">{{ $subcat->subcat_name }}</td>
                      <td class="text-capitalize">{{ $subcat->cat_name }}</td>
                      <td>
                          @if($subcat->subcat_status == 1)
                          <a  href="{{ URL::to('admin/subcat-unpublish/' .$subcat->id) }}" class="btn btn-light unpublish text-success" data-toggle="tooltip" title="Published">
                              <i class="fas fa-check"></i>
                          </a>
                          @else
                          <a href="{{ URL::to('admin/subcat-publish/' .$subcat->id) }}" class="btn btn-light publish text-danger" data-toggle="tooltip" title="Unpublished">
                              <i class="fa fa-times"></i>
                          </a>
                          @endif
                      </td>
                      <td>
                          <a id="{{$subcat->id}}" href="#editSubcatModal" class="btn btn-primary btn-sm text-white edit" data-toggle="modal">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                          <a id="{{$subcat->id}}" href="" class="btn btn-danger btn-sm text-white ml-2 delete">
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
 <div class="modal fade" id="addSubcatModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left:145px;">Create Subcategory</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form id="addSubcatForm" enctype="multipart/form-data">
            @csrf
             <div class="card-body pt-0">
               <div class="form-group">
                <label>Subcategory name</label>
                <input type="text" name="subcat_name" id="subcat_name" class="form-control" placeholder="Enter subcategory">
                <span id="subcat_message" class="invalid-feedback-custom"></span>
               </div>

               <div class="form-group">
                <label>Category name</label>
                  <select class="form-control text-capitalize" name="cat_id" id="cat_id">
                    <option value="">--please select--</option>
                   @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                   @endforeach
                   </select>
                   <span id="catid_message" class="invalid-feedback-custom"></span>
               </div>
              
              <div class="form-group">
                <label for="subcat_status">Publication status</label>
                <select class="form-control" id="subcat_status" name="subcat_status" style="width: 100%;">
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
 <div class="modal fade" id="editSubcatModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left:145px;">Edit Subcategory</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form id="editSubcatForm" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="edit_id">
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Subcategory name</label>
                <input type="text" name="subcat_name" class="form-control text-capitalize" id="edit_subcat_name">
                <span id="editsubcatMessage" class="invalid-feedback-custom"></span>
              </div>
              
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control text-capitalize" name="cat_id" id="edit_cat_name">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                      @if($category->id == $subcat->cat_id) selected='selected' @endif 
                      >{{ $category->cat_name }}</option>
                  @endforeach
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

</section>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready( function () {

       //add new category data
       $('#addSubcatForm').on('submit', function(e){
                //var table = $('#category').DataTable();
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ route('create.subcat') }}",
                    data: new FormData(this),
                    /*data: $('addCategoryForm').serialize(),*/
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                      $('#addSubcatModal').modal('hide');
                      toastr.success('Subcategory Created succefully !!');
                      location.reload();
                    },
                     error: function (error) {
                      $('#subcat_message').html('');
                      $('#catid_message').html('');

                      if(error.responseJSON.errors.subcat_name){
                       $('#subcat_message').append(`<span>` + error.responseJSON.errors.subcat_name + ` </span>`); 
                       }
                      if(error.responseJSON.errors.cat_id){
                       $('#catid_message').append(`<span>` + error.responseJSON.errors.cat_id + ` </span>`); 
                       }

                    }
                });
            });

            // create modal set to default
            $('#addSubcatModal').on('hidden.bs.modal', function (e) {
                let input = $('#addSubcatForm #subcat_name');
                $('#addSubcatForm').find('#subcat_message').html('');
                $('#addSubcatForm').find('#catid_message').html('');
                $(input).val('');
            })

                    //show data for edit modal
        $(document).on('click', '.edit', function(e){
            // $('#editSubcatModal').modal('show');
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{url('admin/subcat-edit')}}/"+id,
                method: "GET",
                success: function(data){
                        $('#edit_id').val(data.id);
                        $('#edit_subcat_name').val(data.subcat_name);
                        $('#edit_cat_name').val(data.cat_id);
                }
            })
        });

         //update category
         $('#editSubcatForm').on('submit', function(e){
                //var table = $('#category').DataTable();
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "{{ route('subcat.update') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                      $('#editSubcatModal').modal('hide');
                      toastr.success('Subcategory updated succefully !!');
                      location.reload();
                    },
                    error: function (error) {
                      $('#editsubcatMessage').html('');

                      if(error.responseJSON.errors.subcat_name){
                       $('#editsubcatMessage').append(`<span>` + error.responseJSON.errors.subcat_name + ` </span>`); 
                       }
                      
                    }
                });
            });


      // edit modal set to default
      $('#editSubcatModal').on('hidden.bs.modal', function (e) {
        let input = $('#editSubcatForm #edit_subcat_name');
        let input2 = $('#editSubcatForm #edit_cat_name');
        $('#editSubcatForm').find('#editsubcatMessage').html('');
        $(input).val('');
        $(input2).val('');
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
                       url: "{{url('admin/softdelete-subcat')}}/"+id,
                       method: "GET",
                       success: function(data){
                           location.reload();
                           toastr.success('Subcategory Deleted succefully !!');
                       }
                   })
                   
                 }
               })
          });





    });
</script>

@endsection
