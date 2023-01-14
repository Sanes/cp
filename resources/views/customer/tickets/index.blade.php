@extends('customer.base')
@section('title')
Запросы
@endsection
@section('content')
<div uk-grid>
	<div class="uk-width-expand@m">
		<h4>Запросы</h4>
	</div>
	<div class="uk-width-auto">
		@include('customer.tickets.menu')
	</div>
</div>
@if($tickets->count() === 0)
<div class="uk-padding uk-text-center uk-width-expand">
	Ничего не найдено
</div>
@else
<div class="uk-overflow-auto uk-margin">
	<table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-text-small">
		<thead>
			<tr>
				<th>ID</th>
				<th>Тема запроса</th>
				<th>Обновлён</th>
				<th>Статус</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
			<tr>
				<td class="uk-table-shrink">{{ $ticket->id }}</td>
				<td class="uk-width-expand uk-text-nowrap uk-table-link uk-link-reset"><a href="{{ route('customer.tickets.show', $ticket->id) }}">{{ $ticket->title }}</a></td>
				<td class="uk-table-shrink uk-text-nowrap">{{ $ticket->updated_at->format('H:i d-m-Y') }}</td>
				<td class="uk-text-nowrap">{{ $ticket->status }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tickets->appends(request()->input())->links('admin.pagination') }}
</div>
@endif
@endsection
@section('js')
@include('customer.tickets.notify')
@endsection