@include('admin::common.meta-head')
<div class="wrapper">
    <header class="main-header">
        <a href="/{{ config('cms.uri') }}/" class="logo">
            <span class="logo-mini">Lara</span>
            <span class="logo-lg"><b>Lara</b>CMS</span>
        </a>
        <nav class="navbar navbar-static-top">
            @if (Auth::guard('admin')->user())
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="{{route('admin.admins.edit', Auth::guard('admin')->user()->id)}}">
                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>
                        </li>

                        <li class="dropdown user logout">
                            <a href="{{ url('/'.config('cms.uri').'/logout') }}">
                                <span class="hidden-xs">@lang('admin::admin.exit')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </nav>
    </header>

    @include('admin::common.menu')

    <div class="content-wrapper">
        <section class="content-header">
            @yield('title')
            @include('admin::common.languages')

            @section('topmenu')
                @include('admin::common.topmenu.all')
            @show
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://weltkind.com">Lara CMS</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

@include('admin::common.meta-footer')