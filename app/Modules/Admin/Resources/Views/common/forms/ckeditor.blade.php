@push('js')
    <script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/plugins/ckeditor/adapters/jquery.js"></script>
    <script>
        @foreach ($fields as $field)
            $('#{!! $field['id'] !!}').ckeditor({
                filebrowserImageBrowseUrl: '/{{ config('cms.uri') }}/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/{{ config('cms.uri') }}/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/{{ config('cms.uri') }}/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/{{ config('cms.uri') }}/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
                allowedContent: true,
                height: "350px"
            });
        @endforeach
    </script>
@endpush