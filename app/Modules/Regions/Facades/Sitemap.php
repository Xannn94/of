<?php
namespace App\Modules\Tree\Facades;

use App\Modules\Sitemap\Sitemap as BaseSitemap;
use App\Modules\Tree\Models\Tree as ModelTree;
class Sitemap extends BaseSitemap {

    public function getLocs( $limit, $offset )
    {
        $attributes = $this->model->first()->getAttributes();
        $res        = null;

        if ( is_array($attributes) ) {
            if ( array_key_exists($this->activeField,$attributes) ) {
                $tree = new ModelTree();
                $res  = $tree->all();
            }
        }

        $result = array();

        foreach ( $res as $ent ) {
            $result[] = $this->prepareLoc( $ent );
        }

        return $result;
    }

    public function getUrl( $row )
    {
        if ($row->slug=='' && !$row->depth && $row->lang == config('localization.default')) {
            return false;
        }

        if ( count(config('localization.supported-locales')) > 1 ) {
            return url('/'.$row->lang . '/' . $row->slug);
        }
        else{
            return url( $row->slug );
        }
    }
}
