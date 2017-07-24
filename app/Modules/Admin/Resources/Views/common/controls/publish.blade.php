@if(Auth::guard('admin')->user()->canPublish())
    {!!
        Form::open([
            'route' => [
                $routePrefix.'update',
                'id' => $id
                ],
             'method' => 'put'
         ])
     !!}
        {!! BootForm::hidden('active', abs($entity->active -1)) !!}
        <button
            type="submit"
            class="btn btn-default btn-sm"
            title="@if($entity->active) @lang('admin::admin.unpublish') @else @lang('admin::admin.publish') @endif">
            <i class="glyphicon @if($entity->active)glyphicon-ban-circle  @else glyphicon-ok-circle @endif"></i>
        </button>
    {!! Form::close() !!}
@endif