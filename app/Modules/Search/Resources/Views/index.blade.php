@extends('layouts.inner')

@section('content')

    <h1>@lang('search::index.title')</h1>

    @if (count($errors) > 0)
        @foreach ($errors as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    @if($total)
        <p>
           @lang('search::index.total_results', ['query' => $query,'total' => $total])
        </p>
        @include('search::results', ['result' => $result])
    @else
        @lang('search::index.nothing_found')
    @endif

@endsection