@extends('layouts.layout-full-page-nav')
@section('content')

	<x-person-about-block :person="$person" :isFriend="$isFriend" />

	<h3 class="mb-3">Возможно, вы знаете друзей этого человека → дружите!</h3>

	@if($suggestFriends->isEmpty())
		<div class="alert alert-info stext-center py-4 spx-5">
			@if($isFriend)
				Упс! У человека нет друзей, кроме вас...
			@else
				Упс! У человека нет друзей...
			@endif
		</div>
	@else
		<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">
			@foreach($suggestFriends as $person)
				<x-person-card-for-list :person="$person" :isSuggest="true" />
			@endforeach
		</div>
	@endif

@endsection
