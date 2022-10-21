<?php

namespace App\Http\Controllers;

use App\Models\LastCertificate;
use Illuminate\Http\Request;

class LastCertificateController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required',
        ]);
        $image = $request->file('file');
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('file/certificate');
        $image->move($destinationPath, $imgname);
        try {
            $item = new LastCertificate;
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->file = $imgname;
            $item->users_id = $data['user_id'];
            $item->date = $data['date'];
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
            'description' => 'required|string',
        ]);

        try {
            $item = LastCertificate::find($data['id']);
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->date = $data['date'];

            if($request->hasFile('file')) {
                $this->validate($request, [
                    'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
                ]);
                $image = $request->file('file');
                $imgname = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('file/certificate');
                $image->move($destinationPath, $imgname);
                $item->image_file = $imgname;
            }
            $item->save();
            return redirect()->back()->with('Success','Edit Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Edit Error');
        }
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = LastCertificate::find($data['id']);
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
