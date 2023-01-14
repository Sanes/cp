@extends('admin.base')
@section('title')
{{ $user->name }}
@endsection
@section('content')
<div uk-grid>
	<div class="uk-width-expand@m">
		<h4>{{ $user->name }}</h4>
	</div>
	<div class="uk-width-auto">
		@include('admin.users.menu')
	</div>
</div>
<div class="uk-grid-medium" uk-grid>
	<div class="uk-width-1-2@l">		
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-expand" uk-leader>ID</div>
		    <div>{{ $user->id }}</div>
		</div>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-expand" uk-leader>Email</div>
		    <div>{{ $user->email }}</div>
		</div>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-expand" uk-leader>Телефон</div>
		    <div>{{ $user->profile->phone }}</div>
		</div>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-expand" uk-leader>Роль</div>
		    <div class="uk-text-capitalize">
				@foreach($user->getRoleNames() as $role)
					{{ $role }}
				@endforeach				    	
		    </div>
		</div>
	</div>
	<div class="uk-width-1-2@l">	
		@isset($user->profile->about)
		<h5 class="uk-margin-small">Дополнительно</h5>
		<div class="uk-background-muted uk-padding-small uk-text-small">
			{{ $user->profile->about }}
		</div>
		@endisset
		@isset($user->profile->note)
		<h5 class="uk-margin-small">Заметка</h5>
		<div class="uk-background-muted uk-padding-small uk-text-small">
			{{ $user->profile->note }}
		</div>
		@endisset
	</div>
</div>
<div class="uk-margin">
	<ul class="uk-iconnav">
	    <li><a href="{{ route('admin.users.edit', $user->id) }}" class="uk-icon-button" uk-icon="icon: file-edit"></a></li>
    @if(auth()->user()->id !== $user->id && $user->id !== 1)
	    <li><a href="{{ route('admin.users.impersonate', $user->id) }}" class="uk-icon-button" uk-icon="icon: sign-in"></a></li>
	    <li><a onclick="destroyUser('{{ $user->id }}', '{{ $user->name }}');" class="uk-icon-button" uk-icon="icon: trash"></a></li>
    @endif
	</ul>	
</div>
<form action="{{ route('admin.users.destroy', $user->id) }}" method="post" id="destroy">
    @method('DELETE')
    @csrf
    <input type="hidden" name="profile" value="1">
</form> 
@endsection
@section('js')
<script>
    function destroyUser(id, name){
        let confirmDestroy = confirm('Удалить пользователя ' + name + '?');
        let destroyForm = document.getElementById('destroy');
        if (confirmDestroy) {
            destroyForm.submit();
        }
    } 	
</script>
@include('admin.users.notify')
@endsection