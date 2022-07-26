<script>
	@if (Session::has('user-created'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Пользователь добавлен',
	    timeout: 10000
	});
	@endif
	@if (Session::has('user-destroyed'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Пользователь удалён',
	    timeout: 10000
	});
	@endif
	@if (Session::has('user-updated'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Пользователь обновлён',
	    timeout: 10000,
	});
	@endif
</script>