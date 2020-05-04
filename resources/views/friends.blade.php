@extends('layouts.layout-full-page-nav')
@section('content')

	<h3 class="mb-3">Ваши друзья</h3>

	@if($friends->isEmpty())
		<div class="alert alert-info stext-center py-4 spx-5">
			У вас нет друзей...
		</div>
	@else
		<div id="js-friends-container" class="friends d-flex flex-row align-items-start flex-wrap">
			@include('friends-list', ['friends' => $friends])
		</div>
		@if($hasMore)
			<button type="button" id="btn-load-more-friends" class="btn btn-info btn-block ld-ext-right">
				Загрузить ещё...
				<div class="ld ld-ring ld-spin-fast"></div>
			</button>
		@endif
	@endif

@endsection
