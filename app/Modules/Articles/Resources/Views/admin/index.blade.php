@extends('admin::admin.index')

@section('filters')
    {!! BootForm::open([ 'route' => $routePrefix.'store', 'method' => 'get']) !!}
        <div class="box box-primary box-filters">
            <div class="box-header"></div>
            <div class="box-body">
                <div class="col-md-3">
                    {!! BootForm::text('filters[title]', trans('admin::fields.title'),  Request::get('filters')['title']) !!}
                </div>

                <div class="col-md-1 filters-button">
                    {!! BootForm::submit(trans('admin::admin.select')) !!}
                </div>

            </div>
        </div>
    {!! BootForm::close() !!}
@endsection

@section('th')
    <th>@sortablelink('date', trans('admin::fields.date'))</th>
    <th>@sortablelink('title', trans('admin::fields.title'))</th>
    <th>@sortablelink('preview', trans('admin::fields.preview'))</th>
    <th>@sortablelink('priority', trans('admin::fields.priority'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->title }}</td>
            <td>{!!  $entity->preview !!}</td>
            <td class="priority">
                @include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])
            </td>
            <td class="controls">
                @include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection