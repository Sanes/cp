@extends('admin.base')
@section('title')
Запрос #{{ $ticket->id }}
@endsection
@section('content')
<h4>Запрос #{{ $ticket->id }}</h4>
<div uk-grid>
	<div class="uk-width-2-3@l uk-width-1-2@m">
		{!! \Str::markdown($ticket->content) !!}
	</div>
</div>
@endsection
@section('js')
@include('customer.tickets.notify')
@endsection