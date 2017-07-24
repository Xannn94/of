@if ($entities)
    @foreach ($entities as $entity)
        <div class="timeline-body" id="item-{!!$entity->id!!}">
            @if ($entity->imagePath('full'))
                <a href="{!!$entity->imagePath('full')!!}" rel="ajax">
                    <img class="margin thumb" src="{!!$entity->imagePath('mini')?:$entity->imagePath('thumb')!!}"></a>
            @else
                <img class="margin thumb" src="{!!$entity->imagePath('mini')?:$entity->imagePath('thumb')!!}">
            @endif
            <a class="btn btn-danger"
               data-href="{!! URL::route($routePrefix.'destroy', ['parent'=>$parent, 'id'=>$entity])  !!}">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </div>
    @endforeach
@else
    <p>Нет загруженных изображений</p>
@endif