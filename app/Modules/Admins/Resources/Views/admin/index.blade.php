@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('created_at', trans('admin::fields.created_at'))</th>
    <th>@sortablelink('name', trans('admins::admin.name'))</th>
    <th>@sortablelink('email', 'Email')</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr>
            <td>{{ $entity->created_at }}</td>
            <td>{{ $entity->name }}</td>
            <td>{{ $entity->email }}</td>
            <td>
                @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])

                @if (Auth::guard('admin')->user()->id != $entity->id)
                    @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                @endif
            </td>
        </tr>
    @endforeach
@endsection