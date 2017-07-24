<?php

namespace App\Modules\Gallery\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Images;
use App\Modules\Gallery\Models\Gallery;
use App\Modules\Gallery\Models\Image;

class ImagesController extends Images
{
    public function getParentModel()
    {
        return new Gallery();
    }

    public function getModel()
    {
        return new Image();
    }
}
