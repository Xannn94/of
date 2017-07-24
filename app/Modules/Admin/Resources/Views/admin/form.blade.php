@extends('admin::layouts.app')

@section('form_js')
    @include('admin::common.forms.datepicker', [
        'fields' => [
            [
                'id'    => 'date',
                'date'  => date('Y-m-d')
             ]
         ]
     ])

    @include('admin::common.forms.ckeditor', [
        'fields' => [
            [
                'id' => 'content'
            ]
        ]
    ])
@endsection

@section('title')
    <h2>
        <a href="{!! URL::route($routePrefix.'index') !!}">
            {{$title}}
        </a>
    </h2>
@endsection

@section('content')
    <div class="panel-body">
        @include('admin::common.errors')

        @yield('form_content')

        <div class="col-md-12">
            {!! BootForm::submit(trans('admin::admin.save')) !!}
        </div>

        {!! BootForm::close() !!}
    </div>
@endsection