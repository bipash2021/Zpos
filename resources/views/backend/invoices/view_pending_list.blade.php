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

                <h3>Pending Invoice List
                      </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped " width="100%" >
                  <thead>
                    <tr>
                            
                      <th >SL.</th>
                      <th >Customer Name</th>
                      <th >Invoice No</th>
                      <th >Date</th>
                      <th >Description</th>
                      <th >Amount</th>
                      <th >Status</th>
                      <th style='width:15%'>Action</th>
                       
                    </tr>
                  
                  </thead>
                   <tbody>
                          @foreach($alldata as $key=> $invoice)
                          <tr>

                            <td>{{++$key}}</td>
                            <td>{{$invoice['payment']['customer']['name']}}</td>
                            <td>Invoice No#{{$invoice->invoice_no}}</td>
                            <td>{{date('Y-m-d',strtotime($invoice->date))}}</td>
                            <td>{{$invoice->description}}</td>
                            <td>{{$invoice['payment']['total_amount']}}</td>

                        <td>

                          @if($invoice->status=='1')
                          <span style="background-color:#0296F6"> Approve</span>
                          @elseif($invoice->status=='0')
                          <span style="background-color:red">Pending</span>
                          @endif

                         </td>
                            
                            
                           <td>
                            @if($invoice->status=="0")

                              <a title="approve" class="btn btn-sm btn-primary" href="{{route('invoices.approve',$invoice->id)}}"><i class="fa fa-check-circle"></i></a>

                            @endif

                          
                          <!-- for delete -->
                           @if($invoice->status=="0")

                              <a title="delete" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModalDelete{{$invoice->id}}"><i class="fa fa-trash"></i></a>

                            @endif
                          <!-- Button to Open the Modal -->

                          <!-- The Modal -->
                        <div class="modal" id="myModalDelete{{$invoice->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title"></h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                  Are You Sure Want to DELETE {{$invoice->name}}?
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                        <a class="btn btn-md btn-danger" href="{{route('invoices.delete',$invoice->id)}}">Delete</a>
                            
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                  <tfoot>
                  
                  </tfoot>
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

  @endsection