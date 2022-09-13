@extends('backend.layouts.master')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Suppliers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">supplier </li>
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

                <h3>Suppliers List
                      <a class="btn btn-primary btn-sm float-right" href="{{route('suppliers.add')}}"> <i class="fa fa-plus-circle">Add Supplier </i></a>
                      </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                            
                        <th >SI</th>
                        <th >Name</th>
                        <th >Mobile No</th>
                        <th >E-mail</th>
                        <th >Address</th>
                        <th >Action</th>
                       
                    </tr>
                  
                  </thead>
                   <tbody>
                          @foreach($alldata as $key=> $supplier)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->mobile_no}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->address}}</td>
                            
                            
                           <td>

                              <a title="edit" class="btn btn-sm btn-primary"href="{{route('suppliers.edit',$supplier->id)}}"><i class="fa fa-edit"></i></a>


                              <a title="delete" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal{{$supplier->id}}"><i class="fa fa-trash"></i></a>
                          <!-- Button to Open the Modal -->

                          <!-- The Modal -->
                        <div class="modal" id="myModal{{$supplier->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title"></h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                  Are You Sure Want to delete?
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                            <a class="btn btn-md btn-danger" href="{{route('suppliers.delete',$supplier->id)}}">Delete</a>
                            
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