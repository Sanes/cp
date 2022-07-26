@extends('auth.base')

@section('title')
<title>Сбросить пароль</title>
@endsection
@section('content')
<h4 class="uk-text-center">Сбросить пароль</h4>
@if (session('status'))
    <div class="uk-alert uk-alert-primary uk-margin-bottom">
        На email оправлена ссылка для подтверждения.
    </div>
@endif
<form action="{{ route('password.email') }}" method="POST" class="uk-form-stacked">
    @csrf
    <div class="uk-margin">
        <label class="uk-form-label" for="email">Email</label>
        <div class="uk-form-controls uk-width-medium">
            <input class="uk-input" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus="">
            @error('email')
            <span class="uk-text-danger uk-text-small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-form-controls uk-width-medium">
            <button type="submit" class="uk-button uk-button-primary">
                Отправить ссылку
            </button>
        </div>
    </div>
    <div class="uk-margin-small">
        <div class="uk-form-controls uk-width-medium">
            <a href="{{ route('login') }}">Войти</a>
        </div>
    </div>
    @if (Route::has('register'))
    <div class="uk-margin-small">
        <div class="uk-form-controls uk-width-medium">
            <a href="{{ route('register') }}">Регистрация</a>
        </div>
    </div>
    @endif
</form>
@endsection