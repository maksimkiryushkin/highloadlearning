@extends('layout-full-page-nav')
@section('content')

	<h3 class="smt-4 mb-3">Ваши друзья</h3>

	<div class="alert alert-info stext-center py-4 spx-5">
		У вас нет друзей...
	</div>

	<div class="friends d-flex flex-row align-items-start flex-wrap">

		<a href="/friend/7" class="friend-card hoverable-card card-link text-body border flex-shrink-0 flex-grow-0 rounded mr-2 mb-2 p-1" style="width: 18rem;">
			<div class="img-top text-center"><img src="/img/male/XzA4NTE0MjIuanBn.jpg" class="rounded img-thumbnail" style="width: 100%;" /></div>
			<div class="describe mt-2 p-1">
				<h5 class="title">Пётр Семёнов</h5>
				<div class="text font-weight-light">
					{{ Str::limit('This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 100) }}
				</div>
				<div class="text"><small class="text-muted">Челябинск : 38 лет</small></div>
			</div>
		</a>

		@include('person-card', ['isSuggest' => false])

		<div class="friend-card flex-shrink-0 flex-grow-0 rounded mr-2 mb-2" style="width: 14rem; border: 1px solid gray;">
			<div class="img-top" style="height: 50px; background-color: #999999;">AVKA</div>
			<div class="describe">
				<h5 class="title">Card title</h5>
				<div class="text">This is a longerditional content. This content is a little bit longer.</div>
				<div class="text"><small class="text-muted">Last updated 3 mins ago</small></div>
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

	<button type="button" class="btn btn-info btn-block">Загрузить ещё...</button>

@endsection
