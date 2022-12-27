@php
    use App\Http\Requests\UserSearchRequest;
    use Illuminate\Support\Facades\Request;
@endphp

<form class="form-inline" action={{ route('users.index', Request::all()) }}>
    <div class="form-group mx-sm-3 mb-2">
        <input
            type="text"
            name="{{ UserSearchRequest::SEARCH_FIELD_NAME }}"
            class="form-control"
            id="search"
            placeholder="Поиск"
            value="{{ Request::all()[UserSearchRequest::SEARCH_FIELD_NAME] ?? '' }}"
        >
    </div>
    <button type="submit" class="btn btn-primary mb-2">Поиск</button>
    @if (count(Request::except('page')))
        <div class="form-group mx-sm-3 mb-2">
            <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Очистить</a>
        </div>
    @endif

</form>
