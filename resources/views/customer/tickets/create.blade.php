@extends('customer.base')
@section('title')
Отправить запрос
@endsection
@section('content')
<h4>Отправить запрос</h4>
<div grid>
	<div class="uk-width-1-2@l">
		<form action="{{ route('customer.tickets.store') }}" class="uk-form-stacked" method="POST">
			@csrf
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="title" class="uk-form-label">Заголовок</label>
					<input type="text" class="uk-input" id="title" placeholder="Тема запроса" name="title">
                    @error('title')
                    <span class="uk-text-danger uk-text-small">{{ $message }}</span>
                    @enderror 						
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="content" class="uk-form-label">Текст</label>
	            	<textarea class="uk-textarea" rows="8" id="content" placeholder="Текст запроса" name="content"></textarea>
                    @error('content')
                    <span class="uk-text-danger uk-text-small">{{ $message }}</span>
                    @enderror 		            	
				</div>
			</div>
			<a href="{{ route('customer.tickets.index') }}" class="uk-button uk-button-primary">Отмена</a>
			<button type="submit" class="uk-button uk-button-default">Отправить</button>
		</form>
	</div>
</div>
@endsection
@section('js')
@endsection