<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Exception;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    function enroll(Request $request){
        $data = $request->input();
        try{
            $item = new Enrollment;
            $item->users_id = auth()->user()->getAuthIdentifier();
            $item->certificate_descriptions_id = $data['cert_id'];
            $item->save();
            return redirect()->route('user.pay',$item->id)->with('success','Success Enrollment this Certificate');
        }catch(Exception $e){
            return redirect()->back()->with('error','Error Enrollment this Certificate');
        }
    }
    function pay($id){
        $enroll = Enrollment::with('cert')->find($id);
        return view("users.pay",[
            'enroll'=>$enroll,
            'page'=>''
        ]);
    }
}
