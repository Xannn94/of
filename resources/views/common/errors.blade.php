@if (count($errors) > 0)
    <!-- Список ошибок формы -->
    <div class="alert alert-danger">
        <strong>@lang('index.form_error')</strong>
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
@endif