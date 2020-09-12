@inject('request', 'Illuminate\Http\Request')

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('vendor/admin-lte/dist/img/AdminLTELogo.png')}}" alt="..."
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{!! config('adminlte.logo', '<b>Cod1</b>green') !!}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if( !is_null(Auth::user()->avatar_id) && !empty(Auth::user()->avatar_id) &&
                !is_null(Auth::user()->getMedia('avatar')->first() ) )
                <img class="img-circle elevation-2" src="{{ Auth::user()->avatar->getUrl('card') }}">
                @else
                <img class="img-circle elevation-2" src="{{ asset('img/no-user.png') }}"
                    alt="{{ auth()->user()->name }}">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>@lang('admin.home_page')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>@lang('admin.dashboard')</p>
                    </a>
                </li>

                @canany(['manage users', 'manage roles', 'manage permissions', 'manage debug'])
                <!-- <li class="nav-item has-treeview menu-open"> -->
                <li class="nav-item has-treeview">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            @lang('admin.administration')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('manage users')
                        <li class="nav-item">
                            <!-- <a href="#" class="nav-link active"> -->
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>@lang('admin.users')</p>
                            </a>
                        </li>
                        @endcan

                        @can('manage roles')
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>@lang('admin.roles')</p>
                            </a>
                        </li>
                        @endcan

                        @can('manage permissions')
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>@lang('admin.permissions')</p>
                            </a>
                        </li>
                        @endcan

                        @can('manage debug')
                        <li class="nav-item">
                            <a href="{{ url('admin/debug') }}" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>@lang('admin.debug')</p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-broom"></i>
                                <p>
                                    Limpar cache
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.clear.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Todos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.clear.route') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rotas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.clear.config') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Configurações</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.clear.cache') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Caches</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.clear.view') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visão</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endcanany
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@prepend('js')
<script>
    $(function() {
        var url = window.location;

        // Se o ultimo caracter da url for / será removido
        if (url.href.slice(-1) == "/") {
            url.href = url.href.slice(0, -1) + "";
        }

        // Para o menu da barra lateral inteiramente mas não cobre o treeview
        // $('ul.sidebar-menu a').filter(function() {
        $('aside nav ul li a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // Para treeview
        $('ul.nav-treeview li a').filter(function() {
            return this.href == url;
        }).addClass('active');
    });
</script>
@endprepend
