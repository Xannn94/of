<?php

namespace App\Http\Middleware;

use App\Modules\Widgets\Facades\Widget;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class Og
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $og         = [];
        $siteName   = Widget::get('title');

        if (!$siteName) {
            $siteName = config('app.name');
        }

        if ($siteName) {
            $og['site_name'] = $siteName;
        }

        $entity     = Request::getFacadeRoot()->get('entity');
        $page       = Request::getFacadeRoot()->get('page');
        $ogImage    = false;

        if ($entity) {
            if (@$entity->image_full) {
                $ogImage = host() . $entity->image_full;
            }
            if (!$ogImage && @$entity->image_thumb) {
                $ogImage = host() . $entity->image_thumb;
            }

            if (!$ogImage && @$entity->content) {
                $ogImage = $this->getImageFromContent($entity->content);
            }
        }

        if (!$ogImage) {
            $ogImage = host().config('cms.og-image');
        }

        if ($ogImage) {
            $og['image'] = $ogImage;
        }

        $ogTitle = false;

        if ($entity) {
            if (@$entity->meta_title) {
                $ogTitle = $entity->meta_title;
            }

            if (!$ogTitle && @$entity->title) {
                $ogTitle = $entity->title;
            }
        }

        if ($page){
            if (!$ogTitle && $page->meta_title) {
                $ogTitle = $page->meta_title;
            }

            if (!$ogTitle && $page->title) {
                $ogTitle = $page->title;
            }
        }

        if (!$ogTitle){
            $ogTitle = $siteName;
        }

        if ($ogTitle){
            $og['title'] = $ogTitle;
        }

        $ogDescription = false;

        if ($entity) {
            if (@$entity->meta_description) {
                $ogDescription = $entity->meta_description;
            }

            if (!$ogDescription && @$entity->preview) {
                $ogDescription = $entity->preview;
            }

            if (!$ogDescription && @$entity->lid) {
                $ogDescription = $entity->lid;
            }

            if (!$ogDescription && @$entity->lid) {
                $ogDescription = $entity->lid;
            }

            if (!$ogDescription && @$entity->content) {
                $ogDescription = $this->cleanContent($entity->content, 150);
            }
        }

        if ($page){
            if (!$ogDescription && $page->meta_description) {
                $ogDescription = $page->meta_description;
            }

            if (!$ogDescription && $page->content) {
                $ogDescription = $this->cleanContent($page->content, 150);
            }
        }

        if ($ogDescription){
            $og['description'] = $ogDescription;
        }

        View::share('og', (object)$og);

        return $next($request);
    }

    protected function getImageFromContent($html)
    {
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);

        $tags   = $doc->getElementsByTagName('img');
        $images = array();

        foreach ($tags as $tag) {
            $images[] = $tag->getAttribute('src');
        }

        if (empty($images)) {
            return false;
        }

        $image = $images[0];

        if (strpos($image, host_protocol()) !== false) {
            return $image;
        } else {
            return host() . $image;
        }
    }

    protected function cleanContent($content, $length){
      return trim(
          preg_replace(
              '/&#?[a-z0-9]+;/i',
              '',
              str_limit(
                  preg_replace(
                      '/\r|\n/', ' ',
                      strip_tags($content)
                  ),
                  $length
              )
          )
      );
    }
}
