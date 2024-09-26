<aside class="sidebar shadow-lg">
    <a href="{{ route('home') }}" class="sidebar_logo text-left p-20 position-sticky inset-block-start-0 w-100 z-1 pb-10 mb-6">
        <img src="assets/img/logo_sidebar.svg" alt="Logo">
    </a>
    <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
        <div class="p-20 pt-10">
            <ul class="sidebar-menu">
                <li class="sidebar-menu__item {{ request()->is('/') ? 'activePage' : '' }}">
                    <a href="{{ route('home') }}" class="sidebar-menu__link">
                        <span class="icon">
                           <i class="fa-regular fa-list-check"></i>
                        </span>
                        <span class="text font-16">All</span>
                        <span class="link-badge">{{ $total }}</span>
                    </a>
                </li>
                <li class="sidebar-menu__item {{ request()->segment(1) === 'to_day' ? 'activePage' : '' }}">
                    <a href="{{ route('today') }}" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="fa-regular fa-sun"></i>
                        </span>
                        <span class="text">To day</span>
                        <span class="link-badge">{{ $todayTotal }}</span>
                    </a>
                </li>
                <li class="sidebar-menu__item {{ request()->segment(1) === 'completed' ? 'activePage' : '' }}">
                    <a href="{{ route('completed') }}" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </span>
                        <span class="text">Completed</span>
                        <span class="link-badge">{{ $todayTotalCompleted }}</span>
                    </a>
                </li>
                <li class="sidebar-menu__item {{ request()->segment(1) === 'categories' ? 'activePage' : '' }}">
                    <a href="{{ route('categories') }}" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="fa-solid fa-layer-group"></i>
                        </span>
                        <span class="text">Categories</span>
                    </a>
                </li>
                <li class="sidebar-menu__item {{ request()->segment(1) === 'flags' ? 'activePage' : '' }}">
                    <a href="{{ route('flags') }}" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="fa-regular fa-flag"></i>
                        </span>
                        <span class="text">Labels</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>