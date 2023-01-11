<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('title')
	<link rel="icon" href="/laravel.png">
	<link rel="stylesheet" href="/css/uikit.min.css" />
	<script src="/js/uikit.min.js"></script>
	<script src="/js/uikit-icons.min.js"></script>
	<script type="module" src="https://cdn.skypack.dev/@hotwired/turbo"></script>
	<meta name="turbo-cache-control" content="no-cache">
</head>
<body>

<div class="uk-height-viewport uk-flex uk-flex-center uk-flex-middle" style="min-height: calc(100vh - 58px);">
	<div>
		<a href="/" class="uk-text-center uk-display-block " style="text-decoration: none; color: #666;">
			<span uk-icon="icon:lock; ratio:3"></span>
			<h2 class=" uk-text-center uk-text-uppercase uk-margin-small" style="color: #666;">{{ config('app.name') }}</h2>
		</a>
		@yield('content')
	</div>
</div>

<div class="uk-padding-small uk-text-small uk-text-center uk-container uk-container-small">
	{{ config('app.name') }} © @php echo date('Y'); @endphp
</div>
</body>
</html>