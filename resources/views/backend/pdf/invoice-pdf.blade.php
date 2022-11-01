<!DOCTYPE html>
<html>
<head>

	<title>Invoice PDF</title>


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table width="100%">
					<tr>
						<td width="33%"><strong>Invoice No:</strong>#{{$invoice->invoice_no}}</td>
						<td width="35%"><span style="font-size:20px;background-color: #ddd;">Basundhara City</span>
                        <br>kawranbazar,Dhaka
						

						</td>
						<td>
							<span>Showroom no:0987654 <br>
                                   Owner no:01987654309
							</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                   <table width="100%">
	                    <tr>
							<td width="33%"></td>
							<td width=""><u><span style="font-size: 16px;">Customer Invoice</span></u></td>
							<td width="30%"></td>
						</tr>
					</table>				

					@php
                        $payment =App\Models\Payment::where('invoice_id',$invoice->id)->first();
                    @endphp

                     
                <table width="100%">
                	<tbody>
                		<tr>
                			<td width="30%"><strong>Name</strong>:&nbsp;{{$payment['customer']['name']}}</td>
                			<td width="30%"><strong>Mobile No:</strong>&nbsp;{{$payment['customer']['mobile_no']}}</td>
                			<td width="40%"><strong>Address</strong>:&nbsp;{{$payment['customer']['address']}}</td>
                		</tr>
                	</tbody>
                	

                </table>
                <br>
                  <table border="1" width="100%" style="margin-bottom:10px">
                  <thead>
                    <tr class="text-center">
                      <th>SL.</th>
                      <th>Category</th>
                      <th>Product Name</th>
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
                      <td>{{++$key}}</td>
                      <td>{{$details['category']['name']}}</td>
                      <td>{{$details['product']['name']}}</td>
                      <td>{{$details->selling_qty}}</td>
                      <td>{{$details->unit_price}}</td>
                      <td>{{$details->selling_price}}</td>

                    </tr>
                    @php
                    $total_sum+= $details->selling_price;
                    @endphp
                    @endforeach
                    <tr>
                      <td class="text-right" colspan="5"><strong>Sub-total</strong></td>
                      <td class="text-center"><strong>{{$total_sum}}</strong></td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="5">Discount</td>
                      <td class="text-center">{{$payment->discount_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="5">Paid Amount</td>
                      <td class="text-center">{{$payment->paid_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="5">Due Amount</td>
                      <td class="text-center">{{$payment->due_amount}}</td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="5"><strong>Grand Total</strong></td>
                      <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                    </tr>

                  </tbody>
                  
                </table>
                  @php
                  $date = new DateTime('now',new  DateTimezone('Asia/Dhaka'));
                  @endphp
               <i>Printing Time:{{$date->format('F j,Y, g:i a')}}</i>
                
                  
				
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-bottom: 0px;">
				<table>
					<tbody>
						<tr>
						<td width="40%">
							<p style="text-align: center;margin-left: 20px; ">Customer Signature</p>
						</td>
						<td width="40%"></td>
						<td width="20%"><p style="text-align: center;">Seller Signature</p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>