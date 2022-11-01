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

                <h3>Invoice List
                      <a class="btn btn-primary btn-sm float-right" href="{{route('invoices.add')}}"> <i class="fa fa-plus-circle">Add Invoice</i></a>
                      </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                            
                      <th >SL.</th>
                      <th >Customer Name</th>
                      <th >invoice No</th>
                      <th >Date</th>
                      
                      <th >Description</th>
                      <th style='width:15%'>Action</th>
                       
                    </tr>
                  
                  </thead>
                   <tbody>
                          @foreach($alldata as $key=> $invoice)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$invoice['payment']['customer']['name']}}</td>
                            <td>{{$invoice->invoice_no}}</td>
                            <td>{{date('Y-m-d',strtotime($invoice->date))}}</td>
                            <td>{{$invoice->description}}</td>
                        <td>

                          @if($invoice->status=='1')
                          <a title="print" class="btn btn-sm btn-warning" href="{{route('invoices.print',$invoice->id)}}" target="_blank"><i class="fa fa-print"></i></a>
                          
                          @endif

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