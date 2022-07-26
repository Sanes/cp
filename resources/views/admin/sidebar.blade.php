<div class="uk-width-auto uk-visible@m uk-overflow-auto" style="min-height: calc(100vh - 152px);">
	<ul class="uk-nav uk-nav-default">
		<li class="uk-nav-header">Управление</li>
		<li class="uk-nav-divider"></li>
		<li><a href="#"><span class="uk-margin-small-right" uk-icon="comments"></span>Запросы</a></li>
		<li><a href="#"><span class="uk-margin-small-right" uk-icon="print"></span>Счета</a></li>
		<li class="uk-nav-divider"></li>
		<li @if(Request::segment(2) == 'users') class="uk-active" @endif><a href="{{ route('admin.users.index') }}"><span class="uk-margin-small-right" uk-icon="users"></span>Пользователи</a></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="settings"></span>Роли</a></li>
	</ul>
</div>