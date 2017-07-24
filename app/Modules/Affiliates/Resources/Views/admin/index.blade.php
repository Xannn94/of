@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('title', trans('admin::fields.title'))</th>
    <th>@sortablelink('priority', trans('admin::fields.priority'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
            <td>{{ $entity->title }}</td>
            <td class="priority">
                @include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])
            </td>
            <td class="controls">
                @include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection