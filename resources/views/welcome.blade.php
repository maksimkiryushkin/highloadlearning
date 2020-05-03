@extends('layouts.layout-top-middle-modal')
@section('content')

	@php
		$lastLogin = \App\ExecutionContext::getLastLogin();
	@endphp

	<form id="auth-form" method="POST" action="/login">
		<div class="form-group">
			<input type="email" class="form-control" name="login" id="login"
				   @if(!$lastLogin) autofocus @endif
				   placeholder="Email (логин)"
				   value="{{ $lastLogin }}"
			/>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" id="password"
				   @if($lastLogin) autofocus @endif
				   placeholder="Пароль"
			/>
		</div>
		<button type="submit" id="go-auth" class="btn btn-primary btn-sm btn-block ld-ext-right">
			Войти
			<div class="ld ld-ring ld-spin-fast"></div>
		</button>
	</form>
	<hr/>
	<a href="/register" class="btn btn-success btn-sm btn-block">Зарегистрироваться</a>

@endsection
