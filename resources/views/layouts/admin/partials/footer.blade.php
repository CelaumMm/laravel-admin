<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        @lang('admin.produced_by') <a href="{{ config('adminlte.produced_url') }}"><b>{{ config('adminlte.produced_by')
                }}</b></a>
        • @lang('admin.version') {{ config('adminlte.version') }}
    </div>
    <!-- Default to the left -->
    <strong>@lang('admin.all_rights_reserved') • {{ config('adminlte.since_year') }}-{{ Carbon\carbon::now()->year }}
        &copy;
        <a href="{{ route('home') }}"><b>{{ config('adminlte.footer_name') }}</b></a></strong>
</footer>