<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index(){
        $payment = Payment::all();
        return view('admin.pages.payment.paymentList',['payment'=>$payment]);
    }

    public function add(Request $request){
        $payment = new Payment();
        $payment->name = $request->txtName;
        $payment->save();
        return redirect('admin/form/payment');

    }
    public function update(Request $request,$id){
        
        $payment = Payment::find($id);
        $payment->name = $request->txtName;
        $payment->save();
        return redirect('admin/form/payment');

    }
    public function delete(Request $request,$id){

        $payment = Payment::find($id);
        $payment->delete();
        return redirect('admin/form/payment');

    }
}
