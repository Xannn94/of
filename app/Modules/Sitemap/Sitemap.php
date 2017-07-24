<?php

namespace App\Modules\Sitemap;

class Sitemap
{
    public $route           = '';
    public $module          = '';
    public $model           = '';
    public $activeField     = 'published';
    public $defaultParams   = [
        'changefreq'    => 'daily',
        'priority'      => '0.8'
    ];

    public function getModel()
    {

    }

    public function __construct( $module )
    {
        $this->module   = $module;
        $modelPath      = '\App\Modules\\' . $module . '\Models\\' . $module;
        $this->model    = new $modelPath();
    }

    public function getRootLocs( $limit, $locale )
    {
        $count = $this->model->count();

        if ( !$count ) {
            return false;
        }

        $limits = ceil( $count / $limit );
        $locs   = [];

        for ($i = 1; $i <= $limits; $i++) {
            $locs[] = url( $locale.'/sitemap/' . lcfirst($this->module) . '_' . $i . '.xml' );
        }

        return $locs;
    }

    public function getLocs( $limit, $offset ){
        $res        = '';
        $result     = [];
        $attributes = $this->model->first()->getAttributes();

        if ( is_array($attributes) ) {
            if ( array_key_exists($this->activeField, $attributes) ) {
                $res = $this->model->where( $this->activeField, 1 )->limit( $limit )->offset( $offset )->get();
            }
            else {
                $res = $this->model->all();
            }
        }

        if ( $res ) {
            foreach ( $res as $ent ) {
                $result[] = $this->prepareLoc( $ent );
            }
        }

        return $result;
    }

    public function prepareLoc( $ent )
    {
        $r = ['loc' => $this->getUrl( $ent )];
        $r = $r + $this->defaultParams;

        if ( isset( $ent->updated_at ) ) {
            $r['lastmod'] = date( 'c', strtotime($ent->updated_at) );
        }

        return $r;
    }

    public function getUrl( $row )
    {
        if ( count(config('localization.supported-locales')) > 1 ){
            return url(\Lang::locale() . '/' . $this->route,['id' => $row->getRouteKey() ]);
        }
        else{
            return url( $this->route, ['id' => $row->getRouteKey()] );
        }
    }
}
