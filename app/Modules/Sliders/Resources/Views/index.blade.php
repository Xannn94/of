@extends('layouts.inner')

@section('content')
        @if (count($items))
            @foreach($items as $entity)
                <p>{{$entity->title}}</p>
            @endforeach

            {{--Пагинатор--}}
            {{  $items->appends(\Request::except('page'))->links('common.paginate') }}

        @else
            <p>@lang('sliders::index.no_records')</p>
        @endif
@endsection