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
             <li class="breadcrumb-item active">Orders</li>
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
             {{-- <div class="card-header text-right">
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubcatModal">
                   <i class="fa fa-plus"> <b>Create new</b></i> 
               </button>
               <a style="margin-left: 20px; margin-right:20px;" href="">
                   <i class="fa fa-trash"> <b> See all Deleted Data</b></i> 
               </a>
             </div> --}}
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                    <th>Id</th>
                    <th>Shipping</th>
                    <th>Trans ID</th>
                    <th>Payment</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @foreach($order as $row)
                    <tr>
                      <td>{{$row->user_id}}</td>
                      <td>{{$row->ship_id}}</td>
                      <td>{{$row->status_code}}</td>
                      <td>{{$row->type}}</td>
                      <td>{{$row->total}} $</td>
                      <td>{{$row->created_at}} </td>
                      <td>
                        @if($row->order_status == "pending")
                        <span class="badge badge-warning">Pending</span>
                       @elseif($row->order_status == "accepted")
                       <span class="badge badge-info">Payment Accept</span>
                       @elseif($row->order_status == "progress") 
                        <span class="badge badge-info">Progress </span>
                        @elseif($row->order_status == "delivered")  
                        <span class="badge badge-success">Delivered </span>
                        @else
                        <span class="badge badge-danger">Cancel </span>
                        @endif
                      </td>
                      <td>
                      <a href="{{ URL::to('admin/view/order/' .$row->id)}}" class="btn btn-sm btn-info">View</a>
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