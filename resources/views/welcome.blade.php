@extends('layouts.layout-top-middle-modal')
@section('content')

	<form>
		<div class="form-group">
			<input type="email" class="form-control" name="login" id="auth-login" autofocus placeholder="Email (логин)" />
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" id="auth-password" placeholder="Пароль" />
		</div>
		<button type="submit" id="auth-enter" class="btn btn-primary btn-sm btn-block">Войти</button>
	</form>
	<hr/>
	<a href="/register" class="btn btn-success btn-sm btn-block">Зарегистрироваться</a>

@endsection
