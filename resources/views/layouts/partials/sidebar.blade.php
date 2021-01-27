<div class="sidebar-main">
    <div id="sidebar-menu">
        <ul class="sidebar-links custom-scrollbar">
            <li class="back-btn">
                <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2"
                        aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-list"><a class="nav-link sidebar-title" href="#" target="_blank"><i
                        data-feather="home"></i><span>Dashboard</span></a></li>
            <li class="sidebar-list"><a class="nav-link sidebar-title" href="#"><i
                        data-feather="settings"></i><span>Management</span></a>
                <ul class="sidebar-submenu">
                    <li><a class="submenu-title" href="#">Series<span class="sub-arrow"><i
                                    class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                            <li><a href="{{ route('admin.series.index') }}"><i data-feather="eye"></i> View</a></li>
                            <li><a href="{{ route('admin.series.create') }}"><i data-feather="plus"></i> Add</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
