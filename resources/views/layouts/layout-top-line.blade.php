@extends('layouts.base')
@section('layout')

	{{-- по высоте: верх экрана, по ширине: 100% --}}
	<div class="align-self-start w-100">
		<div class="rounded px-3 py-3 content-box-colors">

			@yield('content')

		</div>
	</div>

@endsection
