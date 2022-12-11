<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('images/logo200x200.png') }}" style="height: 40px; padding-right: 10px;" class="rounded float-left" alt="{{ env('APP_NAME') }}">
        <span class="text-uppercase">{{ env('APP_NAME') }}</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Главная</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('devices.index') }}">Устройства</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('monitor') }}">Мониторинг</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('control') }}">Управление</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings') }}">Настройки</a>
            </li>

        </ul>

        {{--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Поиск">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Поиск</button>
        </form>--}}

        <a type="button" class="btn btn-light">
            <span>Name Surname</span>
            <span class="badge badge-primary ml-1">9</span>
            <span class="sr-only">unread messages</span>
        </a>
    </div>
</nav>
