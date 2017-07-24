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

    <div class="col-md-2">
        {!! BootForm::number('priority', trans('admin::fields.priority')) !!}
    </div>
    <div class="clearfix"></div>

    <div class="col-md-6">
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>
@endsection