<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('/')}}/theme-assets/img/profile-160x160.png" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ @getUser()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                @if(config('site.website_management')==1)
                    <a href="#"><i class="fa fa-files-o"></i> <span>Main site Setup</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                @endif

                <ul class="treeview-menu">
                    @if(config('site.menege_cms')==1)
                        <li><a href="{{ route('managecms.index') }}"><i class="fa fa-files-o"></i><span>Manage CMS</span></a></li>
                    @endif
                    @if(config('site.about')==1)
                        <li><a href="{{ route('guide.index') }}"><i class="fa fa-files-o"></i> <span>
                                    @if(env('FRONTEND_VIEW_FOLDER') == 'taos-frontend')
                                        Guides
                                    @else
                                        About
                                    @endif
                                </span>
                            </a>
                        </li>
                    @endif
                    @if(config('site.fishing_report')==1)
                        <li><a href="{{ route('fishing_reports.index') }}"><i class="fa fa-files-o"></i><span>Fishing Reports</span></a></li>
                    @endif
                    @if(config('site.video')==1)
                        <li><a href="{{ route('video.index') }}"><i class="fa fa-files-o"></i> <span>Video Text</span></a></li>
                    @endif
                    @if(config('site.faq')==1)
                        <li><a href="{{ route('faq.index') }}"><i class="fa fa-files-o"></i> <span>FAQ</span></a></li>
                    @endif
                    @if(config('site.vacation_packages')==1)
                        <li><a href="{{ route('vacation.index')}}"><i class="fa fa-files-o"></i><span>Vacation Packages</span></a></li>
                    @endif
                    @if(config('site.properties')==1)
                        <li><a href="{{ route('properties.index')}}"><i class="fa fa-files-o"></i><span>Properties</span></a></li>
                    @endif
                    @if(config('site.gallery')==1)
                        <li><a href="{{ route('gallery.index')}}"><i class="fa fa-files-o"></i> <span>Gallery</span></a></li>
                    @endif
                    @if(config('site.travel')==1)
                        <li><a href="{{ route('travel.index')}}"><i class="fa fa-files-o"></i> <span>Travel</span></a></li>
                    @endif
                    @if(config('site.local_water')==1)
                        <li><a href="{{ route('local_water.index')}}"><i class="fa fa-files-o"></i><span>Rivers</span></a></li>
                    @endif
                    @if(config('site.news')==1)
                        <li><a href="{{ route('news.index')}}"><i class="fa fa-files-o"></i> <span>News</span></a></li>
                    @endif
                    @if(config('site.social_media')==1)
                        <li><a href="{{ route('social_meadia.index') }}"><i class="fa fa-files-o"></i> <span>Social Media</span></a></li>
                    @endif
                    @if(config('site.list_of_newslater')==1)
                        <li><a href="{{ route('newslater.index') }}"><i class="fa fa-files-o"></i> <span>List of Newsletter</span></a></li>
                    @endif
                    @if(config('site.header_image')==1)
                        <li><a href="{{ route('header_images.index') }}"><i class="fa fa-files-o"></i> <span>Header Images</span></a></li>
                    @endif
                </ul>
            </li>

            @if(!isStaff())
                <li class="treeview {{ request()->is('*guides*', '*manage-trips*', '/rivers*','/agencies*', '*reservations*', '*entries*', '*sections*', '*locations*', '*coupons*', '*refferals*', '*email_templates*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Setup</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('*guides*') ? 'active' : '' }}">
                            <a href="{{ route('guides.index') }}">Guides</a>
                        </li>
                        <li class="{{ request()->is('*manage-trips*') ? 'active' : '' }}">
                            <a href="{{ route('manage-trips.index') }}">Trips</a>
                        </li>
                        <li class="{{ request()->is('/rivers*') ? 'active' : '' }}">
                            <a href="{{ route('rivers.index') }}">Rivers</a>
                        </li>

                        @if(config('site.sections_managing_rivers'))
                            <li class="{{ request()->is('*sections*') ? 'active' : '' }}">
                                <a href="{{ route('sections.index') }}">Sections</a>
                            </li>
                        @else
                            <li class="{{ request()->is('*entries*') ? 'active' : '' }}">
                                <a href="{{ route('entries.index') }}">Entry / Exit</a>
                            </li>
                            
                        @endif
                        @if(config('site.agencies'))
                            <li class="{{ request()->is('*agencies*') ? 'active' : '' }}">
                                <a href="{{ route('agencies.index') }}">Agencies</a>
                            </li>
                            @endif
                        <li class="{{ request()->is('*locations*') ? 'active' : '' }}">
                            <a href="{{ route('locations.index') }}">Locations</a>
                        </li>
                        @if(config('site.discount_coupons_for_trips'))
                            <li class="{{ request()->is('*coupons*') ? 'active' : '' }}">
                                <a href="{{ route('coupons.index') }}">Coupons</a>
                            </li>
                        @endif
                        <li class="{{ request()->is('*refferals*') ? 'active' : '' }}">
                            <a href="{{ route('refferals.index') }}">Referral</a>
                        </li>
                        <li class="{{ request()->is('*email_templates*') ? 'active' : '' }}">
                            <a href="{{ route('email_templates.index') }}">Email / Text Templates</a>
                        </li>
                    </ul>
                </li>
            @endif

            <!--
            @if(config('site.survey'))
                <li class="treeview {{ request()->is('*survey*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Survey</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('survey*') ? 'active' : '' }}">
                            <a href="{{ route('survey.index') }}">Survey</a>
                        </li>
                        <li class="{{ request()->is('reports/survey') ? 'active' : '' }}">
                            <a href="{{ route('reports.survey') }}">Survey Reports</a>
                        </li>
                        <li class="{{ request()->is('settings/survey') ? 'active' : '' }}">
                            <a href="{{ route('settings.survey') }}">Survey Settings</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(config('site.enable_classes')==1)
                <li class="treeview {{ request()->is('*static-pages*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Classes Setup</span>
                        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('*admin/classes/index') ? 'active' : '' }}">
                            <a href="{{ route('admin.classes.index') }}">Classes</a>
                        </li>
                        <li class="{{ request()->is('*static-pages/create') ? 'active' : '' }}">
                            <a href="{{ route('admin.classes.attendees') }}">Attendees</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="treeview {{ request()->is('*static-pages*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-files-o"></i> <span>CMS Page</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    {{--hide from menu--}}
                    @if(false)
                        <li class="{{ request()->is('*static-pages/create') ? 'active' : '' }}">
                            <a href="{{ route('static-pages.create') }}">Add New</a>
                        </li>
                    @endif

                    @foreach(isset($static_pages) ? $static_pages : [] as $page)

                        @if (!config('site.waivers') && $page->title=="Waiver") 
                            <?php continue; ?>
                            
                        @endif
                        <li class="{{ request()->is('*static-pages/' . $page->slug) ? 'active' : '' }}">
                            <a href="{{ route('static-pages.edit', $page->id) }}">{{ $page->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            @if(config('site.pre_trip_questions'))
                <li class="treeview {{ request()->is('pre-trips-questions*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Pre-Trip Questionnaire</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('pre-trips-questions*') && !request()->is('pre-trips-questions/create') ? 'active' : '' }}">
                            <a href="{{ route('pre-trip-questionnaire.index') }}">Pre-Trip Questionnaire</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(config('site.lunch'))
                <li class="treeview {{ request()->is('*cafes*', '*foods*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Lunch</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('*cafes*') ? 'active' : '' }}">
                            <a href="{{ route('cafes.index') }}">Cafe</a>
                        </li>
                        <li class="{{ request()->is('*foods*') ? 'active' : '' }}">
                            <a href="{{ route('foods.index') }}">Foods Selection</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(config('site.private_waters'))
                <li class="treeview {{ request()->is('*private-waters/rivers*', '*private-waters/beats*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-files-o"></i> <span>Private Waters</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('*private-waters/rivers*') ? 'active' : '' }}">
                            <a href="{{ route('private-waters.rivers.index') }}">Rivers</a>
                        </li>
                        <li class="{{ request()->is('*private-waters/beats*') ? 'active' : '' }}">
                            <a href="{{ route('private-waters.beats.index') }}">Beats</a>
                        </li>
                    </ul>
                </li>
            @endif
            -->

            @if(isSuperAdmin())
                <li class="treeview {{ request()->is('settings*') || request()->is('admin/users*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-gears"></i> <span>Settings</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}">Admins</a>
                        </li>

                        <li class="{{ request()->is('settings/general') ? 'active' : '' }}">
                            <a href="{{ route('settings.general') }}">General Settings</a>
                        </li>

                        <li class="{{ request()->is('settings/site_settings') ? 'active' : '' }}">
                            <a href="{{ route('settings.site') }}">Site Settings</a>
                        </li>
                        <li class="{{ request()->is('settings/twilio') ? 'active' : '' }}">
                            <a href="{{ route('settings.twilio') }}">Twilio Settings</a>
                        </li>
                        @if ( config('site.disable_emails')==0)
                            <li class="{{ request()->is('settings/mail') ? 'active' : '' }}">
                                <a href="{{route('settings.mail')}}">Mail Settings</a>
                            </li>
                        @endif
                        <li class="{{ request()->is('settings/gateway') ? 'active' : '' }}">
                            <a href="{{route('settings.gateway')}}">Gateway Settings</a>
                        </li>
                        <li class="{{ request()->is('settings/backup') ? 'active' : '' }}">
                            <a href="{{route('settings.backup')}}">Database Backup</a>
                        </li>

                        {{--  <li>
                             <a href="settings/3/edit">Backup Settings</a>
                         </li> --}}

                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>