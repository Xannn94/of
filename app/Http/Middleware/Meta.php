<?php

namespace App\Http\Middleware;

use App\Modules\Widgets\Facades\Widget;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class Meta
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
        $meta   = [];
        $entity = Request::getFacadeRoot()->get('entity');
        $page   = Request::getFacadeRoot()->get('page');
        $title  = false;

        if ($entity) {
            if (@$entity->meta_title) {
                $title = $entity->meta_title;
            }

            if (!$title && @$entity->title) {
                $title = $entity->title;
            }
        }

        if ($page){
            if (!$title && $page->meta_title){
                $title = $page->meta_title;
            }

            if (!$title && $page->title){
                $title = $page->title;
            }
        }

        if (!$title){
            $title = Widget::get('title');
        }

        if (!$title){
            $title = config('app.name');
        }

        if ($title) {
            $meta['title'] = $title;
        }

        $h1 = false;

        if ($entity) {
            if (@$entity->meta_h1) {
                $h1 = $entity->meta_h1;
            }

            if (!$h1 && @$entity->title) {
                $h1 = $entity->title;
            }
        }

        if ($page){
            if (!$h1 && $page->meta_h1) {
                $h1 = $page->meta_h1;
            }

            if (!$h1 && $page->title) {
                $h1 = $page->title;
            }
        }

        if ($h1){
            $meta['h1'] = $h1;
        }

        $keywords = false;

        if ($entity) {
            if (@$entity->meta_keywords) {
                $keywords = $entity->meta_keywords;
            }
        }

        if ($page){
            if (!$keywords && $page->meta_keywords){
                $keywords = $page->meta_keywords;
            }
        }

        if ($keywords){
            $meta['keywords'] = $keywords;
        }

        $description = false;

        if ($entity) {
            if (@$entity->meta_description) {
                $description = $entity->meta_description;
            }

            if (!$description && @$entity->preview){
                $description = $entity->preview;
            }

            if (!$description && @$entity->lid){
                $description = $entity->lid;
            }

            if (!$description && @$entity->content){
                $description = $this->cleanContent($entity->content, 150);
            }
        }

        if ($page){
            if (!$description && $page->meta_description){
                $keywords = $page->meta_description;
            }
            if (!$description && $page->content){
                $description = $this->cleanContent($page->content, 150);
            }
        }

        if ($description){
            $meta['description'] = $description;
        }

        View::share('meta', (object)$meta);

        return $next($request);
    }

    protected function cleanContent($content, $length){
      return trim(
          preg_replace(
              '/&#?[a-z0-9]+;/i', '',
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
