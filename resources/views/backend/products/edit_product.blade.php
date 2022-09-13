@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">product </li>
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
                      <h3>Edit Product
                      <a class="btn btn-primary btn-sm float-right" href="{{route('products.view')}}"> <i class="fa fa-list">Product list</i></a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="{{ route('products.update',$editdata->id) }}" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Supplier Name:</strong>
                              <select name="supplier_id" class="form-control">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier )
                                <option value="{{$supplier->id}}" {{($editdata->supplier_id ==$supplier->id)?'selected':''}}>{{$supplier->name}}</option>
                                @endforeach
                              </select>
                              
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Category Name :</strong>
                              <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category )
                                <option value="{{$category->id}}"
                                {{($editdata->category_id ==$category->id)?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                              </select>
                              
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Unit Name:</strong>
                              <select name="unit_id" class="form-control">
                                <option value="">Select Unit</option>
                                @foreach($units as $unit )
                                <option value="{{$unit->id}}" {{($editdata->unit_id ==$unit->id)?'selected':''}}>{{$unit->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Product Name:</strong>
                              <input type="text" name="name" class="form-control" value="{{$editdata->name}}">
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            <button type="submit" class="btn btn-primary ">Update</button>
                          </div>
                          
                        </div>
                        
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