@extends('admin::layouts.app')

@push('js')
    <script>
        $(document).ready(function () {
            $('table.table').on('click', 'button.btn-danger', function (event) {
                if (!confirm('@lang('admin::admin.delete_record_sure')')) {
                    return false;
                }
            });
        });
    </script>
@endpush

@section('title')
    <h2>{{$title}}</h2>
@endsection

@section('content')
    @yield('filters')

    @include('admin::common.errors')

    @if (count($entities) > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    @yield('th')
                </tr>
            </thead>
            <tbody>
                @yield('td')
            </tbody>
        </table>

        {!! $entities->appends(\Request::except('page'))->render() !!}
    @else
        <p>@lang('admin::admin.no_records')</p>
    @endif
@endsection
