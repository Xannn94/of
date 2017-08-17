@extends('admin::admin.form')

@section('form_content')

    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
   'files' => true]) !!}

    {{--Пример текстового поля--}}

    <div class="col-md-6">
        {!! BootForm::text('title', trans('admin::fields.title')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>
    <div class="clearfix"></div>

    <div class="col-md-6">
        {!! BootForm::hidden('on_main_top', 0) !!}
        {!! BootForm::checkbox('on_main_top', trans('collections::admin.on_main_top'), 1) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::hidden('on_main_bottom', 0) !!}
        {!! BootForm::checkbox('on_main_bottom', trans('collections::admin.on_main_bottom'), 1) !!}
    </div>

    <div class="col-md-6">
        @include('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'image'])
    </div>

    {{--@include('admin::common.forms.seo')--}}


@endsection