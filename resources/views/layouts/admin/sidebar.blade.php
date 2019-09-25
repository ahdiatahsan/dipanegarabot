<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
  <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
    data-ktmenu-dropdown-timeout="500">
    <ul class="kt-menu__nav ">

      {{-- Dashboard --}}
      <li class="kt-menu__item @if(request()->is('dashboard')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true"><a href="/dashboard" class="kt-menu__link ">
        <i class="kt-menu__link-icon flaticon2-dashboard"></i>
        <span class="kt-menu__link-text">Dashboard</span></a>
      </li>

        {{-- Informasi Umum --}}
      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Informasi Umum</h4>
      </li>

      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('information*') || request()->is('informationCategory*')) {{ 'kt-menu__item--open' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
          <i class="kt-menu__link-icon flaticon2-information"></i>
          <span class="kt-menu__link-text">Daftar Informasi</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>

        <div class="kt-menu__submenu">
          <span class="kt-menu__arrow"></span>
          <ul class="kt-menu__subnav">

            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('information') || request()->is('information/*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/information" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Informasi</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>

            @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('informationCategory*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/informationCategory" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Kategori Informasi</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>
            @endif
          </ul>
        </div>
      </li>

      @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('file*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="/file" class="kt-menu__link">
          <i class="kt-menu__link-icon flaticon2-file-1"></i>
          <span class="kt-menu__link-text">File</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>
      </li>
      @endif
      {{-- End::Informasi Umum --}}

      {{-- Begin::Perkuliahan --}}
      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Perkuliahan</h4>
      </li>

      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('lecture') || request()->is('lecture/*') || request()->is('course*') || request()->is('lectureHour*')) {{ 'kt-menu__item--open' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
          <i class="kt-menu__link-icon flaticon2-schedule"></i>
          <span class="kt-menu__link-text">Daftar Perkuliahan</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>

        <div class="kt-menu__submenu">
          <span class="kt-menu__arrow"></span>
          <ul class="kt-menu__subnav">

            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('lecture') || request()->is('lecture/*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/lecture" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Perkuliahan</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>
            @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('course*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/course" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Mata Kuliah</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('lectureHour*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/lectureHour" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Jam Kuliah</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>
            @endif
          </ul>
        </div>
      </li>

      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('lecturer*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="/lecturer" class="kt-menu__link">
          <i class="kt-menu__link-icon flaticon2-group"></i>
          <span class="kt-menu__link-text">Dosen</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>
      </li>

      @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('room*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="/room" class="kt-menu__link">
          <i class="kt-menu__link-icon flaticon2-shelter"></i>
          <span class="kt-menu__link-text">Ruangan</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>
      </li>
      @endif
      {{-- End::Perkuliahan --}}

      @if (Auth::check() && Auth::user()->role_id == 1)
      {{-- Begin::User --}}
      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Akun</h4>
        <i class="kt-menu__section-icon flaticon-more-v2"></i>
      </li>

      <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('user*') || request()->is('role*')) {{ 'kt-menu__item--open' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
          <i class="kt-menu__link-icon flaticon2-user-1"></i>
          <span class="kt-menu__link-text">Daftar User</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>

        <div class="kt-menu__submenu">
          <span class="kt-menu__arrow"></span>
          <ul class="kt-menu__subnav">

            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('user*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/user" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">User</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu @if(request()->is('role*')) {{ 'kt-menu__item--active' }} @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
              <a href="/role" class="kt-menu__link kt-menu__toggle">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                <span class="kt-menu__link-text">Role</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div><span class="kt-menu__arrow"></span></div>
            </li>
          </ul>
        </div>
      </li>
      {{-- End::User --}}
      @endif
    </ul>
  </div>
</div>
