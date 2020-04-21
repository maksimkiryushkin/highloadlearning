@extends('base')
@section('layout')

	{{-- по высоте: центр экрана, по ширине: 100% --}}
	<div class="align-self-center w-100">
		<div class="rounded px-3 py-3 content-box-colors">

			@yield('content')

		</div>
	</div>

@endsection
