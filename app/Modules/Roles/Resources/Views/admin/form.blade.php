@extends('admin::admin.form')

@section('form_content')

    {!!
        BootForm::open([
            'model'         => $entity,
            'store'         => $routePrefix.'store',
            'update'        => $routePrefix.'update',
            'autocomplete'  => 'off'
        ])
    !!}

    {{--Пример текстового поля--}}

    <div class="col-md-6">
        {!! BootForm::text('title', trans('admin::fields.title')) !!}
    </div>
    <div class="col-md-6">
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>@lang('roles::admin.fields.module')</th>
                <th>@lang('roles::admin.fields.read')</th>
                <th>@lang('roles::admin.fields.create')</th>
                <th>@lang('roles::admin.fields.publish')</th>
                <th>@lang('roles::admin.fields.update')</th>
                <th>@lang('roles::admin.fields.delete')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>
                        {{ $module->title }}
                        <input type="hidden" name="module" value="{{ $module->id }}">
                    </td>
                    <td>
                        @include('roles::admin.fields.active',[
                            'id'        => $module->id,
                            'operation' => 'read',
                            'allowed'   => @$entity->permissions()->where('module_id',$module->id)->first()->read?1:0,
                            'disable'   => module_config('settings.disable.'. $module->slug . '.read')!=null?1:null
                        ])
                    </td>
                    <td>
                        @include('roles::admin.fields.active',[
                            'id'        => $module->id,
                            'operation' => 'create',
                            'allowed'   => @$entity->permissions()->where('module_id',$module->id)->first()->create?1:0,
                            'disable'   => module_config('settings.disable.'. $module->slug . '.create')!=null?1:null
                        ])
                    </td>
                    <td>
                        @include('roles::admin.fields.active',[
                            'id'        => $module->id,
                            'operation' => 'publish',
                            'allowed'   => @$entity->permissions()->where('module_id',$module->id)->first()->publish?1:0,
                            'disable'   => module_config('settings.disable.'. $module->slug . '.publish')!=null?1:null
                        ])
                    </td>
                    <td>
                        @include('roles::admin.fields.active',[
                            'id'        => $module->id,
                            'operation' => 'update',
                            'allowed'   => @$entity->permissions()->where('module_id',$module->id)->first()->update?1:0,
                            'disable'   => module_config('settings.disable.'. $module->slug . '.update')!=null?1:null
                        ])
                    </td>
                    <td>
                        @include('roles::admin.fields.active',[
                            'id'        => $module->id,
                            'operation' => 'delete',
                            'allowed'   => @$entity->permissions()->where('module_id',$module->id)->first()->delete?1:0,
                            'disable'   => module_config('settings.disable.'. $module->slug . '.delete')!=null?1:null
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection