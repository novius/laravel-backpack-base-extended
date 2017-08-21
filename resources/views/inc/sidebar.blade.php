@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>


          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>

          @if (count(config('backpack.crud.locales')) > 1)
            <li class="treeview">
              <a href="#"><i class="fa fa-cogs"></i> <span>{{ trans('backpackextended::base.switch_language') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu admin-language-switcher">
                @foreach(config('backpack.crud.locales') as $localeCode => $localLabel)
                  @if($localeCode !== App::getLocale())
                    <li>
                      <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ Request::url() }}?admin_locale={{ $localeCode }}">
                        {{ $localLabel }}
                      </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            </li>
          @endif

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
