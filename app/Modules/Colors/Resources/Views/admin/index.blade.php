@extends('admin::admin.index')

@section('th')
    {{--Пример колонки с функцией сортировки ASC-DESC--}}
    <th>@sortablelink('title', trans('admin::fields.title'))</th>
    <th>@lang('admin::admin.control')</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        {{--Если у вас по логике есть поле опубликовать(active), то используйте следующий код--}}
        {{--<tr @if (!$entity->active) class="unpublished" @endif>--}}
        {{--Если поля опубликовать(active) нету, то используйте следующий код--}}
        {{--<tr>--}}
        <tr>
            {{--Пример как заполнять таблицу--}}
             <td>{{ $entity->title }}</td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection