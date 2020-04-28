@extends('base')
@section('layout')

	{{-- по высоте: от верха экрана на всю высоту, по ширине: 100% --}}
	<div class="align-self-stretch w-100">
		<div class="rounded content-box-colors" style="min-height: 100%;">

			<nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color: #086a9b;">
				<a class="navbar-brand" style="position: relative; top: -1px;" href="/" title="Highload Learning homework project">HLL</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link active" href="/">Моя страница</a>
						<a class="nav-item nav-link" href="/friends">Друзья</a>
					</div>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								User name
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="/profile">Мой профиль</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/logout">Выйти</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<div class="px-3 py-3">

				@yield('content')

			</div>
		</div>
	</div>

@endsection
