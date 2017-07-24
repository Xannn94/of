@extends('admin::layouts.app')

@section('title')
    <h2>
        <a href="{!! URL::route($routePrefix.'index') !!}">
            {{$title}}
        </a>
    </h2>
@endsection

@section('form_js')
    @if ($entity->type == 'wysiwyg')
        @include('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content']]])
    @endif
@endsection



@section('content')
    <div class="panel-body">
        @include('admin::common.errors')

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
                {!! BootForm::text('slug', trans('admin::fields.slug')) !!}
            </div>

            <div class="col-md-6">
                {!! BootForm::hidden('active', 0) !!}
                {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
            </div>

            <div class="col-md-6">
                {!! BootForm::select('type', 'Тип', ['html'=>trans('widgets::admin.html'), 'wysiwyg'=>trans('widgets::admin.wysiwyg')]) !!}
            </div>

            <div class="col-md-12">
                {!! BootForm::textarea('content', trans('admin::fields.content'), null) !!}
            </div>

            <div class="col-md-12">
                {!! BootForm::submit(trans('admin::admin.save')) !!}
            </div>
        {!! BootForm::close() !!}
    </div>
@endsection
