<?php
namespace App\Modules\Tree\Models;

use App\Models\Lang;
use App\Models\Tree as ParentTree;
use Kyslik\ColumnSortable\Sortable;

class Tree extends ParentTree{
    use Sortable;

    protected $table = 'tree';
}