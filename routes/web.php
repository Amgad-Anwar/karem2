<?php

use App\Http\Controllers\AdminChatsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdvisoryController;
use App\Http\Controllers\AdvisoryMemberController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SliderPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateCategoryController;
use App\Http\Controllers\CertificateDescriptionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LastCertificateController;
use App\Http\Controllers\PaymentControler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrganizeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ReverseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\user\ApplicantController;
use App\Http\Controllers\User\UserChatsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\user\UserLastCertificateController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

//Route::get('/subscribe', [SubscriptionController::class,'showSubscription']);
//Route::post('/seller/subscribe', [SubscriptionController::class,'processSubscription']);
// welcome page only for subscribed users


Route::get('language/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }
    return Redirect::back()->with('msg', 'change language success');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/certificate-details/{id}', [HomeController::class, 'cert_detail'])->name('home.cert.detail');
Route::get('/graduates-details/{id}', [HomeController::class, 'graduates_details'])->name('home.graduates.detail');
Route::get('/courses-details/{id}', [HomeController::class, 'courses_details'])->name('home.courses.detail');
Route::get('/certificates', [HomeController::class, 'certificates'])->name('home.cert');
Route::get('/advisory', [HomeController::class, 'advisory'])->name('home.advisory');
Route::get('/advisor/team/{id}', [HomeController::class, 'advisory_team'])->name('home.advisory.team');
Route::get('/advisor/blog/{id}',[HomeController::class,'advisory_blog'])->name('home.advisory.blog');
Route::get('/partner', [HomeController::class, 'partner'])->name('home.partner');
Route::get('/quality', [HomeController::class, 'quality'])->name('home.quality');
Route::get('/accreditation',[HomeController::class, 'accreditation'])->name('home.Accreditation');
Route::get('/evaluation',[HomeController::class, 'evaluation'])->name('home.evaluation');
Route::get('/export',[HomeController::class, 'expert'])->name('home.expert');
Route::get('/impartiality',[HomeController::class, 'impartiality'])->name('home.impartiality');
Route::get('/international-recognition',[HomeController::class, 'international_recognition'])->name('home.international_recognition');
Route::get('/qualifications',[HomeController::class, 'qualifications'])->name('home.qualifications');
Route::get('/neutrality',[HomeController::class, 'neutrality'])->name('home.neutrality');
Route::get('/abroval',[HomeController::class, 'abroval'])->name('home.abroval');
Route::get('/slider/page/{id}',[HomeController::class, 'one'])->name('home.one');
Route::get('/two',[HomeController::class, 'two'])->name('home.two');
Route::get('/three',[HomeController::class, 'three'])->name('home.three');
Route::get('/four',[HomeController::class, 'four'])->name('home.four');
Route::get('/five',[HomeController::class, 'five'])->name('home.five');
Route::get('/six',[HomeController::class, 'six'])->name('home.six');
Route::get('/seven',[HomeController::class, 'seven'])->name('home.seven');
Route::get('/eight',[HomeController::class, 'eight'])->name('home.eight');
Route::get('/nine',[HomeController::class, 'nine'])->name('home.nine');
Route::get('/ten',[HomeController::class, 'ten'])->name('home.ten');




Route::group(['prefix'=>'register'],function(){
    Route::get('/step1', [RegisterController::class,'step1'])->name('register.step1');
    Route::get('/step2/{id}', [RegisterController::class,'step2'])->name('register.step2');
    Route::get('/step3/{id}', [RegisterController::class,'step3'])->name('register.step3');
    Route::post('/main',[RegisterController::class,'register'])->name('register.main');
    Route::post('/personal',[RegisterController::class,'personalInformationRegister'])->name('register.personal');
    Route::post('/more',[RegisterController::class,'moreinfo'])->name('register.moreinfo');
});

Route::group(['prefix'=>'admin','middleware'=>["auth",'is-admin']],function(){

    Route::get('/',[AdminController::class,'organization'])->name('admin.organization');
    Route::group(['prefix'=>'organization'],function() {
        Route::post('/add',[OrganizeController::class,'add'])->name('organization.add');
        Route::post('/edit',[OrganizeController::class,'edit'])->name('organization.edit');
        Route::post('/delete',[OrganizeController::class,'delete'])->name('organization.delete');
    });

    Route::group(['prefix'=>'advisory/'],function() {
        Route::get('/',[AdminController::class,'advisory'])->name('admin.advisory');
        Route::post('/add',[AdvisoryController::class,'add'])->name('advisory.add');
        Route::post('/edit',[AdvisoryController::class,'edit'])->name('advisory.edit');
        Route::post('/delete',[AdvisoryController::class,'delete'])->name('advisory.delete');
        Route::group(['prefix'=>'member'],function() {
            Route::post('/add',[AdvisoryMemberController::class,'add'])->name('advisory.member.add');
            Route::post('/edit',[AdvisoryMemberController::class,'edit'])->name('advisory.member.edit');
            Route::post('/delete',[AdvisoryMemberController::class,'delete'])->name('advisory.member.delete');
        });
        Route::group(['prefix'=>'blog'],function() {
            Route::post('/add',[BlogController::class,'add'])->name('advisory.blog.add');
            Route::post('/edit',[BlogController::class,'edit'])->name('advisory.blog.edit');
            Route::post('/delete',[BlogController::class,'delete'])->name('advisory.blog.delete');
        });

    });
     Route::group(['prefix'=>'slider/'],function() {
            Route::get('/',[AdminController::class,'slider'])->name('admin.slider');
            Route::post('/add',[SliderController::class,'add'])->name('slider.add');
            Route::post('/edit',[SliderController::class,'edit'])->name('slider.edit');
            Route::post('/delete',[SliderController::class,'delete'])->name('slider.delete');
            Route::group(['prefix'=>'member'],function() {
                Route::post('/add',[SliderPageController::class,'add'])->name('slider.page.add');
                Route::post('/edit',[SliderPageController::class,'edit'])->name('slider.page.edit');
                Route::post('/delete',[SliderPageController::class,'delete'])->name('slider.page.delete');
            });
     });
    Route::group(['prefix'=>'partner'],function() {
        Route::get('/',[AdminController::class,'partner'])->name('admin.partner');
        Route::post('/add',[PartnerController::class,'add'])->name('partner.add');
        Route::post('/edit',[PartnerController::class,'edit'])->name('partner.edit');
        Route::post('/delete',[PartnerController::class,'delete'])->name('partner.delete');
    });

    Route::group(['prefix'=>'certificate'],function(){
        Route::group(['prefix'=>'category'],function(){
            Route::get('/', [AdminController::class,'Certificates_category'])->name('admin.certificate.category');
            Route::post('add', [CertificateCategoryController::class,'add'])->name('admin.certificate.category.add');
            Route::post('edit', [CertificateCategoryController::class,'edit'])->name('admin.certificate.category.edit');
            Route::post('delete', [CertificateCategoryController::class,'delete'])->name('admin.certificate.category.delete');
        });

        Route::group(['prefix'=>'descriptions'],function(){
            Route::get('/', [AdminController::class,'Certificates_descriptions'])->name('admin.certificate.descriptions');
            Route::post('add', [CertificateDescriptionController::class,'add'])->name('admin.certificate.descriptions.add');
            Route::post('edit', [CertificateDescriptionController::class,'edit'])->name('admin.certificate.descriptions.edit');
            Route::post('delete', [CertificateDescriptionController::class,'delete'])->name('admin.certificate.descriptions.delete');
        });


    });

    Route::group(['prefix'=>'users'],function(){
        Route::get('/', [AdminController::class,'users'])->name('admin.users');
        Route::get('/certificate/{id}', [AdminController::class,'userscert'])->name('admin.users.certe');
        Route::get('account/{id}', [AdminUserController::class,'view'])->name('admin.user.view');
        Route::get('certificates/{id}', [AdminUserController::class,'certificate'])->name('admin.user.certificate');

        Route::get('info/{id}', [AdminUserController::class,'info'])->name('admin.user.info');
        Route::get('reverse/{id}', [AdminUserController::class,'reverse'])->name('admin.user.reverse');
        Route::group(['prefix'=>'reverse'],function(){
            Route::post('pay', [ReverseController::class,'pay'])->name('admin.user.reverse.pay');
            Route::post('delete', [ReverseController::class,'delete'])->name('admin.user.reverse.delete');

        });
        Route::post('delete', [AdminUserController::class,'delete'])->name('admin.user.delete');
        Route::post('suspended', [AdminUserController::class,'suspended'])->name('admin.user.suspended');
        Route::group(['prefix'=>'exam'],function(){
            Route::get('{id}', [AdminUserController::class,'exam'])->name('admin.user.exam');
            Route::post('add', [ExamController::class,'add'])->name('admin.user.exam.add');
            Route::post('edit', [ExamController::class,'edit'])->name('admin.user.exam.edit');
            Route::post('delete', [ExamController::class,'delete'])->name('admin.user.exam.delete');
            Route::group(['prefix'=>'subject'],function(){
                Route::post('add', [SubjectController::class,'add'])->name('admin.user.subject.add');
                Route::post('edit', [SubjectController::class,'edit'])->name('admin.user.subject.edit');
                Route::post('delete', [SubjectController::class,'delete'])->name('admin.user.subject.delete');
                Route::post('accept/review', [SubjectController::class,'accept_review'])->name('admin.subject.review.accept');
                Route::post('accept/return', [SubjectController::class,'accept_return'])->name('admin.subject.return.accept');
                Route::post('refuse/return', [SubjectController::class,'refuse_return'])->name('admin.subject.return.refuse');
                Route::post('refuse/review', [SubjectController::class,'refuse_review'])->name('admin.subject.review.refuse');
            });
        });
        Route::group(['prefix'=>'last/certificate'],function(){
            Route::post('add', [LastCertificateController::class,'add'])->name('admin.users.last.certificate.add');
            Route::post('edit', [LastCertificateController::class,'edit'])->name('admin.users.last.certificate.edit');
            Route::post('delete', [LastCertificateController::class,'delete'])->name('admin.users.last.certificate.delete');
        });
    });
    Route::group(['prefix'=> 'profile'],function (){
        Route::get('/',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('setting',[AdminController::class,'setting'])->name('admin.profile.setting');
        Route::post('edit',[AdminController::class,'edit'])->name('admin.profile.edit');
        Route::post('delete',[AdminController::class,'delete'])->name('admin.profile.delete');
    });
    Route::group(['prefix'=>'chat'],function (){
        Route::get('/', [AdminChatsController::class,'index'])->name('admin.chat');
        Route::get('certificate/{id}', [AdminChatsController::class,'chat'])->name('admin.chat.cert');
        Route::get('messages/{id}/{certid}', [AdminChatsController::class,"fetchMessages"])->name('admin.chat.fetch');
        Route::post('send', [AdminChatsController::class,'postSendMessage'])->name('admin.chat.send');
        Route::get('/fetch-old-messages', [AdminChatsController::class,'getOldMessages'])->name('admin.chat.old.fetch');


    });
});

Route::group(['prefix'=>'user','middleware'=>["auth","is-user"]],function(){
    Route::get('/',[UserController::class,'index'])->name('user');
    Route::get('/certificate',[UserController::class,'certificate'])->name('user.certificate');
    Route::group(['prefix'=>'last/certificate'],function() {
        Route::post('add', [UserLastCertificateController::class, 'add'])->name('users.last.certificate.add');
        Route::post('edit', [UserLastCertificateController::class, 'edit'])->name('users.last.certificate.edit');
        Route::post('delete', [UserLastCertificateController::class, 'delete'])->name('users.last.certificate.delete');
    });
    Route::get('/exam',[UserController::class,'exam'])->name('user.exam');
    Route::group(['prefix'=>'exam/subject'],function(){
        Route::post('review', [SubjectController::class,'review'])->name('user.subject.review');
        Route::post('return', [SubjectController::class,'return'])->name('user.subject.return');
    });
    Route::get('/info',[UserController::class,'info'])->name('user.info');
    Route::post('/info/add',[ApplicantController::class,'add'])->name('user.info.add');
    Route::get('/info/getByCat/{id}',[ApplicantController::class,'getByCat'])->name('user.info.getByCat');
    Route::post('/info/delete',[ApplicantController::class,'delete'])->name('user.info.delete');
    Route::get('/reverse',[UserController::class,'reverse'])->name('user.reverse');

    Route::get('/pay/{id}',[EnrollmentController::class, 'pay'])->name('user.pay');
    Route::post('/enroll',[EnrollmentController::class, 'enroll'])->name('user.enroll');
    Route::get('/checkout/{id}',[PaymentControler::class, 'pay'])->name('user.checkout');
    Route::get('/checkouts/review',[UserController::class,'checkout_review'])->name('user.checkout.review');

    Route::post('/purchase',[PaymentControler::class, 'post'])->name('user.purchase');
    Route::get('/invoice/{id}',[PaymentControler::class, 'invoice'])->name('user.invoice');
    Route::get('print/invoice/{id}',[PaymentControler::class, 'print_invoice'])->name('user.print.invoice');
    Route::group(['prefix'=> 'profile'],function (){
        Route::get('/',[UserController::class,'profile'])->name('user.profile');
        Route::get('setting',[UserController::class,'setting'])->name('user.profile.setting');
        Route::post('edit',[UserController::class,'edit'])->name('user.profile.edit');
        Route::post('delete',[UserController::class,'delete'])->name('user.profile.delete');
    });

    Route::group(['prefix' => 'chat'],function (){
       Route::get('/',[UserChatsController::class,'index'])->name('user.chat');
       Route::get('/cert/{id}',[UserChatsController::class,'chat'])->name('user.chat.cert');
        Route::get('messages/{certid}', [UserChatsController::class,"fetchMessages"])->name('admin.chat.fetch');
        Route::post('send', [UserChatsController::class,'postSendMessage'])->name('admin.chat.send');
       // Route::get('/fetch-old-messages', [UserChatsController::class,'getOldMessages'])->name('admin.chat.old.fetch');

    });
});
