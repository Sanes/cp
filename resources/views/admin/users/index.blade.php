@extends('admin.base')
@section('title')
Пользователи
@endsection
@section('content')
<div uk-grid>
	<div class="uk-width-expand@m">
		<h4>Пользователи</h4>
	</div>
	<div class="uk-width-auto">
		@include('admin.users.menu')
	</div>
</div>
@if($users->count() === 0)
<div class="uk-padding uk-text-center uk-width-expand">
	Ничего не найдено
</div>
@else
<div class="uk-overflow-auto uk-margin">
	<table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-text-small">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Email</th>
				<th>Телефон</th>
				<th>Роль</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td class="uk-table-shrink">{{ $user->id }}</td>
				<td class="uk-width-expand uk-text-nowrap uk-table-link uk-link-reset"><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
				<td class="uk-text-nowrap">{{ $user->email }}</td>
				<td>{{ $user->profile->phone }}</td>
				<td class="uk-text-capitalize uk-table-link">
					@foreach($user->getRoleNames() as $role)
						<a href="{{ route('admin.users.index', ['filter[roles.name]' => $role]) }}" class="uk-link-reset">{{ $role }}</a>
					@endforeach					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection
@section('js')
@include('admin.users.notify')
@endsection