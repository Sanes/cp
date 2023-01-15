@extends('customer.base')
@section('title')
Запрос #{{ $ticket->id }}
@endsection
@section('content')
<turbo-frame id="content">
<h4>#{{ $ticket->id }} {{ $ticket->title }}</h4>
<div uk-grid>
	<div class="uk-width-2-3@l uk-width-1-2@m">
		{!! \Str::markdown($ticket->content) !!}
		<div class="uk-margin">
			<ul class="uk-iconnav">
		    @if(\Carbon\Carbon::now()->subMinutes(15) < $ticket->updated_at)
			    <li><a href="{{ route('customer.tickets.edit', $ticket->id) }}" class="uk-icon-button" uk-icon="icon: file-edit"></a></li>
		    @endif
			</ul>	
		</div>		
	</div>
</div>
@endsection
@section('js')
@include('customer.tickets.notify')
@endsection