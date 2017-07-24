@if(!empty($result))
    @foreach($result as $module => $moduleInfo)
        @if($moduleInfo['html'])
            {!! $moduleInfo['html'] !!}
        @elseif(!empty($moduleInfo['nodes']))
            <h2>{{ $moduleInfo['title'] }}</h2>
            <ul>
                @foreach($moduleInfo['nodes'] as $num => $node)
                <li>
                    <h4>
                        <a href="{{ $node['url'] }}">{!! $node['title']  !!}</a>
                    </h4>
                    <p>{!! $node['preview']  !!}</p>
                </li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endif
