@extends('layouts.inner')

@section('content')
    <div class="contacts" id="contacts">
        <div class="contacts__info">
            {!! $page->content !!}
        </div>
        @if (session()->has('message'))
            <div class="form__title form__title_success">{{ session('message') }}</div>
        @else
            @include('feedback::_form')
        @endif
        <div class="clear"></div>
    </div>
@endsection