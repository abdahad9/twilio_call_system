<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">
            @if(isGuideUser())
                {{ countGuideNotifications() }}
            @endif
            @if(isStaff() || isSuperAdmin())
                {{ countAdminNotifications() }}
            @endif
        </span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">
            You have
            @if(isGuideUser())
                {{ countGuideNotifications() }}
            @endif
            @if(isSuperAdmin() || isStaff())
                {{ countAdminNotifications() }}
            @endif
            notifications
        </li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @if(count(getUser()->unreadNotifications))
                    @if(isGuideUser())
                        @foreach (getUser()->unreadNotifications->where('type', 'App\Notifications\GuideNotification')->take(10) as $notification)
                            <li>
                                <a href="{{ route('reservations.show', $notification->data['id'] . '?notification_id=' . $notification->id) }}">
                                    <i class="fa fa-users text-aqua"></i> View newly added reservation
                                </a>
                            </li>
                        @endforeach
                    @else
                        @foreach (getUser()->unreadNotifications->where('type', 'App\Notifications\AdminNotification')->take(10) as $notification)
                            <li>
                                <a href="{{ route('reservations.show', $notification->data['id'] . '?notification_id=' . $notification->id) }}">
                                    <i class="fa fa-users text-aqua"></i> View newly added reservation
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endif

            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>