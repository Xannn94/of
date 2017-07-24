@extends('layouts.inner')

@section('content')
    @if($errors->has('query'))
        @foreach($errors->get('query') as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
@endsection