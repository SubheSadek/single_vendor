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
                <a style="margin-left: 20px; margin-right:20px;" class="btn btn-primary btn-sm" href="{{ url('admin/subcat') }}">
                    <i class="fa fa-arrow-left"> <b> Back</b></i> 
                </a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no.</th>
                    <th>Subcategory name</th>
                    {{-- <th>Category name</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($sl = 1)
                      @foreach($subcats as $subcat)
                    <tr> 
                      <td>{{ $sl++ }}</td>
                      <td class="text-capitalize">{{ $subcat->subcat_name }}</td>
                      {{-- <td class="text-capitalize">sljwhfs</td> --}}
              
                      <td>
                          <a  href="{{ URL::to('/admin/restore-subcat/' .$subcat->id)}}" class="text-white p-2 bg-primary rounded">
                              Restore
                          </a>

                          <a  href="{{ URL::to('/admin/force-subcat/' .$subcat->id)}}" class="text-white p-2 bg-danger ml-2 rounded">
                              Delete
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
  


</section>


@endsection
