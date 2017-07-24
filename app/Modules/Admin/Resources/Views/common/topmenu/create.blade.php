@if(Auth::guard('admin')->user()->canCreate())
    <a class="btn btn-primary" href="{!! route($routePrefix.'create') !!}">
        <i class="glyphicon glyphicon-plus"></i> @lang('admin::admin.add')
    </a>
@endif