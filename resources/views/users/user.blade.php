@extends('layouts.user')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="app-user-view-account">
              <div class="row">
                <!-- User Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                  <!-- User Card -->
                  <div class="card">
                    <div class="card-body">
                      <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                          <img class="img-fluid rounded mt-3 mb-2" src="{{ url('image/users',$user->photo) }}" height="110" width="110" alt="User avatar"/>
                          <div class="user-info text-center">
                            <h4>{{ $user->name }}</h4>
                            <span class="badge bg-light-secondary">{{__('translation.students')}}</span>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-around my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                          <span class="badge bg-light-primary p-75 rounded">
                            <i data-feather="check" class="font-medium-2"></i>
                          </span>
                          <div class="ms-75">
                            <h4 class="mb-0">{{ $enrollCount }}</h4>
                            <small>{{__('translation.cert')}}</small>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <span class="badge bg-light-primary p-75 rounded">
                            <i data-feather="briefcase" class="font-medium-2"></i>
                          </span>
                          <div class="ms-75">
                            <h4 class="mb-0">0</h4>
                            <small>{{__('translation.reviews')}}</small>
                          </div>
                        </div>
                      </div>
                      <h4 class="fw-bolder border-bottom pb-50 mb-1">{{__('translation.Profile Details')}}</h4>
                      <div class="info-container">
                        <ul class="list-unstyled">
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.username')}}:</span>
                            <span>{{ $user->username }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.email')}}:</span>
                            <span>{{ $user->email }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.status')}}:</span>
                            <span class="badge bg-light-success">{{ $user->status ? 'Active':'disabled' }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.age')}}:</span>
                            <span>{{ $user->age }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.phone')}}:</span>
                            <span>{{ $user->phone }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.lang')}}:</span>
                            <span>{{ $user->language }}</span>
                          </li>
                          <li class="mb-75">
                            <span class="fw-bolder me-25">{{__('translation.country')}}:</span>
                            <span>{{ $user->country }}</span>
                          </li>
                        </ul>
                        <div class="d-flex justify-content-center pt-2">
                          <a style="width: 100%" href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                            {{__('translation.edit')}}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ User Sidebar -->

                <!-- User Content -->
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                  <!-- User Pills -->
                  <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                      <a class="nav-link {{ $page == "account"?'active':"" }} " href="{{ route('user') }}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">{{__('translation.account')}}</span></a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $page == "certificate"?'active':"" }}" href="{{ route('user.certificate') }}">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">{{__('translation.cert')}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $page == "exam"?'active':"" }}" href="{{ route('user.exam') }}">
                        <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">{{__('translation.exam')}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $page == "info"?'active':"" }}" href="{{ route('user.info') }}">
                        <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.info')}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $page == "reverse"?'active':"" }}" href="{{ route('user.reverse') }}">
                        <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.info')}}</span>
                      </a>
                    </li>
                  </ul>
                  <!--/ User Pills -->
                  @yield('page')
                </div>
                <!--/ User Content -->
              </div>
            </section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">Edit User Information</h1>
                        <p>Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input
                                type="text"
                                id="modalEditUserFirstName"
                                name="modalEditUserFirstName"
                                class="form-control"
                                placeholder="Ahmed"
                                data-msg="Please enter your first name"
                            />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input
                                type="text"
                                id="modalEditUserLastName"
                                name="modalEditUserLastName"
                                class="form-control"
                                placeholder="karem"
                                data-msg="Please enter your last name"
                            />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="modalEditUserName">Username</label>
                            <input
                                type="text"
                                id="modalEditUserName"
                                name="modalEditUserName"
                                class="form-control"
                                placeholder="Ahmed karem"
                            />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email:</label>
                            <input
                                type="text"
                                id="modalEditUserEmail"
                                name="modalEditUserEmail"
                                class="form-control"
                                placeholder="ak5464235@gmail.com"
                            />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditAge">Age</label>
                            <input
                                type="text"
                                id="modalEditAge"
                                name="modalEditAge"
                                class="form-control modal-edit-tax-id"
                                placeholder="21"
                            />
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserPhone">Contact</label>
                            <input
                                type="text"
                                id="modalEditUserPhone"
                                name="modalEditUserPhone"
                                class="form-control phone-number-mask"
                                placeholder="+201207807796"
                            />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLanguage">Language</label>
                            <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select" multiple>
                                <option value="english">English</option>
                                <option value="spanish">Spanish</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                                <option value="dutch">Dutch</option>
                                <option value="hebrew">Hebrew</option>
                                <option value="sanskrit">Sanskrit</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserCountry">Country</label>
                            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select">
                                <option value="">Select Value</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
