@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/core/menu/menu-types/vertical-menu.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/pages/app-chat.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/pages/app-chat-list.min.css">
@endsection
@section('script')

    <script src="{{ asset('asset/admin') }}/js/scripts/pages/app-chat.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
@endsection
@section('content')
    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
<!-- BEGIN: Content-->
<div class="app-content content chat-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper container-xxl p-0">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content">
              <span class="sidebar-close-icon">
                <i data-feather="x"></i>
              </span>
                    <!-- Sidebar header start -->
                    <div class="chat-fixed-search">
                        <div class="d-flex align-items-center w-100">
                            <div class="sidebar-profile-toggle">
                                <div class="avatar avatar-border">
                                    <img src="{{ url('image/users',auth()->user()->photo) }}" alt="user_avatar" height="42" width="42"/>
                                </div>
                            </div>
                            <div class="input-group input-group-merge ms-1 w-100">
                                <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                                <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search"/>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar header end -->
                    <!-- Sidebar Users start -->
                    <div id="users-list" class="chat-user-list-wrapper list-group">
                        <h4 class="chat-list-title">{{__('translation.users')}}</h4>
                        <ul class="chat-users-list chat-list media-list">
                            @foreach($enrolls as $enroll)
                                <li class="chat-toggle" data-id="{{ $enroll->user->id }}" data-cert="{{ $enroll->certificate_descriptions_id }}">
                                    <span class="avatar"><img src="{{ url('image/users',$enroll->user->photo) }}" alt="user_avatar" height="42" width="42"/>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{ $enroll->user->name }}</h5>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Sidebar Users end -->
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row"></div>
                    <div class="content-body" ><div class="body-content-overlay"></div>
                        <!-- Main chat area -->
                        <section class="chat-app-window">
                            <!-- To load Conversation -->
                            <div class="start-chat-area active-chat">
                                <div class="mb-1 start-chat-icon">
                                    <i data-feather="message-square"></i>
                                </div>
                                <h4 class="sidebar-toggle start-chat-text">{{__('translation.Start Conversation')}}</h4>
                            </div>
                            <!--/ To load Conversation -->
                        @foreach($enrolls as $enroll)

                            <!-- Active Chat -->
                            <div class="d-none" id="chat_box_{{ $enroll->user->id }}" >
                                <!-- Chat Header -->
                                <div class="chat-navbar">
                                    <header class="chat-header">
                                        <div class="d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none me-1">
                                                <i data-feather="menu" class="font-medium-5"></i>
                                            </div>
                                            <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                                <img src="{{ url('image/users',$enroll->user->photo) }}" alt="avatar" height="36" width="36" />
                                            </div>
                                            <h6 class="mb-0">{{ $enroll->user->name }}</h6>
                                        </div>
                                    </header>
                                </div>
                                <!--/ Chat Header -->
                                    <!-- User Chat messages -->
                                        <div class="user-chats" >
                                            <div class="chats chat-area"  id="chat-overlay">

                                            </div>
                                        </div>
                                        <!-- User Chat messages -->
                                <!-- Submit Chat form -->
                                <form class="chat-app-form " action="javascript:void(0);" onsubmit="enterChat();">
                                    <div class=" input-group input-group-merge me-1 form-send-message">
{{--                                        <span class="speech-to-text input-group-text"><i data-feather="mic" class="cursor-pointer"></i></span>--}}
                                        <input type="text"  name="message" class="form-control message chat_input" placeholder="Type your message or use speech to text" />
{{--                                        <span class="input-group-text">--}}
{{--                                          <label for="attach-doc" class="attachment-icon form-label mb-0">--}}
{{--                                            <i data-feather="image" class="cursor-pointer text-secondary"></i>--}}
{{--                                            <input type="file" id="attach-doc" hidden /> </label--}}
{{--                                          ></span>--}}
                                    </div>
                                        <button type="button" data-to-user="{{ $enroll->user->id }}" data-cert="{{ $enroll->cert->id  }}" class="btn btn-primary send btn-chat"  disabled>
                                            <i data-feather="send" class="d-lg-none"></i>
                                            <span class="d-none d-lg-block">{{__('translation.send')}}</span>
                                        </button>
                                </form>
                                <!--/ Submit Chat form -->
                            </div>
                            <!--/ Active Chat -->
                            @endforeach
                        </section>
                        <!--/ Main chat area -->
                        @foreach($enrolls as $enroll)
                            <!-- User Chat profile right area -->
                            <div class="user-profile-sidebar{{ $enroll->user->id }}">
                                <header class="user-profile-header">
                    <span class="close-icon">
                      <i data-feather="x"></i>
                    </span>
                                    <!-- User Profile image with name -->
                                    <div class="header-profile-sidebar">
                                        <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                            <img src="{{ url('image/users',$enroll->user->photo) }}" alt="user_avatar" height="70" width="70" />
                                            <span class="avatar-status-busy avatar-status-lg"></span>
                                        </div>
                                        <h4 class="chat-user-name">{{ $enroll->user->name }}</h4>
                                        <span class="user-post">Student at {{ $enroll->cert->title }}</span>
                                    </div>
                                    <!--/ User Profile image with name -->
                                </header>
                                <div class="user-profile-sidebar-area">
                                    <!-- About User -->
                                    <h6 class="section-label mb-1">About</h6>
                                    <p>Student at {{ $enroll->cert->title }}</p>
                                    <!-- About User -->
                                    <!-- User's personal information -->
                                    <div class="personal-info">
                                        <h6 class="section-label mb-1 mt-3">Personal Information</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-1">
                                                <i data-feather="mail" class="font-medium-2 me-50"></i>
                                                <span class="align-middle">{{ $enroll->user->email }}</span>
                                            </li>
                                            <li class="mb-1">
                                                <i data-feather="phone-call" class="font-medium-2 me-50"></i>
                                                <span class="align-middle">{{ $enroll->user->phone }}</span>
                                            </li>
                                            <li>
                                                <i data-feather="clock" class="font-medium-2 me-50"></i>
                                                <span class="align-middle">Mon - Fri 10AM - 8PM</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--/ User's personal information -->
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
