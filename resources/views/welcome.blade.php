<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="/laravel.png" type="image/x-icon">
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="/js/uikit.min.js"></script>
    <script src="/js/uikit-icons.min.js"></script> 
    <script src="/js/turbolinks.js"></script>
    <meta name="turbolinks-cache-control" content="no-cache">
</head>
<body>
    <div class="uk-height-viewport uk-width-expand uk-flex uk-flex-center uk-flex-middle uk-text-center">
        <div>
            <div class="uk-margin uk-width-expand">
                <span uk-icon="icon: cog; ratio: 3.5"></span>
            </div>
            @can('manager')
            <div class="uk-margin">
                <a href="{{ route('users.index') }}" class="uk-link-reset">Admin Dashboard</a>
            </div>
            @endcan
            @guest
            <div class="uk-margin">
                <a href="{{ route('login') }}" class="uk-button uk-button-default">Войти</a>
            </div>
            <div class="uk-margin">
                <a href="{{ route('register') }}" class="uk-link-muted">Регистрация</a>
            </div>
            @endguest
            @role('admin')
            <a href="{{ route('admin.tickets.index') }}" class="uk-button uk-button-text">Администрирование</a>
            @endrole    
            @role('customer')
            <a href="{{ route('customer.tickets.index') }}" class="uk-button uk-button-text">Запросы</a>
            @endrole                
            @auth
            <div class="uk-margin">
                <a class="uk-button uk-button-default" onclick="document.getElementById('logout').submit();">Выйти</a>
                <form action="{{ route('logout') }}" method="POST" id="logout">
                    @csrf
                </form>                  
            </div>
            @if(session('impersonated_by'))
            <div class="uk-margin">
                <a href="{{ route('leave-impersonate') }}" class="uk-button uk-button-text">Вернуться в свой профиль</a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</body>
</html>