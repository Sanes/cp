@extends('auth.base')

@section('title')
<title>Обновить пароль</title>
@endsection
@section('content')

<h3 class="uk-text-center">Обновить пароль</h3>
<form action="{{ route('password.update') }}" method="POST" class="uk-form-stacked">
    @csrf
    <input type="hidden" name="token" value="{{ request()->route('token') }}">
    <div class="uk-margin">
        <label class="uk-form-label" for="email">Email</label>
        <div class="uk-form-controls uk-width-medium">
            <input class="uk-input" id="email" name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
            @error('email')
            <span class="uk-text-danger uk-text-small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="password">Пароль</label>
        <div class="uk-form-controls uk-width-medium">
            <input class="uk-input" id="password" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password">
            @error('password')
            <span class="uk-text-danger uk-text-small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="password-confirm">Повторить пароль</label>
        <div class="uk-form-controls uk-width-medium">
            <input class="uk-input" id="password-confirm" name="password_confirmation" type="password" value="{{ old('password-confirm') }}" required autocomplete="new-password">
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-primary">
                Обновить пароль
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls">
            <a href="{{ route('login') }}">Авторизация</a>
        </div>
    </div>
</form>
@endsection
