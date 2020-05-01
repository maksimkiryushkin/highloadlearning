@extends('layouts.layout-full-page-nav')
@section('content')

	<x-person-about-block :person="null" :isFriend="true" />

	<h3 class="mb-3">Возможно, вы знаете друзей этого человека → дружите!</h3>

	<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">

		<x-person-card-for-list :person="null" :isSuggest="true" />

		<x-person-card-for-list :person="null" :isSuggest="true" />

	</div>

@endsection
