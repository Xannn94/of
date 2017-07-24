@extends('layouts.inner')

@push('js')
@verbatim
    <script type="text/javascript">
        function initMap() {
            var myLatLng = {lat: <?=Settings::get('lat')?:0?>, lng: <?=Settings::get('lng')?:0?>};,
                map = new google.maps.Map(document.getElementById('map'), {
                    scrollwheel: false,
                    zoom: <?=Settings::get('zoom')?:8?>,
                    center: myLatLng
                }),
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
        }
    </script>
@endverbatim
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?=config('googlemaps.key')?>&callback=initMap">
    </script>
@endpush

@section('content')
    <div class="feedback">
        <div class="row">
            <div class="col-md-6">
                <div class="feedback__left">
                    <div class="feedback__title">@lang('feedback::index.contacts')</div>
                    <div class="feedback__item">
                        {!! $page->content !!}
                    </div>
                    <div class="feedback__title">@lang('feedback::index.location')</div>
                    <div class="feedback__item">
                        <div class="feedback__map" id="map">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feedback__right">
                    {!! Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store'])  !!}
                    <div class="feedback__title">@lang('feedback::index.form_title')
                    </div>

                    @include('common.errors')

                    <div class="feedback__item">
                        <label class="feedback__label" for="name">@lang('feedback::index.name') *</label>
                        <input type="text" name="name" placeholder="@lang('feedback::index.name_placeholder')" id="name"
                               value="{{old('name')}}">

                        @if ($errors->has('name'))
                            <div class="feedback__error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif

                    </div>
                    <div class="feedback__item">
                        <label class="feedback__label" for="email">@lang('feedback::index.email') *</label>
                        <input type="text" name="email" placeholder="@lang('feedback::index.email_placeholder')" id="email"
                               value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <div class="feedback__error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="feedback__item">
                        <label class="feedback__label" for="message">@lang('feedback::index.message') *</label>
                             <textarea name="message" cols="80" rows="10" placeholder="@lang('feedback::index.message_placeholder')"
                                       id="message">{{old('message')}}</textarea>
                        @if ($errors->has('message'))
                            <div class="feedback__error">
                                {{ $errors->first('message') }}
                            </div>
                        @endif

                    </div>
                    <div class="feedback__item">
                        <label class="feedback__label">@lang('feedback::index.captcha') *
                        </label>

                        <div class="captcha">
                            <div class="captcha__left">
                                <div class="captcha__image">
                                    {!! captcha_img('flat') !!}
                                </div>
                            </div>
                            <div class="captcha__right">
                                <input type="text" name="captcha" id="captcha" placeholder="@lang('feedback::index.captcha_placeholder')">
                                @if ($errors->has('captcha'))
                                    <div class="feedback__error">
                                        {{ $errors->first('captcha') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="feedback__item">
                        <div class="feedback__button">
                            <input class="btn btn-block btn-default" type="submit" value="@lang('feedback::index.send')">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection