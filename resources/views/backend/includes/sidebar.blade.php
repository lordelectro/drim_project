<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.odds') }}"><i class="fa fa-soccer-ball-o"></i>Odds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.odds') }}"><i class="fa fa-copy"></i>Bets Placed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.download_odds') }}"><i class="fa fa-cloud-download"></i>Update Odds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.download_events') }}"><i class="fa fa-calendar"></i>Get Games</a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.country') }}"><i class="fa fa-flag"></i>Update Country</a>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->