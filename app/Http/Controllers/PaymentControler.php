<?php

namespace App\Http\Controllers;

use App\Models\CertificateDescription;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentControler extends Controller
{
    //
    function pay($id){
        $user =Auth()->user()->createSetupIntent();
        $cert = CertificateDescription::find($id);
        return view('users.checkout',[
            'cert'=>$cert,
            'user' => $user,
            'page'=>''
        ]);
    }

    function post(Request $request){
        $user          = $request->user();
        $paymentMethod = $request->input('payment_method');
        $product = CertificateDescription::find($request->product_id);

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->invoiceFor($product->title,$product->price * 100 );
            $invoices = $user->invoices();
            $item = Enrollment::where('certificate_descriptions_id',$product->id)
                        ->where('users_id',$user->id)->first();
            $item->pay = 1;
            $item->pay_id= $invoices[0]->lines->data[0]->id;
            $item->invoices_id = $invoices[0]->id;
            $item->save();


            return redirect()->route('user.invoice',encrypt($item->id));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }
    public function invoice($id){
        $deid=decrypt($id);
        $data['invoice'] = Enrollment::with('user')->with('cert')->find($deid);
        $data['page']='';
        return view('users.checkout-reset')->with($data);
    }
    public function print_invoice($id){
        $data['invoice'] = Enrollment::with('user')->with('cert')->find($id);
        $data['page']='';
        return view('users.checkout-reset-print')->with($data);
    }

}
