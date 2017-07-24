@extends('admin::admin.index')

@section('th')
    {{--Пример колонки с функцией сортировки ASC-DESC--}}
    <th>@sortablelink('title', trans('admin::fields.title'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('topmenu')
    @if (isset($routePrefix))
        <div class="header-module-controls">
            <a class="btn btn-success" href="{!! route($routePrefix.'refreshModules') !!}">
                <i class="glyphicon glyphicon-refresh"></i> @lang('roles::admin.refresh')
            </a>
            @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
            @include('admin::common.topmenu.create', ['routePrefix'=>$routePrefix])
        </div>
    @endif
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
             <td>{{ $entity->title }}</td>

            @if($entity->id !=1 )
                <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
            @endif
        </tr>
    @endforeach
@endsection