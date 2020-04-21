@extends('base')
@section('layout')

	{{-- по высоте: от верха экрана на всю высоту, по ширине: 100% --}}
	<div class="align-self-stretch w-100">
		<div class="rounded px-3 py-3 content-box-colors" style="min-height: 100%;">

			@yield('content')

		</div>
	</div>

@endsection
