<?php

namespace App\Http\Controllers;

use App\Models\Advisory_Member;
use App\Models\AdvisoryMember;
use Illuminate\Http\Request;

class AdvisoryMemberController extends Controller
{
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'job' => 'required|string',
        ]);
        $image = $request->file('image');
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('image/advisorymember');
        $image->move($destinationPath, $imgname);
        try {
            $item = new AdvisoryMember;
            $item->name = $data['name'];
            $item->role = $data['job'];
            $item->image_file = $imgname;
            $item->advisory_id = $data['advisory_id'];
            $item->save();
            return redirect()->back()->with('Success','Add Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Add Error');
        }
    }
    function edit(Request $request){
        $data = $request->input();

        $this->validate($request, [
            'name' => 'required|string',
            'job' => 'required|string',
        ]);

        try {
            $item = AdvisoryMember::find($data['id']);
            $item->name = $data['name'];
            $item->role = $data['job'];

            if($request->hasFile('image')) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image = $request->file('image');
                $imgname = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('image/advisorymember');
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
