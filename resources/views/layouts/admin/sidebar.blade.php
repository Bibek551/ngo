<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo d-flex justify-content-center">
        <a class="app-brand-link" href="{{ route('dashboard') }}">
            @if ($settings['site_main_logo'])
                <img src="{{ asset('admin/images/setting/' . $settings['site_main_logo']) }}" alt="logo" height="120px"
                    width="230px">
            @else
                <h1>NGO</h1>
            @endif
        </a>
        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-2">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->id == 1)
            <li class="menu-item {{ Request::segment(2) == 'users' ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.users.index') }}">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Manage Users</div>
                </a>
            </li>
        @endif

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->

        <li class="menu-item {{ Request::segment(2) == 'blogs' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.blogs.index') }}">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Basic">Blogs</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'testimonials' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.testimonials.index') }}">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div data-i18n="Basic">Testimonials</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'services' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.services.index') }}">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Basic">Services</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'actions' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.actions.index') }}">
                <i class='menu-icon bx bxs-help-circle  '></i>
                <div data-i18n="Basic">Get Involve</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'helps' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.helps.index') }}">
                <i class='menu-icon bx bx-help-circle'></i>
                <div data-i18n="Basic">Help-us</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ Request::segment(2) == 'partners' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.partners.index') }}">
                <i class="menu-icon tf-icons bx bx-layer-plus"></i>
                <div data-i18n="Basic">Partners</div>
            </a>
        </li> --}}

        <li class="menu-item {{ Request::segment(2) == 'ourteams' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.ourteams.index') }}">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Our Teams</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ Request::segment(2) == 'faqs' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.faqs.index') }}">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="Basic">FAQs</div>
            </a>
        </li> --}}

        <li class="menu-item {{ Request::segment(2) == 'donations' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.donations.index') }}">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Basic">Donations</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'volunteers' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.volunteers.index') }}">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Basic">Volunteers</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'inquirypersons' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.inquirypersons.index') }}">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Basic">Inquiry Persons</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ Request::segment(2) == 'branches' ? 'active' : '' }}">
            <a href="{{ route('admin.branches.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-location-plus"></i>
                <div data-i18n="Basic">Branches</div>
            </a>
        </li> --}}

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'pages' ||
                Request::segment(2) == 'socialmedias' ||
                Request::segment(2) == 'sliders' ||
                Request::segment(2) == 'settings') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'sliders' ? 'active' : '' }}"
                        href="{{ route('admin.sliders.index') }}">
                        <div data-i18n="Accordion">Sliders</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'pages' ? 'active' : '' }}"
                        href="{{ route('admin.pages.index') }}">
                        <div data-i18n="Accordion">Pages</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'socialmedias' ? 'active' : '' }}"
                        href="{{ route('admin.socialmedias.index') }}">
                        <div data-i18n="Accordion">Social Medias</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'settings' ? 'active' : '' }}"
                        href="{{ route('admin.settings.index') }}">
                        <div data-i18n="Accordion">Global Settings</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
