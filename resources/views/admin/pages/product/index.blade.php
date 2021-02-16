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
            <h1>Product Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <a href="{{ route('add.product') }}" class="btn btn-success" >
                    <i class="fa fa-plus"> <b>Create new</b></i> 
                </a>
              </div>
              <!-- /.card-headerid="example1" -->
              <div class="card-body">
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- @php($sl = $telephone->getFrom();) --}}
                      @foreach($products as $value => $row)
                      <tr>
                        <td>{{ $value+ $products->firstItem() }}</td>
                        <td>{{$row->product_code}}</td>
                        <td>{{$row->product_name}}</td>
                        <td><img src="{{ URL::to($row->image_one)}}" width="50px;" height="50px;"></td>
                        <td>{{$row->cat_name}}</td>
                        <td>{{$row->brand_name}}</td>
                        <td>{{$row->product_quantity}}</td>
                        <td>
                          @if($row->status == 1)
                          <a href="{{ URL::to('admin/inactive-product/' .$row->id)}}" class="btn btn-light text-success" title="Active">
                            <i class="fa fa-check"></i>
                          </a>
                          @else
                          <a href="{{ URL::to('admin/active-product/' .$row->id)}}" class="btn btn-light text-danger" title="Inactive">
                            <i class="fa fa-times"></i>
                          </a>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group dropleft">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu">
                              <a href="{{ URL::to('admin/edit-product/' .$row->id)}}" class="dropdown-item bg-info text-white" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                              <a id="{{$row->id}}" href="" class="dropdown-item bg-danger delete text-white" title="Delete"><i class="fa fa-trash"> Delete</i></a>
                              <a href="{{ URL::to('admin/view/product/' .$row->id)}}" class="dropdown-item bg-secondary text-white" title="View"><i class="fa fa-eye"></i> View</a>
                            </div>
                          </div>
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
    <div style="margin-left: 430px !important;">
      
        {{ $products->links() }}
      
      
    </div>
    <!-- /.content -->
  </div>
  


</section>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
  $(document).ready( function () {


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
                   url: "{{url('admin/delete-product')}}/"+id,
                   method: "GET",
                   success: function(data){
                       location.reload();
                       toastr.success('Product Deleted succefully !!');
                   }
               })
               
             }
           })
      });


   });
</script>

@endsection
