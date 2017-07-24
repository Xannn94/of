@extends('admin::admin.form')

@section('form_content')

    {!!
        BootForm::open([
            'model'         => $entity,
            'store'         => $routePrefix.'store',
            'update'        => $routePrefix.'update',
            'autocomplete'  => 'off',
            'files'         => true
        ])
    !!}

    <div class="col-md-6">
        {!! BootForm::text('title', trans('admin::fields.title')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::text('date', trans('admin::fields.date'), $entity->date?null:date('Y-m-d')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>

    <div class="col-md-6 ">
        {!! BootForm::text('priority', trans('admin::fields.priority')) !!}
    </div>

    <div class="col-md-12">
        {!! BootForm::textarea('preview', trans('admin::fields.preview'), null, ['rows'=>'5']) !!}
    </div>

    <div class="col-md-12">
        {!! BootForm::textarea('content', trans('admin::fields.content'), null) !!}
        <div class="clearfix"></div>
    </div>

    <div class="col-md-12">
        @include('admin::images.form', ['id'=>$entity->id, 'routePrefix'=>$routePrefix.'images.'])
    </div>

@endsection