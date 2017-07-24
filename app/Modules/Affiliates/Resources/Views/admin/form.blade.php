@extends('admin::admin.form')

@section('form_content')
    {!!
        BootForm::open([
            'model' => $entity,
            'store' => $routePrefix.'store',
            'update' => $routePrefix.'update',
            'autocomplete' => 'off',
           'files' => true
       ])
   !!}

    <div class="col-md-6">
        {!! BootForm::text('title', trans('admin::fields.title')) !!}
        {!! BootForm::select('region_id', trans('affiliates::index.admin.fields.region'), $regions) !!}
    </div>
    <div class="col-md-6">
        {!! BootForm::number('priority', trans('admin::fields.priority')) !!}
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>
    <div class="clearfix"></div>

    <div class="col-md-6">
        {!! BootForm::textarea('phone', trans('affiliates::index.admin.fields.phone')) !!}

    </div>

    <div class="col-md-6">
        {!! BootForm::textarea('address', trans('affiliates::index.admin.fields.address')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::text('work_time', trans('affiliates::index.admin.fields.workTime')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::text('work_break', trans('affiliates::index.admin.fields.workBreak')) !!}
    </div>

    {!! BootForm::hidden('lat', module_config('settings.lat'), [ 'id' => 'lat']) !!}
    {!! BootForm::hidden('lng', module_config('settings.lng'), [ 'id' => 'lng']) !!}
    {!! BootForm::hidden('zoom', module_config('settings.zoom'), [ 'id' => 'zoom']) !!}

    <div class="col-md-12">
        @include('admin::common.forms.map',[
            'entity' => $entity,
            'lat' => module_config('settings.lat'),
            'lng' => module_config('settings.lng'),
            'zoom' => module_config('settings.zoom'),
            ])
    </div>
@endsection