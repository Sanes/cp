<script>
	@if (Session::has('ticket-created'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запрос добавлен',
	    timeout: 10000
	});
	@endif
	@if (Session::has('ticket-destroyed'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запрос удалён',
	    timeout: 10000
	});
	@endif
	@if (Session::has('ticket-updated'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запрос обновлён',
	    timeout: 10000,
	});
	@endif
</script>