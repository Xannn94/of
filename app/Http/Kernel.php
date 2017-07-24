<?php

namespace App\Http;

use App\Modules\Roles\Http\Middleware\ActionAccess;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'          => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest'         => \App\Modules\Users\Http\Middleware\RedirectIfAuthenticated::class,
        'bindings'      => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can'           => \Illuminate\Auth\Middleware\Authorize::class,
        'admin'         => \App\Modules\Admin\Http\Middleware\RedirectIfAuthenticated::class,
        'admin.user'    => \App\Modules\Admin\Http\Middleware\DeniedIfNotAdmin::class,
        'throttle'      => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'action.access' => ActionAccess::class,

        'page'          => \App\Modules\Tree\Http\Middleware\Page::class,
        'breadcrumbs'   => \App\Http\Middleware\Breadcrumbs::class,
        'og'            => \App\Http\Middleware\Og::class,
        'meta'          => \App\Http\Middleware\Meta::class
    ];

    use \Xannn94\Localization\Traits\LocalizationKernelTrait;
}
