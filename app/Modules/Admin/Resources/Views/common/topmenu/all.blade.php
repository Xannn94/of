@if (isset($routePrefix))
<div class="header-module-controls">
    @include('admin::common.topmenu.list', ['routePrefix' => $routePrefix])
    @include('admin::common.topmenu.create', ['routePrefix' => $routePrefix])
</div>
@endif