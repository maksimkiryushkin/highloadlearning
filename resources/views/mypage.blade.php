@extends('layout-full-page-nav')
@section('content')

	<div class="d-flex flex-row align-items-start flex-wrap">
		<div class="mb-4">
			<img src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" style="max-height: 300px; max-width: 300px;" class="align-self-start rounded img-thumbnail mr-4" />
		</div>
		<div class="media-body mb-4" style="max-width: 60%;">
			<h3>Василиса Семёнова</h3>
			<div>
				<span class="text-secondary font-weight-light">День рождения:</span>
				23 апреля 1998 (22 года)
			</div>
			<div>
				<span class="text-secondary font-weight-light">Пол:</span>
				женский
			</div>
			<div>
				<span class="text-secondary font-weight-light">Город:</span>
				Челябинск
			</div>
			<div class="mt-3">
				This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
				This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
				This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
				This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
			</div>
		</div>
	</div>

	<h3 class="mb-3">Возможно, вы знаете этих людей → дружите!</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		Некого предложить в друзья. Извините, но вы совсем асоциальны...
	</div>

	<div class="friend-suggests d-flex flex-row flex-nowrap overflow-hidden p-1">

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

	<h3 class="mt-4 mb-3">Самые активные друзья</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		У вас нет друзей...
	</div>

	<div class="friends d-flex flex-row align-items-start flex-wrap">

		@include('person-card', ['isSuggest' => false])

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longerditional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longer below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a longer below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<p class="text">This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer. This is a lons a little bit longer.</p>
				<p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>

	</div>

@endsection
