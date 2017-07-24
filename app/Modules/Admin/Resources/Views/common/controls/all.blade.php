


@include('admin::common.controls.publish', [
    'routePrefix'   => $routePrefix,
    'id'            => $id
])

@include('admin::common.controls.edit', [
    'routePrefix'   => $routePrefix,
    'id'            => $id
])

@include('admin::common.controls.destroy', [
    'routePrefix'   => $routePrefix,
    'id'            => $id
])

