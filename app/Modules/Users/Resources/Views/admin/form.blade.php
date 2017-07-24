@extends('admin::layouts.app')

@section('title')
    <h2>
        <a href="{!! URL::route($routePrefix.'index') !!}">
            {{$title}}
        </a>
    </h2>
@endsection


@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('admin::common.errors')

    {!!
        BootForm::open([
            'model'         => $entity,
            'store'         => $routePrefix.'store',
            'update'        => $routePrefix.'update',
            'autocomplete'  => 'off'
        ])
    !!}

        <!-- The text and password here are to prevent FF from auto filling my login credentials because it ignores autocomplete="off"-->
        <input type="text" style="display:none">
        <input type="password" style="display:none">

        <div class="col-md-6">
            {!! BootForm::text('name', trans('users::admin.name')) !!}
        </div>

        <div class="col-md-6">
            {!! BootForm::email('email', trans('users::admin.email')) !!}
        </div>

        <div class="col-md-6">
            {!! BootForm::password('password', trans('users::admin.password')) !!}
            @if ($entity->id)
                <span class="help-block">@lang('users::admin.password_tip')</span>
            @endif
        </div>

        <div class="col-md-12">
            {!! BootForm::submit(trans('admin::admin.save')) !!}
        </div>

    {!! BootForm::close() !!}
</div>
@endsection