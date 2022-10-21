<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function add(Request $request)
    {
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        try {
            $item = new Subject;
            $item->title = $data['title'];
            $item->user_id = $data['user_id'];
            $item->exam_id = $data['exam_id'];
            $item->score = $data['score'];
            $item->save();
            return redirect()->back()->with('Success', 'Add Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Add Error');
        }
    }

    function edit(Request $request)
    {
        $data = $request->input();

        $this->validate($request, [
            'title' => 'required|string',
            'score' => 'required|numeric|min:0|max:100',
        ]);


        try {
            $item = Subject::find($data['id']);
            $item->title = $data['title'];
            $item->score = $data['score'];
            $item->save();
            return redirect()->back()->with('Success', 'Edit Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Edit Error');
        }
    }

    function delete(Request $request)
    {
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->delete();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function review(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->review = 1;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function accept_review(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->review = 3;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function refuse_review(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->review = 2;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function return(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->return = 1;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function accept_return(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->return = 3;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
    function refuse_return(Request $request){
        $data = $request->input();
        try {
            $item = Subject::find($data['id']);
            if (isset($item)) {
                $item->return = 2;
                $item->save();
                return redirect()->back()->with('Success', 'Delete Successfully');
            } else {
                return redirect()->back()->with('alert', 'Organization Not Found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Delete Error');
        }
    }
}
