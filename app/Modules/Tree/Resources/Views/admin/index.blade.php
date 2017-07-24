@extends('admin::admin.index')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
        @if (isset($entities))
            <a class="btn btn-primary" href="{!! route($routePrefix.'create', ['parent'=>@$entities[0]->id]) !!}">
                <i class="glyphicon glyphicon-plus"></i> @lang('admin::admin.add')
            </a>
        @endif
    </div>
@endsection


@section('content')
    @include('admin::common.errors')
    @if (count($entities) > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>@lang('tree::admin.title_short')</th>
                    <th>@lang('tree::admin.slug_short')</th>
                    <th>@lang('admin::fields.priority')</th>
                    <th>@lang('admin::admin.control')</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($entities as $entity)
                <tr @if (!$entity->active) class="unpublished" @endif>
                    <td>
                        {!! str_repeat('<span class="fa padding"></span> ', $entity->depth) !!}
                        <span
                            class="fa @if ($entity->isRoot())fa-cog @elseif(!$entity->isLeaf()) fa-folder @else fa-sticky-note-o @endif"></span>
                        {{ $entity->title }}
                    </td>

                    <td>{{ $entity->slug }}</td>

                    <td class="priority">
                        @if (!$entity->isRoot())
                            @include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])
                        @endif
                    </td>

                    <td class="controls">
                        <a class="btn btn-default btn-sm"
                           href="{!! route($routePrefix.'create', ['parent' => $entity->id]) !!}">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>

                        @include('admin::common.controls.publish', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                        @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])

                        @if (!$entity->isRoot())
                            @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $entities->appends(\Request::except('page'))->render() !!}
    @else
        <p>
            <a href="{!! route($routePrefix.'create') !!}" class="btn btn-primary icon-plus icon-white ">
                <span>@lang('tree::admin.create_root')</span>
            </a>
        </p>
    @endif
@endsection
