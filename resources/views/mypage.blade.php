@extends('layouts.layout-full-page-nav')
@section('content')

	<x-person-about-block :person="$user" />

	<h3 class="mb-3">Возможно, вы знаете этих людей → дружите!</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		Некого предложить в друзья. Извините, но вы совсем асоциальны...
	</div>

	<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">

		<x-person-card-for-list :person="null" :isSuggest="true" />

	</div>

	<h3 class="mt-4 mb-3">Самые активные друзья</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		У вас нет друзей...
	</div>

	<div class="friends d-flex flex-row align-items-start flex-wrap">

		<x-person-card-for-list :person="null" :isSuggest="false" />

	</div>

@endsection
