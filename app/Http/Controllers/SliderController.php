<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            
        ]);

        try {
            $item = new Slider;
            $item->title = $data['title'];
            $item->description = $data['description'];
           // $item->type = $data['type'];
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
            $item = Slider::find($data['id']);
            $item->title = $data['title'];
            $item->description = $data['description'];
           // $item->type = $data['type'];
            $item->save();
            return redirect()->back()->with('Success','Edit Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Edit Error');
        }
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = Slider::find($data['id']);
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
