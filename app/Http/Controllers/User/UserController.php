<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicantCat;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index(){
        $data['page'] = 'account';
        $data['i']=1;
        $data['enrollCount'] = Enrollment::where('users_id',auth()->user()->getAuthIdentifier())->count();
        $data['user'] = User::with('last_certificate')->find(auth()->user()->getAuthIdentifier());
        return view('users.user-account')->with($data);
    }
    function certificate(){
        $data['page'] = 'certificate';
        $data['i']=1;
        $data['enrollCount'] = Enrollment::where('users_id',auth()->user()->getAuthIdentifier())->count();
        $data['user'] = User::with('last_certificate')->find(auth()->user()->getAuthIdentifier());
        return view('users.certificate')->with($data);
    }
    function exam(){
        $data['page'] = 'exam';
        $data['enrollCount'] = Enrollment::where('users_id',auth()->user()->getAuthIdentifier())->count();
        $data['user'] = User::with('exam')->find(auth()->user()->getAuthIdentifier());
        return view('users.exam')->with($data);
    }
    function info(){
        $data['page'] = 'info';
        $data['enrollCount'] = Enrollment::where('users_id',auth()->user()->getAuthIdentifier())->count();
        $data['user'] = User::with('applicant')->find(auth()->user()->getAuthIdentifier());
        $data['app_cat'] = ApplicantCat::with('applicant')->get();
        return view('users.info')->with($data);
    }
    function reverse(){
        $data['page'] = 'reverse';
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        $data['enrollCount'] = Enrollment::where('users_id',auth()->user()->getAuthIdentifier())->count();
        $data['enrolls'] = Enrollment::with('cert')->where('users_id',auth()->user()->getAuthIdentifier())->get();
        return view('users.reverse')->with($data);
    }
    function checkout_review(){
        $data['page'] = 'checkout';
        $data['i'] = 1;
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        $data['enrolls'] = Enrollment::with('cert')->where('users_id',auth()->user()->getAuthIdentifier())->where('pay',1)->get();
        return view('users.checkout-review')->with($data);
    }
    public function profile(){
        $data['page'] = 'profile';
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        return view('users.profile')->with($data);
    }
    public function setting(){
        $data['page'] = 'profile';
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        return view('users.profile-setting')->with($data);
    }
    public function edit(Request $request){
        $data = $request->input();
        try {
            $row = User::find(auth()->user()->getAuthIdentifier());
            $row->name = $data['name'];
            $row->email = $data['email'];
            $row->phone = $data['phone'];
            $row->username = $data['username'];
            if ($request->hasFile('photo')){
                $image = $request->file('photo');
                $imgname = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('image/users');
                $image->move($destinationPath, $imgname);
                $row->photo = $imgname;
            }
            if (!empty($data['password']) && $data['password'] == $data['confirmpassword']){
                $row->password = Hash::make($data['password']);
            }
            $row->save();
            return redirect()->back()->with('Success','Edit Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('alert','Error in Edit');
        }
    }
    public function delete(Request $request){
        $data = $request->input();
        try {
            $item = User::find(auth()->user()->getAuthIdentifier());
            if(isset($item)){
                $item->delete();
                return redirect()->route('logout');
            }else{
                return redirect()->back()->with('alert','Organization Not Found');
            }
        }catch (Exception $e){
            return redirect()->back()->with('alert','Delete Error');
        }
    }
}
