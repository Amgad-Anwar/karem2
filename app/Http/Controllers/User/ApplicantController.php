<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantsHasUser;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    //
    function add(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'rating' => 'required',
            'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
            'self-assessment' => 'required',
            'qualification' => 'required'
        ]);
        $Applicant_file = $request->file('file');
        $Applicant_name = time() . '.' . $Applicant_file->getClientOriginalExtension();
        $destinationPath = public_path('files/Applicant');
        $Applicant_file->move($destinationPath, $Applicant_name);
        try {
            $item = new ApplicantsHasUser;
            $item->applicant_id = $data['qualification'];
            $item->user_id = $data['id'];
            $item->rating = $data['rating'];
            $item->file = $Applicant_name;
            $item->save();
            return redirect()->back()->with('Success','Add Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Add Error');
        }
    }
    function delete(Request $request){

    }
    function getByCat($id){
        $apps = Applicant::where('applicant_cats_id',$id)->get();
        $rows = [];
        foreach($apps as $app){
            $rows[] = '<option value="' . $app["id"] .'">' . $app["title"] . '</option>';
        }
        return json_encode($rows);

    }
}
