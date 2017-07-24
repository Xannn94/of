<?php

namespace App\Modules\Tree\Facades;

use App\Modules\Search\Http\Controllers\Search as BaseSearch;
use Illuminate\Support\Facades\Route;

class Search extends BaseSearch
{
    public $tableName       = 'tree';
    public $dateField       = '';
    public $previewField    = '';

    public function getResult()
    {
        $sql = $this->getTable()
            ->select()
            ->where(
                $this->getSearchSqlWhere(
                    $this->getQuery(),
                    [
                        'title',
                        'content',
                        'meta_h1',
                        'meta_title',
                        'meta_keywords',
                        'meta_description']
                ))
            ->where('active', 1)
            ->where('lang', \Lang::locale())
            ->get();

        return $this->addNodes($sql, 'tree', trans('tree::index.search_title'));
    }

    public function getUrl($row)
    {
        if (!isset($row->slug) || !Route::has($row->slug)) {
            return '';
        }

        return route($row->slug);
    }
}