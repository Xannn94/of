@extends('admin::admin.form')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
            <a
                class="btn btn-primary"
                href="{!! route($routePrefix.'create', ['parent'=>@$entity->parent?:Request::get('parent')]) !!}">
                <i class="glyphicon glyphicon-plus"></i> @lang('admin::admin.add')
            </a>
    </div>
@endsection

@section('form_content')

    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update']) !!}

    <div class="col-md-6">
        {!! BootForm::text('title', trans('tree::admin.title_page')) !!}
    </div>

    <div class="col-md-6">
        @if (Request::get('parent') || $entity->parent_id)
        {!! BootForm::text('slug', trans('tree::admin.slug')) !!}
        @endif
    </div>

    <div class="col-md-12">
        {!! BootForm::textarea('content', trans('admin::fields.content'), null) !!}
        <div class="clearfix"></div>
    </div>

    <div class="col-md-6">
        {!! BootForm::hidden('active', 0) !!}
        {!! BootForm::checkbox('active', trans('admin::fields.active'), 1) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::hidden('in_menu', 0) !!}
        {!! BootForm::checkbox('in_menu', trans('tree::admin.in_menu'), 1) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::select('module',  trans('tree::admin.module'), module_config('settings.modules')) !!}
    </div>

    <div class="col-md-6">
        {!! BootForm::select('template',  trans('tree::admin.template'), module_config('settings.templates')) !!}
    </div>

    <div class="col-md-6">
        @if (Request::get('parent') || $entity->parent_id)
        {!! BootForm::select('parent_id',  trans('tree::admin.parent'), Tree::getSelect(), Request::get('parent')) !!}
        @endif
    </div>

    @include('admin::common.forms.seo')

@endsection