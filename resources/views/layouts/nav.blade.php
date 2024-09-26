<div class="top-navbar flex-between gap-16">
    <div class="flex-align gap-16">
        <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray">
            <i class="fa fa-list"></i>
        </button>
        <form action="#" class="w-750 d-sm-block d-none">
            <div class="position-relative">
                <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <input type="text" class="form-control ps-40 h-60 border-transparent focus-border-main-600 bg-main-50 rounded-3 placeholder-15" placeholder="Search...">
            </div>
        </form>
    </div>

    <div class="flex-align gap-16">
        <div class="dropdown">
            <button class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                    <span class="position-relative">
                        <span class="d-flex justify-content-center align-items-center h-32 w-32 rounded-circle avatar_letter font-15">{{ substr($user['name'], 0, 1) }}</span>
                    </span>
            </button>
            <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0" data-popper-placement="bottom-end">
                <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                    <div class="card-body">
                        <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                <span class="w-54 h-54 rounded-circle avatar_letter">
                                    A
                                </span>
                            <div class="">
                                <h4 class="mb-0">{{ $user['name'] }}</h4>
                                <p class="fw-medium text-13 text-gray-200">{{ $user['email'] }}</p>
                            </div>
                        </div>
                        <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                            <li class="mb-4">
                                <a href="setting.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text">Account Settings</span>
                                </a>
                            </li>
                            <li class="pt-8">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>