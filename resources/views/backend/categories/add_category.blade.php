@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Categorys</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category </li>
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
                      <h3>Add Category
                      <a class="btn btn-primary btn-sm float-right" href="{{route('categories.view')}}"> <i class="fa fa-list">Category list</i></a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        
                        <div class="row">

                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Category Name:</strong>
                              <input type="text" name="name" class="form-control" >

                              <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>

                            </div>
                          </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                          <button type="submit" class="btn btn-primary ">Submit</button>
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