@extends('admin::admin.index')

@section('filters')
    {!! BootForm::open([ 'route' => 'admin.settings.store', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-header"></div>
        <div class="box-body">
            <div class="col-md-3">
                {!! BootForm::text('settings[slider_interval]', trans('sliders::admin.fields.interval'),  Settings::get('slider_interval')) !!}
                <p class="help-block">Число в миллисекундах. 1 секунда = 1000 миллисекунд</p>
            </div>
            <div class="col-md-2">
                {!! BootForm::submit(trans('sliders::admin.fields.save')) !!}
            </div>

        </div>
    </div>
    {!! BootForm::close() !!}
@endsection

@section('th')
    <th>@sortablelink('title', trans('sliders::admin.fields.title'))</th>
    <th>@sortablelink('image', trans('sliders::admin.fields.image'))</th>
    <th width="130">@sortablelink('priority', trans('sliders::admin.fields.priority'))</th>
    <th>{{ trans('sliders::admin.fields.control') }}</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->active) class="unpublished" @endif>
            <td>{{ $entity->title }}</td>
            <td>
                @if($entity->image_thumb)
                    <img src="{{ $entity->image_mini }}" alt="">
                @endif
            </td>
            <td width="130">
                @include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])
            </td>
            <td class="controls">
                @include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection