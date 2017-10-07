@extends('admin::admin.index')

@section('th')
    <th width="100">@sortablelink('date', trans('admin::fields.date'))</th>
    <th width="150">@sortablelink('title', trans('admin::fields.title'))</th>
    <th width="100" >@sortablelink('on_main', 'На главной')</th>
    <th>@sortablelink('preview', trans('admin::fields.preview'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->title }}</td>
            <td>{{ $entity->on_main?'Да':'Нет' }}</td>
            <td>{!!  $entity->preview !!}</td>
            <td class="controls">
                @include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection