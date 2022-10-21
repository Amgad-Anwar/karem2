<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $image = $request->file('cover');
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('image/advisoryblog');
        $image->move($destinationPath, $imgname);
        try {
            $item = new Blog;
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->cover = 'image/advisoryblog/'.$imgname;
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
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            $item = Blog::find($data['id']);
            $item->title = $data['title'];
            $item->description = $data['description'];

            if($request->hasFile('cover')) {
                $this->validate($request, [
                    'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image = $request->file('cover');
                $imgname = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('image/advisoryblog');
                $image->move($destinationPath, $imgname);
                $item->cover = 'image/advisoryblog/'.$imgname;
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
            $item = Blog::find($data['id']);
            if(isset($item)){
                $item->delete();
                return redirect()->back()->with('Success','Delete Successfully');
            }else{
                return redirect()->back()->with('alert','Blog Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
}
