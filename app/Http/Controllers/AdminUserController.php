<?php

namespace App\Http\Controllers;

use App\Models\ApplicantCat;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    function view($id){
        $data['page'] = 'users';
        $data['i']=1;
        $data['enrollCount'] = Enrollment::where('users_id',$id)->count();
        $data['user'] = User::with('last_certificate')->find($id);
        return view('admin.users.account')->with($data);
    }
    function certificate($id){
        $data['page'] = 'users';
        $data['i']=1;
        $data['enrollCount'] = Enrollment::where('users_id',$id)->count();
        $data['user'] = User::with('last_certificate')->find($id);
        return view('admin.users.certificate')->with($data);
    }
    function exam($id){
        $data['page'] = 'users';
        $data['enrollCount'] = Enrollment::where('users_id',$id)->count();
        $data['user'] = User::with('exam')->find($id);
        return view('admin.users.exam')->with($data);
    }
    function info($id){
        $data['page'] = 'users';
        $data['user'] = User::with('applicant')->find($id);
        $data['enrollCount'] = Enrollment::where('users_id',$id)->count();
        $data['app_cat'] = ApplicantCat::with('applicant')->get();
        return view('admin.users.info')->with($data);
    }
    function reverse($id){
        $data['page'] = 'users';
        $data['user'] = User::find($id);
        $data['enrollCount'] = Enrollment::where('users_id',$id)->count();
        $data['enrolls'] = Enrollment::with('cert')->where('users_id',$id)->get();
        return view('admin.users.reverse')->with($data);
    }
    function delete(Request $request){
        $data = $request->input();
        try {
            $item = User::find($data['id']);
            if(isset($item)){
                $item->delete();
                return redirect()->back()->with('Success','Delete Successfully');
            }else{
                return redirect()->back()->with('alert','User Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
    function suspended(Request $request){
        $data = $request->input();
        try {
            $item = User::find($data['id']);
            if(isset($item)){
                $item->stuts = 0;
                $item->save();
                return redirect()->back()->with('Success','Suspended Successfully');
            }else{
                return redirect()->back()->with('alert','User Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Suspended Error');
        }
    }


}
