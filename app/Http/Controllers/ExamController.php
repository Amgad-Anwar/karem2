<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    function add(Request $request)
    {
        $data = $request->input();
        $this->validate($request, [
            'title' => 'required|string',
            'date' => 'required',
        ]);

        try {
            $item = new Exam;
            $item->title = $data['title'];
            $item->date = $data['date'];
            $item->user_id = $data['user_id'];
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
            'date' => 'required',
        ]);

        try {
            $item = Exam::find($data['id']);
            $item->title = $data['title'];
            $item->date = $data['date'];
            $item->save();
            return redirect()->back()->with('Success', 'Add Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'Add Error');
        }
    }

    function delete(Request $request)
    {
        $data = $request->input();
        try {
            $item = Exam::find($data['id']);
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

}

