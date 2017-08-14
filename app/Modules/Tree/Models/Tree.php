<?php
namespace App\Modules\Tree\Models;

use App\Models\Lang;
use App\Models\Tree as ParentTree;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Modules\Tree\Models\Tree
 *
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Modules\Tree\Models\Tree[] $children
 * @property-read \App\Modules\Tree\Models\Tree $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tree active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tree admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tree filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node limitDepth($limit)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tree order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Tree\Models\Tree sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutSelf()
 * @mixin \Eloquent
 */
class Tree extends ParentTree{
    use Sortable;

    protected $table = 'tree';
}