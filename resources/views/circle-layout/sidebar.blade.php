<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>
        <li class="active-page">
            <a href="{{url('My-Dashboard/index')}}"><i data-feather="home"></i>Dashboard</a>
        </li>
        <li class="sidebar-title">
            General
        </li>
        <li>
            <a href="{{url('My-Dashboard/social-profiles')}}"><i data-feather="share-2"></i>Social Profiles</a>
        </li>
        <li>
            <a href="{{url('My-Dashboard/customers')}}"><i data-feather="mail"></i>Customers</a>
        </li>
        @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{url('Users')}}"><i data-feather="users"></i>Users</a>
            </li>
        @endif
        <li>
            <a href="{{url('My-Dashboard/publish-post')}}"><i data-feather="edit"></i>Publish</a>
        </li>
        <li>
            <a href="{{url('My-Dashboard/posts')}}"><i data-feather="message-square"></i>Manage Posts</a>
        </li>
        <li>
            <a href="{{url('Notes')}}"><i data-feather="check-square"></i>Notes</a>
        </li>
        <li>
            <a href="{{url('Settings/calendar')}}"><i data-feather="calendar"></i>Calendar</a>
        </li>

    </ul>
</div>
