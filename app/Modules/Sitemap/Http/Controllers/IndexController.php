<?php

namespace App\Modules\Sitemap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Module;
use Cache;

use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function getModel()
    {

    }

    public function robots()
    {
        config(['app.debug' => true]);

        if ( config('cms.indexation') ) {
            $content = file( $_SERVER['DOCUMENT_ROOT'].'/robots/robots.txt' );
            return response()->view('sitemap::robots',['content' => implode( "", $content )])->header('Content-Type','text/plain');
        }
        else {
            return response()->view('sitemap::robots-disallow')->header('Content-Type','text/plain');
        }
    }

    public function index()
    {
        $locales    = config('localization.supported-locales');
        $result     = null;
        $cacheId    = 'sitemap';
        $cached     = Cache::store('file')->get($cacheId);
        $locs       = [];

        if($cached) {
            $responce = new Response();
            return $responce->setContent($cached)->header('Content-Type', 'text/xml');
        } else {
            foreach ($locales as $locale) {
                $limit      = module_config('settings.limit');
                $tmp        = [];
                $modules    = Module::all();

                foreach ($modules as $module) {
                    $searchName = '\\App\\Modules\\' . $module['basename'] . '\\Facades\\Sitemap';

                    if (!class_exists($searchName)) {
                        continue;
                    }

                    $searchModule   = new $searchName($module['basename']);
                    $tmp[]          = $searchModule->getRootLocs($limit,$locale);
                }

                if (empty($tmp)) {
                    return;
                }

                foreach ($tmp as $num => $arr) {
                    if (empty($arr)) {
                        continue;
                    }

                    foreach ($arr as $l) {
                        $locs[] = $l;
                    }
                }
            }
        }

        $cached = response()->view('sitemap::index', ['locs' => $locs])->header('Content-Type', 'text/xml');

        Cache::store('file')->put($cacheId, $cached->getContent(), 60);

        return $cached;
    }

    public function mod()
    {
        $modules    = [];
        $module     = Request::route('mod');
        $limit      = module_config('settings.limit');
        $offset     = Request::route('offset');
        $params     = [];

        if ( !$offset ) {
            abort(404);
        }

        if ( !$module ) {
            abort(404);
        } else {
            $module = ucfirst( $module );
        }

        foreach ( Module::all() as $key => $value ) {
            $modules[] = $key;
        }

        if (!in_array( $module, $modules )) {
            abort(404);
        }

        $cacheId = 'sitemap' . \Lang::locale(). $module . $offset;
        $cached  = Cache::store('file')->get($cacheId);

        if ( !$cached ) {
            $offset         = ( $offset - 1 ) * $limit;
            $searchName     = 'App\Modules\\' . $module . '\Facades\Sitemap';
            $searchModule   = new $searchName( $module );

            if ($module=='Tree') {
                $params['root'] = true;
                $params['host'] = host();
            }

            $params['locs'] = $searchModule->getLocs( $limit, $offset );
            $cached         = response()->view('sitemap::map', ['params' => $params])->header('Content-Type', 'text/xml');

            Cache::store('file')->put($cacheId,$cached->getContent(),60);

            return $cached;
        }
        else {
            $responce = new Response();
            return $responce->setContent($cached)->header('Content-Type', 'text/xml');
        }
    }
}
