@extends('admin.base')
@section('title')
Запрос #{{ $ticket->id }}
@endsection
@section('content')
<h4>#{{ $ticket->id }} {{ $ticket->title }}</h4>
<div uk-grid>
	<div class="uk-width-2-3@l uk-width-1-2@m">
		{!! \Str::markdown($ticket->content) !!}
	</div>
</div>
<div class="uk-margin">
    <ul class="uk-iconnav">
        <li><a onclick="destroyTicket('{{ $ticket->id }}', '{{ $ticket->title }}');" class="uk-icon-button" uk-icon="icon: trash"></a></li>
    </ul>   
</div>
<form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="post" id="destroy">
    @method('DELETE')
    @csrf
    <input type="hidden" name="profile" value="1">
</form> 
@endsection
@section('js')
<script>
    function destroyTicket(id, name){
        let confirmDestroy = confirm('Удалить пользователя ' + name + '?');
        let destroyForm = document.getElementById('destroy');
        if (confirmDestroy) {
            destroyForm.submit();
        }
    } 	
</script>
@include('admin.tickets.notify')
@endsection