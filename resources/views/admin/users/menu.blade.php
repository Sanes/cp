<a href="#" class="uk-link-reset uk-margin-small-right" uk-icon="search"></a>
<div class="uk-width-medium" uk-dropdown="pos: bottom-right; mode: click;">
	<h4>Найти пользователя</h4>
		<div class="uk-margin">
			{{-- Доступные поля --}}
			<div class="uk-child-width-1-2 uk-grid-collapse uk-text-muted" uk-grid>
				{{-- <li class="uk-padding-small uk-padding-remove-vertical">ID</li> --}}
				<div>Имя</div>
				<div>Email</div>
				<div>Телефон</div>
				<div>Дополнительно</div>
				<div>Заметка</div>
			</div>
		</div>
	<form action="{{ route('admin.users.index' )}}" class="uk-form-stacked">
	    <div class="uk-margin">
	        <div class="uk-inline">
	            <input type="text" class="uk-input" name="s" minlength="2" placeholder="Поиск" autofocus>
	            <button class="uk-form-icon uk-form-icon-flip" type="submit" uk-icon="icon: search"></button>
	        </div>
	    </div>		
	</form>
</div>		
<a href="{{ route('admin.users.create') }}" class="uk-link-reset"><span class="uk-margin-small-right" uk-icon="plus"></span>Добавить</a>