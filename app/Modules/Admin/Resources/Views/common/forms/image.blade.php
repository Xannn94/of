@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.timeline-body a.btn-danger', function (event) {
                if (confirm('@lang('admin::admin.delete_image_sure')')) {
                    $.ajax({
                        url: $(this).attr('data-href'),
                        type: 'DELETE',  // user.destroy
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        success: function (result) {
                            location.reload();
                            return false;
                        }
                    });
                    return false;
                }
                else {
                    return false;
                }
            });
        });
    </script>
@endpush

<div class="images-list">

    {!! BootForm::label(trans('admin::admin.image')) !!}
    <div class="clearfix"></div>

    @if ($entity->$field)
        <div class="timeline-body">
            @if ($entity->imagePath('full'))
                <a href="{!!$entity->imagePath('full') !!}" rel="ajax">
                    <img src="{!! $entity->imagePath('mini')?:$entity->imagePath('thumb') !!}">
                </a>
            @else
                <img src="{!! $entity->imagePath('mini')?:$entity->imagePath('thumb') !!}">
            @endif

            <a class="btn btn-danger"
                    data-href="{!! URL::route($routePrefix.'delete-upload', ['id'=>$entity, 'field'=>$field])  !!}">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </div>
    @else
        {!! Form::file($field) !!}
    @endif
</div>