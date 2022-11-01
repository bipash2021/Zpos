@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Invoices</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice </li>
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
                      <h3>Add Invoices
                      <a class="btn btn-primary btn-sm float-right" href="{{route('invoices.view')}}"> <i class="fa fa-list">Invoice list</i></a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      
                      <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                          <div class="form-group">
                            <strong>Date:</strong>
                            <input type="text" name="date" id="date"class="form-control form-control-sm datepicker" placeholder="YYYY-MM-DD">
                          </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                          <div class="form-group form-group-sm">
                            <strong>invoice No:</strong>
                            <input type="text" name="invoice_no" id="invoice_no"class="form-control
                            form-control-sm"  style="background-color: #DEE1E6" value="{{$invoice_no}}"readonly>
                          </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                          <div class="form-group">
                            <strong>Category Name :</strong>
                            <select name="category_id" class="form-control select2" id="category_id"data-dropdown-css-class="select2-purple" style="width: 100%">
                              <option value="0">Select Category</option>
                              @foreach($categories as $category)

                              <option value="{{$category->id}}">{{$category->name}}</option>


                              @endforeach
                              
                            </select>
                            
                          </div>
                        </div>
                        
                        <div class="col-xs-2 col-sm-2 col-md-2">
                          <div class="form-group">
                            <strong>Product Name :</strong>
                            <select name="product_id" class="form-control select2" id="product_id" data-dropdown-css-class="select2-purple" style="width: 100%">
                              <option value="">Select product</option>
                            </select>
                            
                          </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                          <div class="form-group">
                            <strong>Stock(Pcs/Kg) :</strong>
                            <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm current_stock_qty text-centre" style="background-color:#DEE1E6" readonly>
                            
                          </div>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1 text-centre" style="padding-top: 25px">
                          <button type="button" class="btn btn-primary btn-sm addeventmore">+ Add</button>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                    <!-- /.card-body -->
                    <!-- card-body -->
                    <div class="card-body">
                      <form action="{{route('invoices.store')}}" method="POST" enctype="multipart/from-data" id="myform">
                        @csrf
                        <table id="" class="table table-bordered table-sm" width="100%">
                  <thead>
                    <tr>
                            
                        <th >Category</th>
                        <th >Product Name</th>
                        <th width="7%">Kg/Pcs</th>
                        <th width="15%">Unit Price</th>
                        <th width="10%">Total Price</th>
                        <th width="15%">Action</th>
                       
                    </tr>
                  
                  </thead>
                <tbody id="addRow" class="addRow">
                         
                </tbody>
                    <tbody>
                      <tr>
                        <td colspan="4" class="text-right">Discount</td>
                        <td> <input type="text" id="discount_amount" name="discount_amount" class="form-control form-control-sm discount_amount text-right" value="0" style="background-color: #E9ECEF"></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td colspan="4"class="text-right">Total</td>
                        <td> <input type="text" id="estimated_amount" name="estimated_amount" class="form-control form-control-sm estimated_amount text-right" value="0"readonly style="background-color: #E9ECEF"></td>
                        <td ></td>

                      </tr>

                    </tbody>
                  
                </table>
                <br>
                <div class="from-row">
                  <div class="form-group">
                    <textarea name="description" id="description" class="form-control" placeholder="Write Description Here"></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Paid Status</label>
                    <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                      <option value="">Select Status</option>
                      <option value="full_paid">Full Paid</option>
                      <option value="full_due">Full Due</option>
                      <option value="partial_paid">Partial Paid</option>
                    </select>
                    <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                  </div>
                  <div class="form-group col-md-9">
                    <label>Customer Name</label>
                    <select name="customer_id" class="form-control form-control-sm select2" id="customer_id">
                    <option value="">Select Customer</option>
                    <option value="0">New Customer</option>

                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                    </select>
                      
                     </div>
                  </div>
                     <div class="form-row new_customer" style="display:none">
                       <div class="form-group col-md-4">
                        <label>Customer Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Write Customer name">
                         
                       </div>

                       <div class="form-group col-md-3">
                        <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="Write Customer Mobile No" id="mobile_no">
                         
                       </div>

                       <div class="form-group col-md-5">
                        <label>Address</label>
                          <input type="text" name="address" class="form-control" placeholder="Write Customer Address">
                         
                       </div>

                     </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary" id="storeButton">Invoice Store</button>
                  
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
            <input type="hidden" name="date" value="@{{date}}">

            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">


            <td> <input type="hidden" name="category_id[]" value="@{{category_id}}">@{{category_name}}</td>

            <td> <input type="hidden" name="product_id[]" value="@{{product_id}}">@{{product_name}}</td>


            <td> <input type="number" min="1" name="selling_qty[]" class="form-control form-control-sm text-right selling_qty"   value="1"></td>

            <td> <input type="number"  name="unit_price[]" min="0" class="form-control form-control-sm text-right unit_price"   value="0"></td>

            


            <td> <input  name="selling_price[]" class="form-control form-control-sm text-right selling_price " value="0" readonly </td>



           <td> <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td> 

           </tr>
          

        </script>

        <!-- End -->
        <!-- extra add -->
        <script type="text/javascript">
          $(document).ready(function(){
            $(document).on('click','.addeventmore',function(){
              var date= $('#date').val();
            var invoice_no= $('#invoice_no').val();
            var category_id= $('#category_id').val();
            var category_name= $('#category_id').find('option:selected').text();
            var product_id= $('#product_id').val();
           var product_name= $('#product_id').find('option:selected').text();

           if(date==''){
            $.notify("Date is required",{globalPosition:'top-right',className:'error'});
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
              invoice_no:invoice_no,
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

            $(document).on('keyup click','.unit_price,.selling_qty',function(){
              var unit_price =$(this).closest("tr").find("input.unit_price").val();

              var qty =$(this).closest("tr").find("input.selling_qty").val();

              var total = unit_price * qty;

              $(this).closest("tr").find("input.selling_price").val(total);
              $('#discount_amount').trigger('keyup');


            });

            $(document).on('keyup','#discount_amount',function(){
              totalAmountPrice();
            });

            // Calculate Sum of amount
            function totalAmountPrice(){
              var sum = 0;
              $(".selling_price").each(function(){
                var value = $(this).val();
                if (!isNaN(value) && value.length !=0) {

                  sum += parseFloat(value);
                }
              });

              // Calculate discount amount 

              var discount_amount= parseFloat($('#discount_amount').val());
              if(!isNaN(discount_amount) && discount_amount.length !=0){
                sum -=parseFloat(discount_amount);
              }
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
        <script type="text/javascript">
          $(function(){
            $(document).on('change','#product_id',function(){
              var product_id =$(this).val();
              $.ajax({
            url:"{{route('check-product-stock')}}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                  $('#current_stock_qty').val(data)
                }
              })
            })
          })
        </script>

        //for partial paid

        <script type="text/javascript">
         
            $(document).on('change','#paid_status',function(){
            var paid_status= $(this).val();
               if(paid_status=='partial_paid'){
                  $('.paid_amount').show();
                }

                  else{
                    $('.paid_amount').hide();
                  
                }
                      });
          
        </script>

        //for new customer

        <script type="text/javascript">
          $(document).on('change','#customer_id',function(){
            var customer_id =$(this).val();
            if(customer_id=='0'){
              $('.new_customer').show();

            }
            else{
              $('.new_customer').hide();
            }

          });
        </script>
        @endsection
