<?php

namespace App\Http\Controllers;

use App\Models\Advisory;
use App\Models\Slider;
use App\Models\CertificateCategory;
use App\Models\CertificateDescription;
use App\Models\Enrollment;
use App\Models\Organize;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    function organization(){
        $data['page'] = 'organizer';
        $data['organizations'] = Organize::get();
        return view('admin.organization')->with($data);
    }
    function advisory(){
        $data['page'] = 'advisory';
        $data['advisories'] = Advisory::with('member')->with('blog')->get();
        return view('admin.advisory')->with($data);
    }
    function slider(){
        $data['page'] = '';
        $data['sliders'] = Slider::with('page')->get();
        return view('admin.slider')->with($data);
    }
    function partner(){
        $data['page'] = 'partner';
        $data['partners'] = Partner::get();
        return view('admin.partner')->with($data);
    }
    function Certificates_category(){
        $data['page'] = 'cat';
        $data['cats'] = CertificateCategory::get();
        $data['i'] = 1;
        return view('admin.certificate-cat')->with($data);
    }
    function Certificates_descriptions(){
        $data['page'] = 'desc';
        $data['descriptions'] = CertificateDescription::with('cat')->get();
        $data['cats'] = CertificateCategory::get();
        return view('admin.certificate-descriptions')->with($data);
    }
    function users(){
        $data['page'] = 'users';
        // type == 2 is user, type == 1 is admin
        $data['users'] = User::where('type', 2)->get();
        $data['certificates'] = CertificateDescription::get();
        return view('admin.users')->with($data);
    }
    function userscert($id){
        $data['page'] = 'users';
        // type == 2 is user, type == 1 is admin
        $data['users'] = User::where('type', 2)->get();
        $data['certificates'] = CertificateDescription::find($id);
        $data['enrolls'] = Enrollment::with('user')->where('certificate_descriptions_id',$id)->get();
        return view('admin.user_cert')->with($data);
        //return $data;
    }
    public function profile(){
        $data['page'] = 'profile';
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        return view('admin.profile')->with($data);
    }
    public function setting(){
        $data['page'] = 'profile';
        $data['user'] = User::find(auth()->user()->getAuthIdentifier());
        return view('admin.profile-setting')->with($data);
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

}
