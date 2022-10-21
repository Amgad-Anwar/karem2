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
        <a href="#" class="step active" data-target="#personal-info" role="tab"
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
        <a href="#"class="step" data-target="#billing" role="tab" id="billing-trigger">
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
        <div id="personal-info" class="content active dstepper-block" role="tabpanel"
             aria-labelledby="personal-info-trigger">
            <div class="content-header mb-2">
                <h2 class="fw-bolder mb-75">البيانات الشخصيه</h2>
                <span>برجاء ادخال البيانات الشخصيه</span>
            </div>
            <form id="form2" method="POST" action="{{ route('register.personal') }}">
                @csrf
                <input type="hidden" name="userid" value="{{ $id }}" id="userid2">
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label style="font-size:17px" class="form-label" for="name">الأسم</label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="الأسم"/>
                    </div>
                    <div class="mb-1 col-md-6">
                        <label style="font-size:17px" class="form-label" for="age">العمر</label>
                        <input type="number" name="age" id="age" class="form-control"
                               placeholder="العمر"/>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <button class="btn btn-primary btn-prev">
                        <i data-feather="chevron-left"
                           class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                    </button>
                    <button type="submit" id="next2" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                        <i data-feather="chevron-right"
                           class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
