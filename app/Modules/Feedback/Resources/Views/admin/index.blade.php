@extends('admin::admin.index')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
    </div>
@endsection

@section('filters')
    {!! BootForm::open([ 'route' => 'admin.settings.store', 'method' => 'post']) !!}
        <div class="box box-primary box-filters">
            <div class="box-header"></div>
            <div class="box-body">

                <div class="col-md-4">
                    {!! BootForm::text('settings[feedback_email]', 'email',  Settings::get('feedback_email')) !!}
                    <p class="help-block">
                        Несколько email-ов вводить через запятую
                    </p>
                </div>

                <div class="col-md-1" style="margin-top: 4px;">
                    {!! BootForm::submit(trans('admin::admin.save')) !!}
                </div>

            </div>
        </div>
    {!! BootForm::close() !!}
@endsection

@section('th')
    <th>@sortablelink('date', trans('admin::fields.date'))</th>
    <th>@sortablelink('email', trans('admin::fields.email'))</th>
    <th>@sortablelink('name', trans('admin::fields.name'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->email }}</td>
            <td>{{ $entity->name }}</td>
            <td class="controls">
                @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection