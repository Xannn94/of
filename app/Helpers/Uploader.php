<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Uploader{

    protected $name = false;

    public function generateName($ext)
    {
        list($usec, $sec) = explode(" ", microtime());
        $this->name =  time() . "_" . substr($usec, 2) . '.' . $ext;
        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function upload($file, $config)
    {
        $baseDir = public_path() . $config['path'];

        $this->dir($baseDir);

        $this->generateName($file->getClientOriginalExtension());

        if (!isset($config['thumbs']) || empty($config['thumbs'])) {
            $file->move($baseDir,  $this->getName());
            return true;
        }
        else{
            return $this->resizeAndUpload($file, $config);
        }
    }

    public function resizeAndUpload($file, $config){
        $baseDir = public_path() . $config['path'];

        foreach ($config['thumbs'] as $thumb) {
            $path = $baseDir . $thumb['path'];

            $this->dir($path);

            $img = Image::make($file->getRealPath());

            if ($thumb['width'] && $thumb['height']) {
                if ($thumb['width'] >= $thumb['height']) {
                    $img->resize($thumb['width'], null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                } else {
                    $img->resize(null, $thumb['height'], function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }
                $img->crop($thumb['width'], $thumb['height']);
            }

            if (!$thumb['height']) {
                $img->resize($thumb['width'], null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            if (!$thumb['width']) {
                $img->resize(null, $thumb['height'], function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            if (isset($thumb['watermark']) && isset($thumb['watermark']['path'])) {
                $aPath = public_path() . $thumb['watermark']['path'];

                if (File::isFile($aPath)) {
                    $watermark = Image::make($aPath);
                    $img->insert($watermark, $thumb['watermark']['position'] ? $thumb['watermark']['position'] : 'center');
                }

            }

            $img->save($path . $this->getName());

            if ($img->extension == 'png') {
                $img->encode('png');
            }
            elseif($img->extension == 'jpeg' || $img->extension == 'jpg') {
                $img->encode('jpg',75);
            }
        }

        return true;
    }

    public function dir($path){
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }

    public function delete($name, $config){
        $baseDir = public_path() . $config['path'];
        if (!isset($config['thumbs']) || empty($config['thumbs'])) {
            @unlink($baseDir.$name);
            return true;
        }

        else{
            foreach ($config['thumbs'] as $thumb) {
                $path = $baseDir.$thumb['path'].$name;
                @unlink($path);
            }
        }

        return true;
    }

    public function fullUrl($config){
        if (!isset($config['thumbs'])){
            return false;
        }

        $url =  $config['path'].$config['thumbs'][0]['path'];

        foreach ($config['thumbs'] as $thumb){
            if (isset($thumb['full']) && $thumb['full'] == true){
                $url =  $config['path'].$thumb['path'];
            }
        }

        return $url;
    }

    public function thumbUrl($config){
        if (!isset($config['thumbs'])){
            return false;
        }

        foreach ($config['thumbs'] as $thumb){
            if (isset($thumb['thumb']) && $thumb['thumb']== true){
                $url =  $config['path'].$thumb['path'];
            }

            if (!next($config['thumbs'])){
                $url =  $config['path'].$thumb['path'];
            }
        }

        return $url;
    }

    public function url($config, $folder){

        if (!isset($config['thumbs'])){
            return false;
        }

        foreach ($config['thumbs'] as $thumb){
            if (strstr($thumb['path'], $folder)){
                return $config['path'].$thumb['path'];
            }
        }
    }
}