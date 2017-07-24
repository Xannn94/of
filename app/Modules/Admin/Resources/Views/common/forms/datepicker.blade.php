@push('css')
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
@endpush

@push('js')
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.ru.js"></script>

    <script src="/adminlte/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/adminlte/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <script>
        $(function () {
            @foreach ($fields as $field)
                $('#{!! $field['id'] !!}').inputmask("yyyy-mm-dd").datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'ru',
                    @if (isset($field['date']))
                        date: '{!! $field['date'] !!}',
                    @endif
                });
            @endforeach
        });
    </script>

@endpush