@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Purchases</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">purchase </li>
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
                      <h3>Add Purchases
                      <a class="btn btn-primary btn-sm float-right" href="{{route('purchases.view')}}"> <i class="fa fa-list">Purchase list</i></a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      
                      <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Date:</strong>
                            <input type="text" name="date" id="date"class="form-control  datepicker" placeholder="YYYY-MM-DD">
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Purchase No:</strong>
                            <input type="text" name="purchase_no" id="purchase_no"class="form-control" >
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Supplier Name:</strong>
                            <select name="supplier_id" class="form-control" id="supplier_id">
                              <option value="">Select Supplier</option>
                              @foreach($suppliers as $supplier )
                              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                              @endforeach
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Category Name :</strong>
                            <select name="category_id" class="form-control" id="category_id">
                              <option value="">Select Category</option>
                              
                            </select>
                            
                          </div>
                        </div>
                        
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Product Name :</strong>
                            <select name="product_id" class="form-control" id="product_id">
                              <option value="">Select product</option>
                            </select>
                            
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4  text-right" style="padding-top: 25px">
                          <button type="button" class="btn btn-primary addeventmore">+ Add</button>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                    <!-- /.card-body -->
                    <!-- card-body -->
                    <div class="card-body">
                      <form action="{{route('purchases.store')}}" method="POST" enctype="multipart/from-data" id="myform">
                        <table id="" class="table table-bordered table-sm" width="100%">
                  <thead>
                    <tr>
                            
                        <th >Category</th>
                        <th >Product Name</th>
                        <th width="7%">Kg/Pcs</th>
                        <th width="10%">Unit Price</th>
                        <th >Description</th>
                        <th width="10%">Total Price</th>
                        <th >Action</th>
                       
                    </tr>
                  
                  </thead>
                <tbody id="addRow" class="addRow">
                         
                </tbody>
                    <tbody>
                      <tr>
                        <td colspan="5"></td>
                        <td> <input type="text" id="estimated_amount" name="estimated_amount" class="form-control form-control-sm estimated_amount text-right" value="0"readonly style="background-color: #E9ECEF"></td>
                        <td ></td>

                      </tr>

                    </tbody>
                  
                </table>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="storeButton">Purchase Store</button>
                  
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

        <!-- Table content -->

        <script id="document-template"   type="text/x-handlebar-template">
          <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value=@{{date}}">

            <input type="hidden" name="purchase_no[]" value=@{{purchase_no}}">

            <input type="hidden" name="supplier_id[]" value=@{{supplier_id}}">

            <td> <input type="hidden" name="category_id[]" value=@{{category_id}}">@{{category_name}}</td>

            <td> <input type="hidden" name="product_id[]" value=@{{product_id}}">@{{product_name}}</td>


            <td> <input type="number" min="1" name="buying_qty[]" class="form-control form-control-sm text-right buying_qty"   value="1"></td>

            <td> <input type="number"  name="unit_price[]" class="form-control form-control-sm text-right unit_price"   value=" "></td>

            <td> <input type="text"  name="description[]" class="form-control form-control-sm  " >  </td>


            <td> <input  name="buying_price[]" class="form-control form-control-sm text-right buying_price " value="0" readonly </td>



           <td> <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td> 

           </tr>
          

        </script>

        <!-- End -->
        <!-- extra add -->
        <script type="text/javascript">
          $(document).ready(function(){
            $(document).on('click','.addeventmore',function(){
              var date= $('#date').val();
            var purchase_no= $('#purchase_no').val();
            var supplier_id= $('#supplier_id').val();
            var category_id= $('#category_id').val();
            var category_name= $('#category_id').find('option:selected').text();
            var product_id= $('#product_id').val();
           var product_name= $('#product_id').find('option:selected').text();

           if(date==''){
            $.notify("Date is required",{globalPosition:'top-right',className:'error'});
            return false;
           } 

           if(purchase_no==''){
            $.notify("Purchase No is required",{globalPosition:'top-right',className:'error'});
            return false;
           } 

           if(supplier_id==''){
            $.notify("Supplier Name is required",{globalPosition:'top-right',className:'error'});
            return false;
           }

           if(category_id==''){
            $.notify("Category Name is required",{globalPosition:'top-right',className:'error'});
            return false;
           }

           if(product_id==''){
            $.notify("Product Name is required",{globalPosition:'top-right',className:'error'});
            return false;
           }

           var source=$("#document-template").html();
           var template=Handlebars.compile(source);
              var data ={
              date:date,
              purchase_no:purchase_no,
              supplier_id:supplier_id,
              category_id:category_id,
              category_name:category_name,
              product_id:product_id,
              product_name:product_name
              };
              var html =template(data);
              $('#addRow').append(html);

            });

            $(document).on('click','.removeeventmore',function(event){
              $(this).closest(".delete_add_more_item").remove();
              totalAmountPrice();
            });

            // for buying price

            $(document).on('keyup click','.unit_price,.buying_qty',function(){
              var unit_price =$(this).closest("tr").find("input.unit_price").val();

              var qty =$(this).closest("tr").find("input.buying_qty").val();

              var total = unit_price * qty;

              $(this).closest("tr").find("input.buying_price").val(total);
              totalAmountPrice();


            });

            // Calculate Sum of amount
            function totalAmountPrice(){
              var sum = 0;
              $(".buying_price").each(function(){
                var value = $(this).val();
                if (!isNaN(value) && value.length !=0) {

                  sum += parseFloat(value);
                }
              });
              $('#estimated_amount').val(sum);
            }
          });
        </script>


        <!-- End extra add -->
        

        <!-- Datepicker -->
        <script>
        jQuery(function() {
        jQuery( ".datepicker" ).datepicker({
        dateFormat: 'yy/mm/dd',
        uiLibrary:'bootstrap4',
        changeMonth: true,
        changeYear: true
        });
        });
        </script>

        <!--End  Datepicker -->

        <!-- Add Category  -->

        <script type="text/javascript">
        
        $(function(){
        $(document).on('change','#supplier_id',function(){
        var supplier_id = $(this).val();
        $.ajax({
        url:"{{route('get-category')}}",
        type:'GET',
        data:{supplier_id:supplier_id},
        success:function(data){
        var html='<option value="">Select Category</option>';
        $.each(data,function(key,v){
        html+= '<option value="'+v.category_id+'">'+v.category.name+'</option>';
        });
        $('#category_id').html(html);
        }
        });
        });
        });
        </script>

        <!-- End category -->

        <!-- Add Product -->

        <script type="text/javascript">
        
        $(function(){
        $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
        url:"{{route('get-product')}}",
        type:'GET',
        data:{category_id:category_id},
        success:function(data){
        var html='<option value="">Select Product</option>';
        $.each(data,function(key,v){
        html+= '<option value="'+v.id+'">'+v.name+'</option>';
        });
        $('#product_id').html(html);
        }
        });
        });
        });
        </script>
        @endsection
