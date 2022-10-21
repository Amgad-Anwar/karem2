<?php

namespace App\Http\Controllers;

use App\Models\SliderPage;
use Illuminate\Http\Request;

class SliderPageController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
            'description'=>'required|string',
            'slider_id' =>"required"
        ]);
        try {
            $item = new SliderPage;
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->slider_id = $data['slider_id'];
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
            'description'=>'required|string',
        ]);

        try {
            $item = SliderPage::find($data['id']);
             $item->title = $data['title'];
            $item->description = $data['description'];
            $item->save();
            return redirect()->back()->with('Success','Edit Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Edit Error');
        }
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = AdvisoryMember::find($data['id']);
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
