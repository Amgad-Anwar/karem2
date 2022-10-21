<?php

namespace App\Http\Controllers;

use App\Models\CertificateCategory;
use Illuminate\Http\Request;

class CertificateCategoryController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
        ]);

        try {
            $item = new CertificateCategory;
            $item->title = $data['title'];
            $item->save();
            return redirect()->back()->with('Success','Add Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Add Error');
        }
    }
    function edit(Request $request){
        $data = $request->input();

        $this->validate($request, [
            'title' => 'required|string',
        ]);

        try {
            $item = CertificateCategory::find($data['id']);
            $item->title = $data['title'];
            $item->save();
            return redirect()->back()->with('Success','Edit Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Edit Error');
        }
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = CertificateCategory::find($data['id']);
            if(isset($item)){
                $item->delete();
                return redirect()->back()->with('Success','Delete Successfully');
            }else{
                return redirect()->back()->with('alert','Organization Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
}
