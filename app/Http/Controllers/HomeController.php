<?php

namespace App\Http\Controllers;

use App\Models\Advisory;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\CertificateCategory;
use App\Models\CertificateDescription;
use App\Models\Organize;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['sliders'] = Slider::get();
        $data['organizers'] = Organize::get();
        return view('home.index')->with($data);
    }
    public function cert_detail($id)
    {
        $decid = decrypt($id);
        $data['certificate'] = CertificateDescription::find($decid);
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.certificate-details')->with($data);
    }
    public function graduates_details($id)
    {
        $decid = decrypt($id);
        $data['certificate'] = CertificateDescription::find($decid);
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['cert_id'] = $decid;

        return view('home.graduates-details')->with($data);
    }
    public function courses_details($id)
    {
        $decid = decrypt($id);
        $data['certificate'] = CertificateDescription::find($decid);
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['cert_id'] = $decid;

        return view('home.courses-details')->with($data);
    }
    public function certificates()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.certificates')->with($data);
    }
    public function advisory()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['advisories'] = Advisory::get();
        return view('home.international-advisary-board')->with($data);
    }
    public function advisory_team($id)
    {
        $decid = decrypt($id);
        $data['advisory'] = Advisory::with('member')->with('blog')->find($decid);
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.international-advisary-board-team')->with($data);
    }
    public function advisory_blog($id){
        $decid = decrypt($id);
        $data['blog'] = Blog::find($decid);
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.blog')->with($data);

    }
    public function partner()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['partners'] = Partner::get();
        return view('home.partners')->with($data);
    }
    public function quality()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.quality-assurance')->with($data);
    }
    public function qualifications()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.qualifications')->with($data);
    }
    public function evaluation()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.evaluation')->with($data);
    }
    public function international_recognition()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.international_recognition')->with($data);
    }
    public function Accreditation()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['advisories'] = Advisory::get();

        return view('home.Accreditation')->with($data);
    }
    public function impartiality()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.impartiality')->with($data);
    }
    public function expert()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['advisories'] = Advisory::get();

        return view('home.expert')->with($data);
    }
    public function neutrality()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();
        $data['advisories'] = Advisory::get();

        return view('home.neutrality')->with($data);
    }
    public function abroval()
    {
        $data['cats'] = CertificateCategory::with('cert')->get();

        return view('home.abroval')->with($data);
    }
    public function one($id){
         $data['cats'] = CertificateCategory::with('cert')->get();
         $data['slider'] = Slider::with('page')->find($id);
        return view('home.one')->with($data);
    }
     public function two(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.two')->with($data);
    }
     public function three(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.three')->with($data);
    }
     public function four(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.four')->with($data);
    }
     public function five(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.five')->with($data);
    }
     public function six(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.six')->with($data);
    }
     public function seven(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.seven')->with($data);
    }
    public function eight(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.eight')->with($data);
    }
    public function nine(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.nine')->with($data);
    }
    public function ten(){
         $data['cats'] = CertificateCategory::with('cert')->get();
        return view('home.ten')->with($data);
    }


}
