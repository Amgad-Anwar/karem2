<?php

namespace App\Http\Controllers;

use App\Models\CertificateDescription;
use Illuminate\Http\Request;

class CertificateDescriptionController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
            'cat_id' => 'required|exists:certificate_categories,id',
            'required' =>'required',
            'description'=>'required',
        ]);

        try {
            $item = new CertificateDescription;
            $item->title = $data['title'];
            $item->certificate_categories_id = $data['cat_id'];
            $item->required = $data['required'];
            $item->description = $data['description'];
            $item->price = $data['price'];
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
            'cat_id' => 'required|exists:certificate_categories,id',
            'required' =>'required',
            'description'=>'required',
        ]);

        try {
            $item = CertificateDescription::find($data['id']);
            $item->title = $data['title'];
            $item->certificate_categories_id = $data['cat_id'];
            $item->required = $data['required'];
            $item->description = $data['description'];
            $item->price = $data['price'];
            $item->save();
            return redirect()->back()->with('Success','Add Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Add Error');
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
