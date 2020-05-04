@extends('layouts.layout-full-page-nav')
@section('content')

	<x-person-about-block :person="$user" />

	<h3 class="mb-3">Возможно, вы знаете этих людей → дружите!</h3>

	@if($suggestFriends->isEmpty())
		<div class="alert alert-info stext-center py-4 spx-5">
			Некого предложить в друзья. Извините, но вы совсем асоциальны...
		</div>
	@else
		<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">
			@foreach($suggestFriends as $person)
				<x-person-card-for-list :person="$person" :isSuggest="true" />
			@endforeach
		</div>
	@endif

	<h3 class="mt-4 mb-3">Самые активные друзья</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		У вас нет друзей...
	</div>

	<div class="friends d-flex flex-row align-items-start flex-wrap">

		<x-person-card-for-list :person="null" :isSuggest="false" />

	</div>

@endsection
