@extends('base')
@section('layout')

	{{-- по высоте: центр экрана, по ширине: контент --}}
	<div class="align-self-center w-100 d-flex flex-column">
		<div class="align-self-center">
			<div class="rounded px-3 py-3 content-box-colors">

				@yield('content')

			</div>
		</div>
	</div>

@endsection
