 <!--app header-->
                        <div class="app-header header">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="header-brand" href="index.html">
                                        <img src="backend/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Zendashlogo">
                                        <img src="/backend/assets/images/brand/logo2.png" class="header-brand-img dark-logo" alt="Zendashlogo">
                                        <img src="/backend/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Zendashlogo">
                                        <img src="/backend/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Zendashlogo">
                                    </a>
                                    <div class="app-sidebar__toggle" data-toggle="sidebar">
                                        <a class="open-toggle" href="#">
                                            <svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z"></path></svg>
                                        </a>
                                    </div>
                                    {{-- <div class="mt-1">
                                        <form class="form-inline">
                                            <div class="search-element">
                                                <input type="search" class="form-control header-search" placeholder="Search for everything…" aria-label="Search" tabindex="1">
                                                <button class="btn btn-primary-color" type="submit">
                                                    <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div><!-- SEARCH --> --}}
                                    <div class="col-2 ml-6">
                                        <a href="/cal">
                                        <button style="padding:8px" type="button" class="btn btn-lg btn-primary btn-block">Connect Your Calender</button>
                                        </a>
                                    </div>
                                    <div class="d-flex order-lg-2 ml-auto">
                                        <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                <path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                            </svg>
                                        </a>
                                        <div class="dropdown header-message">
                                            <a class="nav-link icon p-0" data-toggle="dropdown">
                                                <svg class="header-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                <span class="badge badge-success">8</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated p-0">
                                                <div class="message-menu">
                                                    <a class="dropdown-item d-flex pb-3 border-bottom" href="#">
                                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="/backend/assets/images/users/1.jpg"></span>
                                                        <div>
                                                            <strong>Madeleine</strong> Hey! there I' am available....
                                                            <div class="small text-muted">
                                                                3 hours ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-3 border-bottom" href="#">
                                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="/backend/assets/images/users/12.jpg"></span>
                                                        <div>
                                                            <strong>Anthony</strong> New product Launching...
                                                            <div class="small text-muted">
                                                                5 hour ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-3 border-bottom" href="#">
                                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="/backend/assets/images/users/4.jpg"></span>
                                                        <div>
                                                            <strong>Olivia</strong> New Schedule Realease......
                                                            <div class="small text-muted">
                                                                45 mintues ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-3 border-bottom" href="#">
                                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="/backend/assets/images/users/15.jpg"></span>
                                                        <div>
                                                            <strong>Sanderson</strong> New Schedule Realease......
                                                            <div class="small text-muted">
                                                                2 days ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a href="#" class="dropdown-item text-center">See all Messages</a>
                                            </div>
                                        </div>
                                        <div class="dropdown header-notify">
                                            <a class="nav-link icon p-0" data-toggle="dropdown">
                                                <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path></svg>
                                                <span class="pulse "></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated p-0">
                                                <div class="notifications-menu">
                                                    <a class="dropdown-item d-flex pb-4 border-bottom" href="#">
                                                        <span class="avatar avatar-md mr-3 align-self-center cover-image bg-gradient-danger brround">
                                                            <i class="fe fe-download"></i>
                                                        </span>
                                                        <div>
                                                            <span class="font-weight-bold"> New file has been Uploaded </span>
                                                            <div class="small text-muted d-flex">
                                                                5 hour ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-4 border-bottom" href="#">
                                                        <span class="avatar avatar-md  mr-3 align-self-center cover-image bg-gradient-teal brround">
                                                            <i class="fe fe-user"></i>
                                                        </span>
                                                        <div>
                                                            <span class="font-weight-bold"> User account has Updated</span>
                                                            <div class="small text-muted d-flex">
                                                                20 mins ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-4 border-bottom" href="#">
                                                        <span class="avatar avatar-md  mr-3 align-self-center cover-image bg-gradient-info brround">
                                                            <i class="fe fe-shopping-cart"></i>
                                                        </span>
                                                        <div>
                                                            <span class="font-weight-bold"> New Order Recevied</span>
                                                            <div class="small text-muted d-flex">
                                                                1 hour ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex pb-4 border-bottom" href="#">
                                                        <span class="avatar avatar-md mr-3 align-self-center cover-image bg-gradient-pink brround">
                                                            <i class="fe fe-server"></i>
                                                        </span>
                                                        <div>
                                                            <span class="font-weight-bold">Server Rebooted</span>
                                                            <div class="small text-muted d-flex">
                                                                2 hour ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a href="#" class="dropdown-item text-center">View all Notification</a>
                                            </div>
                                        </div>
                                        <div class="dropdown   header-fullscreen" >
                                            <a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
                                                <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path d="M7,14 L5,14 L5,19 L10,19 L10,17 L7,17 L7,14 Z M5,10 L7,10 L7,7 L10,7 L10,5 L5,5 L5,10 Z M17,17 L14,17 L14,19 L19,19 L19,14 L17,14 L17,17 Z M14,5 L14,7 L17,7 L17,10 L19,10 L19,5 L14,5 Z"></path></svg>
                                            </a>
                                        </div>
                                        <div class="dropdown profile-dropdown">
                                            <a href="#" class="nav-link pr-0 pl-2 leading-none" data-toggle="dropdown">
                                                <span>
                                                    <img src="{{ asset('img/account.png') }}" alt="img" class="avatar avatar-md brround" style="background: transparent;">
                                                    {{-- <img src="{{ asset('storage/' . config('site.profile')) }}" alt="img" class="avatar avatar-md brround"> --}}
                                                    
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated p-0">
                                                <div class="text-center border-bottom pb-4 pt-4">
                                                    <a href="#" class="text-center user pb-0 font-weight-bold">{{ config('site.user_name') }}</a>
                                                    <p class="text-center user-semi-title mb-0">{{ config('site.user_position') }}</p>
                                                </div>
                                                <a class="dropdown-item border-bottom" href="{{ route('profile.myprofile') }}">
                                                    <i class="dropdown-icon mdi mdi-account-outline"></i> My Profile
                                                </a>
                                                <a class="dropdown-item border-bottom" href="{{ route('profile.editprofile') }}">
                                                    <i class="dropdown-icon zmdi zmdi-edit"></i> Edit Profile
                                                </a>
                                                <a class="dropdown-item border-bottom" href="#">
                                                    <i class="dropdown-icon  mdi mdi-settings"></i> Account Settings
                                                </a>
                                                {{-- <a class="dropdown-item border-bottom" href="#">
                                                    <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                                                </a>
                                                <a class="dropdown-item border-bottom" href="#">
                                                    <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                                                </a> --}}
                                                <a class="dropdown-item border-bottom" href="{{ route('help.index') }}">
                                                    <i class="dropdown-icon mdi mdi-compass-outline"></i> 
                                                    @if(Auth::user()->role == 'user')
                                                        Need help?
                                                    @else
                                                        Supports
                                                    @endif
                                                </a>
                                                 <a class="dropdown-item border-bottom" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                     <i class="dropdown-icon mdi  mdi-logout-variant"></i>{{ __('Logout') }}
                                                 </a>
             
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     @csrf
                                                 </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/app header-->