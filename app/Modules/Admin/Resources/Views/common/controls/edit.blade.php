@if(Auth::guard('admin')->user()->canUpdate())
<a
    class="btn btn-primary btn-sm"
    title="@lang('admin::admin.edit')"
    href="{!! route($routePrefix.'edit', ['id' => $id]) !!}">
    <i class="glyphicon glyphicon-pencil"></i>
</a>
@endif