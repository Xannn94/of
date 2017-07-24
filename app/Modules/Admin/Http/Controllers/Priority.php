<?php
namespace App\Modules\Admin\Http\Controllers;


trait Priority
{

    public function priority($id, $direction)
    {
        $entity = $this->getModel()->findOrFail($id);

        if ($direction == 'up') {
            $entity->priority++;
        } else {
            $entity->priority--;
        }

        $entity->save();
        $this->after($entity);

        return redirect()->back();
    }

}