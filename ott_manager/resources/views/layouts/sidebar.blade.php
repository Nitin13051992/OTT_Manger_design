<div class="dashboard_sidebar">
    <div class="mb-4 d-flex align-items-center" style="padding:0px 20px;"><a href="{{ route('page_customization.index') }}"><img
                src="assets/images/logo.png" alt="logo"></a>
        <i class="ti ti-close ml-auto font-22 close_nav res-show" style="display:none;"></i>
    </div>
    <hr>
    <br>
    <ul class="dashboard_sidebar_ul ovrflw-wppr">       
        <li>
            <a class="cursor tab " href="{{ route('page_customization.index') }}">
                <span class="icon d-flex align-items-center justify-content-center">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </span>
                Page Customization
            </a>
        </li>
        <li>
            <a class="cursor tab" href="{{ route('myProfile') }}">
                <span class="icon d-flex align-items-center justify-content-center">
                    <img src="assets/images/Profile.png" style="height:18px">
                </span>
                Profile
            </a>
        </li>
        <!-- @can('view-dashboarduser')
        <li>
            <a class="cursor tab" href="{{ route('dashboarduser.index') }}">
                <span class="icon d-flex align-items-center justify-content-center">
                    <img src="assets/images/user_management.png" style="height:18px">
                </span>
                Team Mgmt
            </a>
        </li>
        @endcan
        <li> -->
        <li>
            <a class="cursor tab" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
                <span class="icon d-flex align-items-center justify-content-center">
                    <img src="assets/images/logout.png" style="height:18px">
                </span>
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
