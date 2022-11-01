<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Unit;
use Auth;
use count;
use DB;
use PDF;



class InvoiceController extends Controller
{
     public function view(){ 

   $data['alldata']=Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
   return view('backend.invoices.view_invoice',$data);
     }

    public function add(){

        $data['categories']=Category::all();
        $data['purchases']=Purchase::all();
        $data['products']=Product::all();
        $data['invoice']=Invoice::all();


    	$invoice_data=Invoice::orderBy('id','desc')->first();
        if ($invoice_data== null)

         {
            $firstReg='0';
            $data['invoice_no']=$firstReg +1;
        }

        else {
        $invoice_data=Invoice::orderBy('id','desc')->first()->invoice_no;
        $data['invoice_no']=$invoice_data+1;

        }
        $data['customers']=Customer::all();
    	return view('backend.invoices.add_invoice',$data);
    }

    public function store(Request $request){




    	if($request->category_id == null ){
        return redirect()->back()->with('success','Sorry! You do not select any item');

        }
           else


        {
            if($request->paid_amount>$request->estimated_amount){

                return redirect()->back()->with('success','paid amount is greater than estimateed amount');
            }

            else
            {
                $invoice= new Invoice();
            $invoice->invoice_no=$request->invoice_no;
          $invoice->date=date('Y-m-d',strtotime($request->date));
            $invoice->description=$request->description;
            $invoice->status='0';
           $invoice->created_by=Auth::user()->id;
           DB::transaction(function() use($request,$invoice){

            if($invoice->save()){
                $count_category = count($request->category_id);
            for ($i=0; $i< $count_category ; $i++) { 
                $invoice_details=new invoiceDetail();
                $invoice_details->date=date('Y-m-d',strtotime($request->date));


                $invoice_details->invoice_id=$invoice->id;
                $invoice_details->category_id=$request->category_id[$i];
                $invoice_details->product_id=$request->product_id[$i];
                $invoice_details->selling_qty=$request->selling_qty[$i];
                $invoice_details->unit_price=$request->unit_price[$i];
                $invoice_details->selling_price=$request->selling_price[$i];
                $invoice_details->status='1';
                $invoice_details->save();



           }
           if($request->customer_id=='0'){
            $customer= new Customer();
            $customer->name=$request->name;
            $customer->mobile_no=$request->mobile_no;
            $customer->address=$request->address;
            $customer->save();
            $customer_id =$customer->id;
           }
           else{
             $customer_id =$request->customer_id;

           }

           $payment=new Payment();
           $payment_details= new PaymentDetail();
           $payment->invoice_id=$invoice->id;
           $payment->customer_id=$customer_id;
           $payment->paid_status=$request->paid_status;
          
           $payment->discount_amount=$request->discount_amount;
           $payment->total_amount=$request->estimated_amount;
           if($request->paid_status=='full_paid'){

             $payment->paid_amount=$request->estimated_amount;
             $payment->due_amount='0';
             $payment_details->current_paid_amount=$request->estimated_amount;

                }

                elseif ($request->paid_status=='full_due') {

             $payment->paid_amount='0';
             $payment->due_amount=$request->estimated_amount;
             $payment_details->current_paid_amount='0';


                    
                }

                elseif ($request->paid_status=='partial_paid') {

             $payment->paid_amount=$request->paid_amount;
             $payment->due_amount=$request->estimated_amount-$request->paid_amount;
             $payment_details->current_paid_amount=$request->paid_amount;


                    
                }

                $payment->save();
                $payment_details->invoice_id=$invoice->id;
                $payment_details->date=date('Y-m-d',strtotime($request->date));
                $payment_details->save();


            }

       

            });
            

          
        }
            

    	return redirect()->route('invoices.view')->with('success','Data Save Successfully');	

    	}
    	
    	
    }


    public function edit($id){

        $data['editdata']=Purchase::find($id);
    	$data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        
        $data['units']=Unit::all();
    	
    	return view('backend.purchases.edit_purchase',$data);
    }


     public function update(Request $request, $id){
    	       $this->validate($request,[
            'name'=>'required',
            

        ]);
        
        $purchase=Purchase::find($id);
        $purchase->supplier_id=$request->supplier_id;
        $purchase->category_id=$request->category_id;
        $purchase->unit_id=$request->unit_id;
        $purchase->name=$request->name;
        $purchase->quantity='0';
        
        $purchase->updated_by=Auth::user()->id;
        $purchase->save();

    return redirect()->route('purchases.view')->with('success','purchases added successfully');

    }


    public function delete($id){
    $invoice=Invoice::find($id);
    $invoice->delete();

    return redirect()->back()->with('success','invoices deleted successfully');

    }

    public function pendingList(){

       $data['alldata']=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();

       return view('backend.invoices.view_pending_list',$data);



    }

    public function approve($id){
        
        $data['invoice']=Invoice::with(['invoice_details'])->find($id);

        return view('backend.invoices.approve_invoice',$data);



    } 


    public function approveStore(Request $request,$id){


        
        foreach($request->selling_qty as $key=> $val){
            $invoice_details = InvoiceDetail::where('id',$key)->first();
            $product=Product::where('id',$invoice_details->product_id)->first();
            if($product->quantity < $request->selling_qty[$key]){
                return redirect()->back()->with('success','Sorry ! You approve maximum value');
            }

        }

        $invoice = Invoice ::find($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status='1';
        DB::transaction(function() use($request,$invoice,$id){

            foreach ($request->selling_qty as $key => $val) {

            $invoice_details = InvoiceDetail::where('id',$key)->first();
            $product=Product::where('id',$invoice_details->product_id)->first();
            $product->quantity=((float)$product->quantity)-((float)$request->selling_qty[$key]);

            $product->save();

                
            }

            $invoice->save();

        });
        return redirect()->route('invoices.pending.list')->with('success','Invoice Successfully Approved');



    }

    public function printInvoiceList(){

   $data['alldata']=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
   return view('backend.invoices.pos_invoice_list',$data);
    }

    public function printInvoice($id){

    $data['invoice']=Invoice::with(['invoice_details'])->find($id);

    $pdf = PDF::loadView('backend.pdf.invoice-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');


    }    
}
