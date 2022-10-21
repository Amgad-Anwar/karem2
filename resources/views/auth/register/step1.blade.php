@extends('auth/register')
@section('tap')
    <div class="bs-stepper-header px-0" role="tablist">
        <a href="#" class="step active" data-target="#account-details" role="tab"
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
        <a href="#" class="step" data-target="#personal-info" role="tab"
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
        <div id="account-details" class="content active dstepper-block" role="tabpanel"
             aria-labelledby="account-details-trigger">
            <div class="content-header mb-2">
                <h2 class="fw-bolder mb-75">معلومات الحساب</h2>
                <span>أدخل تفاصيل كلمة المرور لاسم المستخدم الخاص بك</span>
            </div>

            <form id="form1" method="POST" action="{{ route('register.main') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <label style="font-size:17px" class="form-label" for="username">اسم المستخدم</label>
                        <input type="text" name="username" id="username"
                               class="form-control" placeholder="اسم المستخدم"/>
                    </div>
                    @error('username')
                    <span style="color:red">{{ $message }}</span>
                    @enderror
                    <div class="col-md-6 mb-1">
                        <label style="font-size:17px" class="form-label" for="email">الايميل</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="examble@email.com"
                            aria-label="examble"
                        />
                    </div>
                    @error('email')
                    <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <label style="font-size:17px" class="form-label" for="password">الرقم السري</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                            <span class="input-group-text cursor-pointer"><i
                                    data-feather="eye"></i></span>
                        </div>
                        @error('password')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-1">
                        <label style="font-size:17px" class="form-label" for="confirm-password">تأكيد الرقم السري</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input
                                type="password"
                                name="password_confirmation"
                                id="confirm-password"
                                class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                            <span class="input-group-text cursor-pointer"><i
                                    data-feather="eye"></i></span>
                        </div>
                    </div>
                </div>
            <div class="d-flex justify-content-between mt-2">
                <button class="btn btn-outline-secondary btn-prev" disabled>
                    <i data-feather="chevron-left"
                       class="align-middle me-sm-25 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                </button>
                <button type="submit" id="next1" class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none">التالي</span>
                    <i data-feather="chevron-right"
                       class="align-middle ms-sm-25 ms-0"></i>
                </button>
            </div>
        </form>

        </div>
    </div>
@endsection
