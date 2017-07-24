@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('slug', trans('admin::fields.slug'))</th>
    <th>@sortablelink('title', trans('admin::fields.title'))</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
            <td>{{ $entity->slug }}</td>
            <td>{{ $entity->title }}</td>
            <td class="controls">
                @include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection