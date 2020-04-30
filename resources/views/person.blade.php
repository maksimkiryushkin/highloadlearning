@extends('layout-full-page-nav')
@section('content')

	<div class="d-flex flex-row align-items-start flex-wrap">
		<div class="mb-4">
			<img src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" style="max-height: 300px; max-width: 300px;" class="align-self-start rounded img-thumbnail mr-4" />
			@if($isFriend)
				<div class="mt-4">
					<button type="button" class="btn btn-warning">Перестать дружить</button>
				</div>
			@else
				<div class="mt-4">
					<button type="button" class="btn btn-success">Подружиться</button>
				</div>
			@endif
		</div>
		<div class="media-body mb-4" style="max-width: 60%;">
			описание человека
			This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
		</div>
	</div>

	<h3 class="mb-3">Возможно, вы знаете друзей этого человека → дружите!</h3>

	<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">

		<a href="/friend/7" class="friend-suggest-card hoverable-card card-link text-body border flex-shrink-0 flex-grow-0 rounded mr-2 mb-2 p-1" style="width: 14rem;">
			<div class="img-top text-center"><img src="/img/male/XzA4NTE0MjIuanBn.jpg" class="rounded img-thumbnail" style="width: 100%;" /></div>
			<div class="describe mt-2 p-1">
				<h6 class="title">Пётр Семёнов</h6>
				<div class="text small">
					{{ Str::limit('This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 100) }}
				</div>
				<div class="text"><small class="text-muted">Челябинск : 38 лет</small></div>
			</div>
		</a>

		@include('person-card', ['isSuggest' => true])

		<div class="friend-suggest-card flex-shrink-0 flex-grow-0 rounded mr-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-suggest-card flex-shrink-0 flex-grow-0 rounded mr-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longerditional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-suggest-card flex-shrink-0 flex-grow-0 rounded mr-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longer below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-suggest-card flex-shrink-0 flex-grow-0 rounded mr-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-suggest-card flex-shrink-0 flex-grow-0 rounded mr-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

	</div>

@endsection
