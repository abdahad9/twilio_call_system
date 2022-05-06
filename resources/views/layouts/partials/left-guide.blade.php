<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{config('app.asset_url')}}/theme-assets/img/profile-160x160.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ @getUser()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu visible-xs" data-widget="tree">
            <li class="header">MAIN MENU</li>

                <li class="{{ request()->is('*reservations*') ? 'active' : '' }}">
                    <a href="{{ route('reservations.pending.reports') }}"><span>Pending Reports</span></a>
                </li>
                 <li class="{{ request()->is('*schedule*') ? 'active' : '' }}">
                     <a href="{{ route('guides.schedule') }}"><span>Calendar</span></a>
                </li>
                <li class="{{ request()->is('availability/calendar') ? 'active' : '' }}">
                    <a href="{{ route('availability.index') }}"><span>My Calendar</span></a>
                </li>
                <li class="{{ request()->is('*fishing-report*') ? 'active' : '' }}">
                    <a href="{{ url('fishing-report') }}">Fishing Report</a>
                </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>