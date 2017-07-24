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

                <div class="col-md-3">
                    {!! BootForm::text('settings[lat]', trans('feedback::index.lat'),  Settings::get('lat')) !!}
                </div>

                <div class="col-md-3">
                    {!! BootForm::text('settings[lng]', trans('feedback::index.lng'),  Settings::get('lng')) !!}
                </div>

                <div class="col-md-3" >
                    {!! BootForm::text('settings[zoom]', trans('feedback::index.zoom'),  Settings::get('zoom')) !!}
                </div>

                <div class="col-md-1 filters-button">
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