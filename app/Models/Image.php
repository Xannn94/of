<?php

namespace App\Models;


trait Image{


    public function imageField(){
        return 'image';
    }

    public function imagePrefixPath(){
        return '/uploads/'.strtolower($this->getTable()).'/';
    }

    public function getImageThumbAttribute(){
        return $this->imagePath('thumb');
    }

    public function getImageMiniAttribute(){
        return $this->imagePath('mini');
    }

    public function getImageFullAttribute(){
        return $this->imagePath('full');
    }

    public function imagePath($slug=false){

        $image = $this->{$this->imageField()} ;

        if (!$image){
            return false;
        }

        if ($slug){
            $slug.='/';
        }

        if (!is_file(public_path().$this->imagePrefixPath().$slug.$image)){
            return false;
        }

        return $this->imagePrefixPath().$slug.$image;
    }
}