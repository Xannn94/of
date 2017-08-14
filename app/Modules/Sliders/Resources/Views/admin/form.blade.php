@extends('admin::admin.form')

@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}

    <div class="col-md-5">
        {!! BootForm::text('title', trans('sliders::admin.fields.title')) !!}
        {!! BootForm::select('title_color', trans('sliders::admin.fields.titleColor'),$colors) !!}
        {!! BootForm::textarea('preview', trans('sliders::admin.fields.preview')) !!}

    </div>
    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::text('link', trans('sliders::admin.fields.link'), null , [ 'placeholder' => 'https://www.google.com'] ) !!}
        {!! BootForm::select('link_type', trans('sliders::admin.fields.linkType'),$linkTypes) !!}
        {!! BootForm::select('background_button', trans('sliders::admin.fields.buttonBackground'),$colors) !!}
        {!! BootForm::select('color_button', trans('sliders::admin.fields.buttonColor'),$colors) !!}
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', 'Опубликовать', 1) !!}
    </div>
    <div class="clearfix"></div>

    <div class="col-md-5">
        @include('admin::common.forms.image', [
            'entity'        =>$entity,
            'routePrefix'   =>$routePrefix,
            'field'         =>'image',
            'helpBlock'     => 'Рекомендуемые размеры 370х450'
            ])

    </div>


@endsection