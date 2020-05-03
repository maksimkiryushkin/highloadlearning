@extends('layouts.layout-full-page')
@section('content')

	<h2 class="mb-4">Регистрация</h2>
	<form id="register-form" method="POST" action="/register">
		<div class="row">
			<div class="col-sm-12 col-md-11 col-lg-8 col-xl-7">

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Имя</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="name" autofocus placeholder="Ваше имя"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="lastname" class="col-sm-3 col-form-label">Фамилия</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lastname" placeholder="Фамилия"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="birthday" class="col-sm-3 col-form-label">День рождения</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="birthday" placeholder="День рождения"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="gender" class="col-sm-3 col-form-label">Пол</label>
					<div class="col-sm-9">
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="gender" id="gender-none" value="none"/>
							<label class="custom-control-label" for="gender-none">Без указания пола</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="gender" id="gender-male" value="male"/>
							<label class="custom-control-label" for="gender-male">Мужской</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="gender" id="gender-female" value="female"/>
							<label class="custom-control-label" for="gender-female">Женский</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="gender" id="gender-other" value="other"/>
							<label class="custom-control-label" for="gender-other">Другой</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="city" class="col-sm-3 col-form-label">Город</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="city" placeholder="Город"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="interests" class="col-sm-3 col-form-label">Интересы</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="interests" rows="7" placeholder="Расскажите о себе и своих увлечениях"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Ваш email</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="email" autocomplete="off" placeholder="Email (будет логином)"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-3 col-form-label">Новый пароль</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="password" autocomplete="off" placeholder="Новый пароль"/>
					</div>
				</div>

				<div class="form-group row">
					<div class="offset-sm-3 col-sm-9">
						<button type="submit" id="go-register" class="btn btn-success ld-ext-right">
							Зарегистрироваться
							<div class="ld ld-ring ld-spin-fast"></div>
						</button>
					</div>
				</div>

			</div>
		</div>
	</form>

@endsection
