<?php
    echo '<?xml version="1.0"?>';
?>
<sitemapindex>
    @foreach($locs as $loc)
        <sitemap>
            <loc>{{ $loc }}</loc>
        </sitemap>
    @endforeach
</sitemapindex>