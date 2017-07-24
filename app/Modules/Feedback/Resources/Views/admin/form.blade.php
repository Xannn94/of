@extends('admin::layouts.app')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
    </div>
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
        <div class="col-md-6">
            <label>@lang('admin::fields.date')</label>
            <p>{{$entity->date}}</p>
        </div>

        <div class="col-md-6">
            <label>IP</label>
            <p>{{long2ip($entity->ip)}}</p>
        </div>

        <div class="col-md-6">
          <label>@lang('admin::fields.name')</label>
            <p>{{$entity->name}}</p>
        </div>

        <div class="col-md-6">
            <label>@lang('admin::fields.email')</label>
            <p>{{$entity->email}}</p>
        </div>

        <div class="col-md-12">
            <label>@lang('admin::fields.message')</label>
            <p>{!! nl2br($entity->message) !!}</p>
        </div>
    </div>
@endsection