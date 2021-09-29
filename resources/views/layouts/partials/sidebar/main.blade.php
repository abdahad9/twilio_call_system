<!--aside open-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="/home">
            
            <img src="{{ asset('storage/' . config('site.logo')) }}" class="header-brand-img desktop-lgo" alt="Covido logo">
            {{-- <img src="/backend/assets/images/brand/1Dashlogo.png" class="header-brand-img desktop-lgo" alt="Covido logo"> --}}
            <img src="/backend/assets/images/brand/logo2.png" class="header-brand-img dark-logo" alt="Covido logo">
            <img src="/backend/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Covido logo">
            <img src="/backend/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Covido logo">
        </a>
    </div>
    <div class="app-sidebar3">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <img src="{{ asset('storage/' . config('site.profile')) }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                </div>
                <div class="user-info">
                    <h5 class=" mb-0 font-weight-normal"> {{ config('site.user_name') }}</h5>
                    <span class="text-muted app-sidebar__user-name text-sm">{{ config('site.user_position') }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <!--<li><h3>Main</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item"   href="index.html">-->
            <!--        <span class="shape1"></span>-->
            <!--        <span class="shape2"></span>-->
            <!--        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>-->
            <!--        <span class="side-menu__label">Dashboard</span>-->
            <!--    </a>-->
            <!--</li>-->
            <!--<li><h3>Project Managment</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>-->
            <!--    <span class="side-menu__label">Projects</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="widgets-1.html" class="slide-item">Messages</a></li>-->
            <!--        <li><a href="widgets-2.html" class="slide-item">Tasks</a></li>-->
            <!--        <li><a href="widgets-2.html" class="slide-item">Files</a></li>-->
            <!--        <li><a href="widgets-2.html" class="slide-item">Links</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><h3>SEO</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>-->
            <!--    <span class="side-menu__label">SEO</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="maps.html" class="slide-item">Keywords Rankings</a></li>-->
            <!--        <li><a href="maps2.html" class="slide-item">BackLinks</a></li>-->
            <!--        <li><a href="maps3.html" class="slide-item">Social Signals</a></li>-->
            <!--        <li><a href="maps3.html" class="slide-item">BrightLocal</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><h3>PPC</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>-->
            <!--    <span class="side-menu__label">PPC</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="chart-chartist.html" class="slide-item">Adwords Charts</a></li>-->
            <!--        <li><a href="chart-morris.html" class="slide-item">Facebook</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><h3>Social Media</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>-->
            <!--    <span class="side-menu__label">Social Media</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="tables.html" class="slide-item">Facebook</a></li>-->
            <!--        <li><a href="datatable.html" class="slide-item">Twitter</a></li>-->
            <!--        <li><a href="datatable.html" class="slide-item">Google+</a></li>-->
            <!--        <li><a href="datatable.html" class="slide-item">LinkedIn</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><h3>Google</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>-->
            <!--    <span class="side-menu__label">Google</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="tables.html" class="slide-item">Analytics</a></li>-->
            <!--        <li><a href="datatable.html" class="slide-item">Webmaster Tools</a></li>-->
            <!--        <li><a href="datatable.html" class="slide-item">Trends</a></li>-->
            <!--    </ul>-->
            <!--</li>-->

     <li><h3>Call Logs</h3></li>
            <li class="slide {{ Request::is('calls') ? 'is-expanded' : '' }}">
                <a class="side-menu__item {{ Request::is('calls') ? 'active' : '' }}" data-toggle="slide" href="#">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                <span class="side-menu__label">Call Logs</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ route('calls.choosenumber') }}" class="slide-item {{ request()->is('calls/choose/number') ? 'active' : '' }}">Call Reports</a></li>
                </ul>
            </li>

            <!-- <li><h3>Data</h3></li>-->
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--    <span class="shape1"></span>-->
            <!--    <span class="shape2"></span>-->
            <!--    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>-->
            <!--    <span class="side-menu__label">Client Data</span><i class="angle fa fa-angle-right"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a href="tables.html" class="slide-item">Contacts</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
             <li><h3>Settings</h3></li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                <span class="shape1"></span>
                <span class="shape2"></span>
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                <span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ route('setting.index') }}" class="slide-item">Branding settings</a></li>
                    <li><a href="{{ route('setting.twilio') }}" class="slide-item">Twilio</a></li>
                    <li><a href="{{ route('setting.email') }}" class="slide-item">Mail settings</a></li>
                    <li><a href="{{ route('setting.twilioNumbers') }}" class="slide-item">Twilio Numbers</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!--aside closed-->