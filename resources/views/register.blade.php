@extends('layout-full-page')
@section('content')

	<h2 class="mb-4">Регистрация</h2>
	<form>
		<div class="row">
			<div class="col-sm-12 col-md-11 col-lg-8 col-xl-7">

				<div class="form-group row">
					<label for="register-name" class="col-sm-3 col-form-label">Имя</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="register-name" autofocus placeholder="Ваше имя"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="register-lastname" class="col-sm-3 col-form-label">Фамилия</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="register-lastname" placeholder="Фамилия"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="register-birthday" class="col-sm-3 col-form-label">День рождения</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="register-birthday" placeholder="День рождения"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="register-gender" class="col-sm-3 col-form-label">Пол</label>
					<div class="col-sm-9">
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="register-gender" id="register-gender-none" value="none"/>
							<label class="custom-control-label" for="register-gender-none">Без указания пола</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="register-gender" id="register-gender-male" value="male"/>
							<label class="custom-control-label" for="register-gender-male">Мужской</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="register-gender" id="register-gender-female" value="female"/>
							<label class="custom-control-label" for="register-gender-female">Женский</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="custom-control-input" type="radio" name="register-gender" id="register-gender-other" value="other"/>
							<label class="custom-control-label" for="register-gender-other">Другой</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="register-city" class="col-sm-3 col-form-label">Город</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="register-city" placeholder="Город"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="register-interests" class="col-sm-3 col-form-label">Интересы</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="register-interests" rows="4" placeholder="Расскажите о себе и своих увлечениях"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="offset-sm-3 col-sm-9">
						<button type="submit" id="register-do" class="btn btn-success">Зарегистрироваться</button>
					</div>
				</div>

			</div>
		</div>
	</form>

@endsection
