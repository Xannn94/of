@extends('layouts.inner')

@section('content')
        @if (!$items->isEmpty())
            @foreach($items as $entity)
                <p>{{$entity->title}}</p>
            @endforeach
        @else
            <p>@lang('collections::index.no_records')</p>
        @endif
@endsection