<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') | {{ config('app.name')}}</title>
    <link rel="icon" href="/laravel.png">
	<link rel="stylesheet" href="/css/uikit.min.css">
	<script src="/js/uikit.min.js"></script>
	<script src="/js/uikit-icons.min.js"></script>
	<script type="module" src="https://cdn.skypack.dev/@hotwired/turbo"></script>
	<meta name="turbo-cache-control" content="no-cache">
	<style type="text/css">
        .uk-navbar-item, .uk-navbar-nav > li > a, .uk-navbar-toggle {padding: 0 10px;}
        .uk-notification-message {font-size: 16px;}		
	</style>
</head>
<body>
	<div class="uk-container uk-container-large" style="min-height: calc(100vh - 51px);">
		<nav class="uk-navbar uk-margin" style="border-bottom: 1px solid #e5e5e5;" uk-navbar>
			<div class="uk-navbar-left">
				<a href="/" class="uk-logo uk-text-uppercase">{{ config('app.name')}}</a>
			</div>
			<div class="uk-navbar-right">
		        <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon href="#"></a>
		        <div class="uk-navbar-dropdown">
		            <ul class="uk-nav uk-navbar-dropdown-nav">
		                <li><a href="{{ route('admin.users.show', auth()->user()->id) }}">Профиль</a></li>
		                <li>
		                    <a onclick="document.getElementById('logout').submit();">Выйти</a>
		                    <form action="{{ route('logout') }}" method="POST" id="logout">
		                        @csrf
		                    </form>                                  
		                </li>
		                @if(session('impersonated_by'))
		                <li class="uk-nav-divider"></li>
		                <li>
		                    <a href="{{ route('leave-impersonate') }}">Вернуться профиль</a>
		                </li>
		                @endif
		            </ul>
		        </div>
			</div>
		</nav>
		<div class="uk-grid-divider uk-grid-medium" uk-grid>
			@include('admin.sidebar')
			<div class="uk-width-expand">
				@yield('content')
			</div>
		</div>
	</div>
    <div class="uk-container uk-padding-small uk-text-small uk-text-center uk-text-uppercase">{{ config('app.name')}} © 2022</div>
    @yield('js')
</body>
</html>