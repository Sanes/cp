<a href="#" class="uk-link-reset uk-margin-small-right" uk-icon="search"></a>
<div class="uk-width-medium" uk-dropdown="pos: bottom-center; mode: click;">
	<h4>Найти пользователя</h4>
	<form action="{{ route('admin.users.index' )}}" class="uk-form-stacked">
		<div class="uk-margin">
			<div class="uk-form-controls">
				<input type="text" class="uk-input" name="filter[name]" minlength="2" placeholder="Имя">
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls">
				<input type="text" class="uk-input" name="filter[email]" minlength="2" placeholder="Email">
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls">
				<input type="text" class="uk-input" name="filter[profile.phone]" minlength="2" placeholder="Телефон">
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls">
				<input type="text" class="uk-input" name="filter[profile.about]" minlength="2" placeholder="Дополнительно">
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls">
				<input type="text" class="uk-input" name="filter[profile.note]" minlength="2" placeholder="Заметка">
			</div>
		</div>
		<div class="uk-margin">
			<button class="uk-button uk-button-default">Найти</button>
		</div>
	</form>
</div>		
<a href="{{ route('admin.users.create') }}" class="uk-link-reset"><span class="uk-margin-small-right" uk-icon="plus"></span>Добавить</a>