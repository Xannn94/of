{{-- documentation - https://eonasdan.github.io/bootstrap-datetimepicker/ --}}
@push('css')
    <link rel="stylesheet" href="/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.css">
@endpush

@push('js')
    <script src="/adminlte/plugins/datetimepicker/moment.js"></script>
    <script src="/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function () {
            $('#{{ $field }}').datetimepicker({
                format: 'YYYY-MM-DD H:mm'
            });
        });
    </script>
@endpush

<div class="form-group">
    <label for="{{ $field }}" class="control-label">{{ $label }}</label>
    @if(isset($helpBlock))
        <p class="help-block">{!!  $helpBlock  !!}</p>
    @endif
    <div class='input-group date'>
        <input type='text' id='{{ $field }}' name='{{ $field }}' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

