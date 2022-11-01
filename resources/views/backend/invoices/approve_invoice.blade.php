@extends('backend.layouts.master')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
              <div class="card-header">

                <h3>Invoice No:#{{$invoice->invoice_no}}({{date('d-m-Y',strtotime($invoice->date))}})
                      <a class="btn btn-primary btn-sm float-right" href="{{route('invoices.pending.list')}}"> <i class="fa fa-plus-list">Pending Invoice List</i></a>
                      </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                  
                    @php
                    $payment =App\Models\Payment::where('invoice_id',$invoice->id)->first();
                    @endphp
                    
                  
                  
                   <tbody>
                    <tr>
                      <td>Customer info</td>
                      <td><strong>Name</strong>:{{$payment['customer']['name']}}</td>
                      <td><strong>Mobile No</strong>:{{$payment['customer']['mobile_no']}}</td>
                      <td>Address:{{$payment['customer']['address']}}</td>
                    </tr>
                    <tr>
                      <td ></td>
                      <td colspan="3"><strong>Description</strong>:{{$payment['customer']['description']}}</td>
                    </tr>
                         
                    </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
                <form method="POST" action="{{route('approve.store',$invoice->id)}}">

                  @csrf
                  
                  <table border="1" width="100%" style="margin-bottom:10px">
                  <thead>
                    <tr class="text-center">
                      <th>SL.</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th  style="background: #ddd;padding: 1px;">Current Stock</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                    @php
                    $total_sum='0';
                    @endphp
                    @foreach($invoice['invoice_details'] as $key=> $details)
                    <tr class="text-center">
                      <input type="hidden" name="category_id[]" value="{{$details->category_id}}">
                      <input type="hidden" name="product_id[]" value="{{$details->product_id}}">
                      <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}">
                      <td>{{++$key}}</td>
                      <td>{{$details['category']['name']}}</td>
                      <td>{{$details['product']['name']}}</td>
                      <td>{{$details['product']['quantity']}}</td>
                      <td>{{$details->selling_qty}}</td>
                      <td>{{$details->unit_price}}</td>
                      <td>{{$details->selling_price}}</td>

                    </tr>
                    @php
                    $total_sum+= $details->selling_price;
                    @endphp
                    @endforeach
                    <tr>
                      <td class="text-right" colspan="6"><strong>Sub-total</strong></td>
                      <td class="text-center"><strong>{{$total_sum}}</strong></td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="6">Discount</td>
                      <td class="text-center">{{$payment->discount_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="6">Paid Amount</td>
                      <td class="text-center">{{$payment->paid_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="6">Due Amount</td>
                      <td class="text-center">{{$payment->due_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="6"><strong>Grand Total</strong></td>
                      <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                    </tr>

                  </tbody>
                  
                </table>
                <button type="submit" class="btn btn-primary">Appprove Invoice</button>
                  
                </form>
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

  @endsection