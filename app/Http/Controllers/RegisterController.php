<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    function step1()
    {
        return view('auth.register.step1');
    }

    function step2($id)
    {
        return view('auth.register.step2')->with(['id'=>$id]);
    }

    function step3($id)
    {
        return view('auth.register.step3')->with(['id'=>$id]);
    }


    function register(Request $request){
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string','unique:users'],
        ]);
        $data = $request->input();
        try {
            $row = new User;
            $row->username = $data['username'];
            $row->email = $data['email'];
            $row->password = Hash::make($data['password']);
            // type == 2 is Student , type == 1 is admin
            $row->type = 2;
            $row->save();
            return redirect()->route('register.step2',$row->id);
        }catch (Exception $e){
            return redirect()->back()->with('error','Error Register');
        }


    }
    function personalInformationRegister(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'int','min:13','max:90'],
        ]);
        $data = $request->input();
        try {
            $row = User::find($data['userid']);
            $row->name = $data['name'];
            $row->age = $data['age'];
            $row->save();
            return redirect()->route('register.step3',$row->id);
        }catch (Exception $e){
            return redirect()->back()->with('error','Error Register');
        }
    }
    function moreinfo(Request $request){
        $this->validate($request, [
            'education_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            '2nd_lang_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'computer_skills_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'job_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'training_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'experience_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'target_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf'],
            'national_id_file' => ['mimes:jpeg,bmp,png,gif,svg,pdf']
        ]);
        $data = $request->input();
        try {
            $row = User::find($data['userid']);
            if(!empty($data['education'])){
                $row-> education = $data['education'];
            }
            if(!empty($data['2nd_lang'])){
                $row['2nd_lang'] = $data['2nd_lang'];
            }
            if(!empty($data['computer_skills'])){
                $row->computer_skills = $data['computer_skills'];
            }
            if(!empty($data['job'])){
                $row->job = $data['job'];
            }
            if(!empty($data['training'])){
                $row->training = $data['training'];
            }
            if(!empty($data['experience'])){
                $row->experience = $data['experience'];
            }
            if(!empty($data['target'])){
                $row->target = $data['target'];
            }
            if(!empty($data['national_id'])){
                $row->national_id = $data['national_id'];
            }
            if($request->hasFile('education_file')) {
                $education_file = $request->file('education_file');
                $education_name = time() . '.' . $education_file->getClientOriginalExtension();
                $destinationPath = public_path('files/education');
                $education_file->move($destinationPath, $education_name);
                $row->education_file = $education_name;
            }
            if($request->hasFile('2nd_lang_file')) {
                $nd_lang_file = $request->file('2nd_lang_file');
                $nd_lang = time() . '.' . $nd_lang_file->getClientOriginalExtension();
                $destinationPath = public_path('files/lang2');
                $nd_lang_file->move($destinationPath, $nd_lang);
                $row['2nd_lang_file'] = $nd_lang;
            }
            if($request->hasFile('computer_skills_file')) {
                $computer_skills_file = $request->file('computer_skills_file');
                $computer_skills = time() . '.' . $computer_skills_file->getClientOriginalExtension();
                $destinationPath = public_path('files/computer-skills');
                $computer_skills_file->move($destinationPath, $computer_skills);
                $row->computer_skills_file = $computer_skills;
            }
            if($request->hasFile('job_file')) {
                $job_file = $request->file('job_file');
                $job_name = time() . '.' . $job_file->getClientOriginalExtension();
                $destinationPath = public_path('files/job');
                $job_file->move($destinationPath, $job_name);
                $row->job_file = $job_name;
            }
            if($request->hasFile('training_file')) {
                $training_file = $request->file('training_file');
                $training_name = time() . '.' . $training_file->getClientOriginalExtension();
                $destinationPath = public_path('files/training');
                $training_file->move($destinationPath, $training_name);
                $row->training_file = $training_name;
            }
            if($request->hasFile('experience_file')) {
                $experience_file = $request->file('experience_file');
                $experience_name = time() . '.' . $experience_file->getClientOriginalExtension();
                $destinationPath = public_path('files/experience');
                $experience_file->move($destinationPath, $experience_name);
                $row->experience_file = $experience_name;
            }
            if($request->hasFile('target_file')) {
                $target_file = $request->file('target_file');
                $target_name = time() . '.' . $target_file->getClientOriginalExtension();
                $destinationPath = public_path('files/target');
                $target_file->move($destinationPath, $target_name);
                $row->target_file = $target_name;
            }
            if($request->hasFile('national_id_file')) {
                $NID = $request->file('national_id_file');
                $NID_name = time() . '.' . $NID->getClientOriginalExtension();
                $destinationPath = public_path('files/NID');
                $NID->move($destinationPath, $NID_name);
                $row->national_id_file = $NID_name;
            }
            $row->save();
            return redirect()->route('home');
        }catch (Exception $e){
            return redirect()->back()->with('error','Error Register');
        }
    }
}
