@extends('layouts.layout-full-page-nav')
@section('content')

	<h3 class="mb-3">Ваши друзья</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		У вас нет друзей...
	</div>

	<div class="friends d-flex flex-row align-items-start flex-wrap">

		<x-person-card-for-list :person="null" :isSuggest="false" />

		<x-person-card-for-list :person="null" :isSuggest="false" />

		<x-person-card-for-list :person="null" :isSuggest="false" />

	</div>

	<button type="button" class="btn btn-info btn-block">Загрузить ещё...</button>

@endsection
