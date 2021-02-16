@extends('admin.layouts')

@section('admin_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-2">
              
              <!-- /.card-header -->
              <div class="card-body text-center">
                <h3 class="text-uppercase">Order Details</h3>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
      </section>
      

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
        
          
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-6 table-responsive">
                <h4 class="text-secondary text-center">Order Detais</h4>
              <table class="table table-borderless">
                <thead>
                <tr>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name :</td>
                        <td><b>{{ $order->name }}</b></td>
                      </tr>
      
                      <tr>
                        <td>Payment :</td>
                        <td><b>{{ $order->type }}</b></td>
                      </tr>
      
                      <tr>
                        <td>Payment Id :</td>
                        <td><b>{{ $order->status_code }}</b></td>
                      </tr>
      
                      <tr>
                        <td>Total :</td>
                        <td><b>${{ $order->total }}</b></td>
                      </tr>
                     
                      <tr>
                        <td>Data :</td>
                        <td><b>{{ $order->created_at }}</b></td>
                      </tr>
                
                </tbody>
              </table>
            </div>


            <div class="col-6 table-responsive">
                <h4 class="text-secondary text-center">Shipping Detais</h4>
              <table class="table table-borderless">
                <thead>
                <tr>
                </tr>
                </thead>
                <tbody>

                <tr>
                  <td>Name :</td>
                  <td><b>{{ $shipping->name }}</b></td>
                </tr>

                <tr>
                  <td>Phone :</td>
                  <td><b>{{ $shipping->phone }}</b></td>
                </tr>

                <tr>
                  <td>Email :</td>
                  <td><b>{{ $shipping->email }}</b></td>
                </tr>

                <tr>
                  <td>Address :</td>
                  <td><b>{{ $shipping->address }}</b></td>
                </tr>
               
                <tr>
                  <td>Status :</td>
                  <td>
                    @if($order->order_status == "pending")
                    <span class="badge badge-warning">Pending</span>
                   @elseif($order->order_status == "accepted")
                   <span class="badge badge-info">Payment Accept</span>
                   @elseif($order->order_status == "progress") 
                    <span class="badge badge-info">Progress </span>
                    @elseif($order->order_status == "delivered")  
                    <span class="badge badge-success">Delivered </span>
                    @else
                    <span class="badge badge-danger">Cancel </span>
                    @endif
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="text-align: center !important; float: none !important;">Product Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap" style="margin-bottom: 50px !important;">
                <thead>
                  <tr>
                    <th>Product Code</th>
         	          <th>Product</th>
         	          <th>Image</th>
         	          <th>Color </th>
         	          <th>Size</th>
         	          <th>Qty</th>
         	          <th>Price</th>
         	          <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($details as $row)
                    <tr>
                      <td>{{ $row->pro_code }}</td>
                      <td>{{ $row->product_name }}</td>
                      <td><img src="{{ URL::to($row->image) }}" height="50px;" width="50px;"></td>
                      <td>{{ $row->color }}</td>
                      <td>{{ $row->size }}</td>
                      <td>{{ $row->qty }}</td>
                      <td>
                          {{ $row->price }} $
                          
                      </td>
                      <td>
                      {{ $row->price * $row->qty + 50}} $
                          
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
      </div>
  </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          
          <!-- /.card-header -->
          <div class="card-body">
            @if($order->order_status == "pending")
            <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info btn-block">Payment Accept</a>
            <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger btn-block">Cancel Order</a>
        @elseif($order->order_status == "accepted")
            <a href="{{ url('admin/delivery/progress/'.$order->id) }}" class="btn btn-info btn-block">Delevery Progress</a>
            <strong> Payment Already Checked and pass here for delevery request</strong>
        @elseif($order->order_status == "progress")
             <a href="{{ url('admin/delivery/done/'.$order->id) }}" class="btn btn-success btn-block">Delevered Done</a>
             <strong> Payment Already done your product are handover successfully.</strong>
        @elseif($order->order_status == "delivered")
          <strong class="text-success">This product are succesfully delivered.</strong>
          @else
           <strong class="text-danger">This order is not valid, its canceled.</strong>
          @endif
            
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

@endsection