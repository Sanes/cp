@extends('admin.base')
@section('title')
Изменить пользователя
@endsection
@section('content')
<h4>Изменить пользователя</h4>
<form action="{{ route('admin.users.update', $user->id) }}" method="post" class="uk-form-stacked">
			@csrf
			@method('put')
	<div uk-grid>
		<div class="uk-width-1-3@l uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="name" class="uk-form-label">Имя</label>
					<input type="text" class="uk-input" id="name" name="name" value="{{ old('name') ?? $user->name }}" required minlength="5">
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="email" class="uk-form-label">Email</label>
					<input type="email" class="uk-input" id="email" name="email" value="{{ old('email') ?? $user->email }}" required>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="phone" class="uk-form-label">Телефон</label>
					<input type="phone" class="uk-input" id="phone" name="phone" value="{{ $user->profile->phone ?? old('phone') }}">
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="role" class="uk-form-label">Роль</label>
					<select name="role" id="role" class="uk-select">
						<option value="">Без роли</option>
						@foreach($roles as $role)
						<option value="{{ $role->name }}" class="uk-text-capitalize">{{ $role->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="uk-width-2-3@l uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="about" class="uk-form-label">Дополнительно</label>
					<textarea name="about" id="about" rows="4" class="uk-textarea">{{ old('about') }}</textarea>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="note" class="uk-form-label">Заметка</label>
					<textarea name="note" id="note" rows="4" class="uk-textarea">{{ old('note') }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-margin">
		<a href="{{ route('admin.users.index') }}" class="uk-button uk-button-primary">Отмена</a>
		<button class="uk-button uk-button-default">Сохранить</button>
	</div>
</form>
@endsection
@section('js')
@endsection