<div class="contacts__form">
    <h5>Обратная связь:</h5>
    {!! Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store'])  !!}
        <div class="b-form">
            <div class="b-form__item">
                <div class="b-form-item b-form-item_type_text b-form-item_style_default">
                    <label for="name_feed" class="b-form-item__label">Ваше имя:
                        <span class="form-item__label_required">*</span>
                    </label>
                    <div class="b-form-item__input">
                        <input type="text" name="name" placeholder="Введите ваше имя" id="name_feed" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <div class="error-item">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="b-form__item">
                <div class="b-form-item b-form-item_type_email b-form-item_style_default">
                    <label for="email" class="b-form-item__label">Ваш email:
                        <span class="form-item__label_required">*</span>
                    </label>
                    <div class="b-form-item__input">
                        <input
                                type="email"
                                name="email"
                                placeholder="info@example.com"
                                id="email"
                                pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                                title="Введите верный адрес email"
                                value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <div class="error-item">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="b-form__item">
                <div class="b-form-item b-form-item_type_text b-form-item_style_default">
                    <label for="phone_feed" class="b-form-item__label">Ваш телефон:
                        <span class="form-item__label_required">*</span>
                    </label>
                    <div class="b-form-item__input">
                        <input
                                type="text"
                                name="phone"
                                placeholder="Введите ваш телефон"
                                id="phone_feed"
                                value="{{old('phone')}}">

                        @if ($errors->has('phone'))
                            <div class="error-item">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="b-form__item">
                <div class="b-form-item b-form-item_type_textarea b-form-item_style_default">
                    <label for="textarea__feed" class="b-form-item__label">Сообщение:
                        <span class="form-item__label_required">*</span>
                    </label>
                    <div class="b-form-item__input">
                        @if(old('message'))
                            <textarea
                                    name="message"
                                    placeholder="Введите сообщение"
                                    id="textarea__feed">{{old('message')}}</textarea>
                        @else
                            <textarea
                                    name="message"
                                    placeholder="Введите сообщение"
                                    id="textarea__feed"></textarea>
                        @endif

                        @if ($errors->has('message'))
                            <div class="error-item">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="b-form__item">
                <div class="b-form-item b-form-item_type_captcha b-form-item_style_default">
                    <label for="captcha_feed" class="b-form-item__label">Спам фильтр<span class="form-item__label_required">*</span></label>
                    <div class="b-form-item__input-image" id="captcha_image" onclick="captcha.refresh(this)">
                            {!! captcha_img('flat')  !!}
                    </div>
                    <div class="b-form-item__input">
                        <input type="text" name="captcha" id="captcha_feed" value="{{old('captcha')}}">
                    </div>
                    @if ($errors->has('captcha'))
                        <div class="error-item">
                            {{ $errors->first('captcha') }}
                        </div>
                    @endif
                    <div class="clear"></div>
                </div>
            </div>
            <div class="b-form__button">
                <button type="submit" class="b-button b-button_block b-button_color_green b-button_size_lg b-button_bold" id="f_send_feed">Отправить</button>
            </div>
        </div>
    {!! Form::close() !!}
</div>