<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class ReverseController extends Controller
{
    function pay(Request $request){
        $data = $request->input();
        try {
            $item = Enrollment::find($data['id']);
            if(isset($item)){
                $item->pay = 1;
                $item->save();
                return redirect()->back()->with('Success','Delete Successfully');
            }else{
                return redirect()->back()->with('alert','User Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = Enrollment::find($data['id']);
            if(isset($item)){
                $item->delete();
                return redirect()->back()->with('Success','Delete Successfully');
            }else{
                return redirect()->back()->with('alert','User Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
}
