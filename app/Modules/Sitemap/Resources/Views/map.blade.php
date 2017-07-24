<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(isset($params['root']) && config('localization.default') == Lang::locale())
            <url>
                <loc>{{ $params['host'] }}</loc>
                <changefreq>daily</changefreq>
                <priority>1</priority>
            </url>
    @endif

    @foreach($params['locs'] as $url)
        @if(!$url['loc'])
            @continue
        @endif

        <url>
            <loc>{{ $url['loc'] }}</loc>

            @if(isset($url['lastmod']))
                <lastmod>{{ $url['lastmod'] }}</lastmod>
            @endif

            @if(isset($url['changefreq']))
                <changefreq>{{ $url['changefreq'] }}</changefreq>
            @endif

            @if(isset($url['priority']))
                <priority>{{ $url['priority'] }}</priority>
            @endif
        </url>
    @endforeach
</urlset>
