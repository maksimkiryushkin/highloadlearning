@extends('layouts.layout-full-page-nav')
@section('content')

	<h3 class="mb-4">Ваш профиль</h3>
	<form id="profile-form" method="PUT" action="/profile">
		<div class="row">
			<div class="col-sm-12 col-md-11 col-lg-8 col-xl-7">

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Имя</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="name" placeholder="Ваше имя" value="{{ $user->first_name }}"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="lastname" class="col-sm-3 col-form-label">Фамилия</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lastname" placeholder="Фамилия" value="{{ $user->last_name }}" />
					</div>
				</div>
				<div class="form-group row">
					<label for="birthday" class="col-sm-3 col-form-label">День рождения</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" id="birthday" placeholder="День рождения" value="{{ $user->birthday }}" />
					</div>
				</div>
				<div class="form-group row">
					<label for="gender" class="col-sm-3 col-form-label">Пол</label>
					<div class="col-sm-9">
						@foreach(\App\User::GENDERS as $key => $val)
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="gender"
									   id="gender-{{ $key }}"
									   @if($user->gender == $key) checked @endif
									   value="{{ $key }}"
								/>
								<label class="custom-control-label" for="gender-{{ $key }}">{{ $val }}</label>
							</div>
						@endforeach
					</div>
				</div>
				<div class="form-group row">
					<label for="city" class="col-sm-3 col-form-label">Город</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="city" placeholder="Город" value="{{ $user->cityFormated() }}" />
					</div>
				</div>
				<div class="form-group row">
					<label for="interests" class="col-sm-3 col-form-label">Интересы</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="interests" rows="7" placeholder="Расскажите о себе и своих увлечениях">{{ $user->interests }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Ваш email</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="email" autocomplete="off" placeholder="Email (будет логином)" value="{{ $user->email }}" />
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-3 col-form-label">Новый пароль</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="password" autocomplete="off" placeholder="Новый пароль" />
					</div>
				</div>

				<div class="form-group row">
					<div class="offset-sm-3 col-sm-9">
						<button type="submit" id="save-profile" class="btn btn-success ld-ext-right">
							Сохранить изменения
							<div class="ld ld-ring ld-spin-fast"></div>
						</button>
					</div>
				</div>

			</div>
		</div>
	</form>

@endsection
