@extends('layouts.app')

@section('page_content')
    @include('sliders::main')
    <div class="info">
        <div class="info__item">
            <img src="{{ asset('img/map.png') }}" alt="map">
            <h3 class="info__title">Как нас найти</h3>
            <a href="#" class="mask"></a>
        </div>
        <div class="info__item">
            <img src="{{ asset('img/pv.jpg') }}" alt="pic">
            <h3 class="info__title">Наше производство</h3>
            <a href="#" class="mask"></a>
        </div>
        <div class="info__item">
            <img src="{{ asset('img/dostavka1.jpg') }}" alt="pic">
            <h3 class="info__title">Доставка</h3>
            <a href="#" class="mask"></a>
        </div>
    </div>
    <div class="new-model">
        @include('collections::main')
        @include('news::main')
    </div>
    @include('products::main')
@endsection
