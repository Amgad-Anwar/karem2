@extends('auth/register')
@section('tap')
    <div class="bs-stepper-header px-0" role="tablist">
        <a href="#" class="step " data-target="#account-details" role="tab"
             id="account-details-trigger">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                  <i data-feather="home" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">اليروفايل</span>
                  <span class="bs-stepper-subtitle">بيانات الحساب الخاص بك</span>
                </span>
            </button>
        </a>
        <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
        </div>
        <a href="#" class="step " data-target="#personal-info" role="tab"
             id="personal-info-trigger">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                  <i data-feather="user" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">البيانات الشخصيه</span>
                  <span class="bs-stepper-subtitle">ادخل البيانات الشخصيه</span>
                </span>
            </button>
        </a>
        <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
        </div>
        <a href="#"class="step active" data-target="#billing" role="tab" id="billing-trigger">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                  <i data-feather="credit-card" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">أساس الكفاءة</span>
                  <span class="bs-stepper-subtitle">بيان بالمتطلبات</span>
                </span>
            </button>
        </a>
    </div>
    <div class="bs-stepper-content px-0 mt-4">
        <div id="billing" class="content active dstepper-block" role="tabpanel"
             aria-labelledby="billing-trigger">
            <div class="content-header mb-2">
                <h2 class="fw-bolder mb-75">أساس الكفاءة</h2>
                <span>بيان المتطلبات</span>
            </div>
            <form id="form3" method="POST" action="{{ route('register.moreinfo') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userid" value="{{ $id }}" id="userid3">
                <!-- Educational qualification-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">المؤهل العلمي</label>
                    <select id="mylist" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="education"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="education_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- second foreign language-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">لغة أجنبية ثانية</label>
                    <select id="mylist2" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id2" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label"  for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="2nd_lang"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="2nd_lang_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- computer skills-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">مهارات الحاسوب</label>
                    <select id="mylist3" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id3" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="computer_skills"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="computer_skills_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- Field of work/job-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">مجال العمل / الوظيفة</label>
                    <select id="mylist4" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id4" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="job"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="jop_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- Previous training certificates / number of previous training hours.-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">شهادات التدريب السابقة / عدد ساعات التدريب السابقة.</label>
                    <select id="mylist5" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id5" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="training"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="training_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- Years of Experience-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">عدد سنوات الخبره</label>
                    <select id="mylist6" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id6" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="experience"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="experience_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- The number of working hours targeted to work with the previous certificate-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">عدد ساعات العمل المستهدفة للعمل بالشهادة السابقة</label>
                    <select id="mylist7" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id7" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="target"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="target_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->
                <!-- A copy of the national ID/passport-->
                <div class="mb-1">
                    <label style="font-size:17px" class="form-label" for="mylist">نسخه من بطاقه الرقم القومي/الباسبور</label>
                    <select id="mylist8" class="form-select">
                        <option>لا يوجد</option>
                        <option value="applicable">يوجد</option>
                    </select>
                </div>
                <div style="display: none" id="id8" class="row gx-2">
                    <div class="col-12">
                        <div class="mb-1">
                            <label style="font-size:17px" class="form-label" for="exampleFormControlTextarea1">التفاصيل</label>
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                name="national_id"
                                placeholder="برجاء كتابه التفاصيل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label style="font-size:17px" for="customFile1" class="form-label">الشهادة أو الوثيقة مطلوبة</label>
                        <input class="form-control" name="national_id_file" type="file" id="customFile1"/>
                    </div>
                </div>
                <!-- End -->

                <div class="d-flex justify-content-between mt-1">
                    <button class="btn btn-primary btn-prev">
                        <i data-feather="chevron-left"
                           class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                    </button>
                    <button type="submit" id="finish" class="btn btn-success btn-submit">
                        <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">ارسال </span>
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
