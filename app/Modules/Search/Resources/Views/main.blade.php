<form class="navbar-form navbar-right" action="{{ route('search') }}" method="post">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" name="query" required minlength="3" maxlength="255" placeholder="@lang('search::index.input_placeholder')" value="{{ $query }}">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</form>
