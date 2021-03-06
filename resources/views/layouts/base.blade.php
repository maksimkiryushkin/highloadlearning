<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/toastr.min.css"/>
	<link rel="stylesheet" href="/css/loading.min.css"/>
	<link rel="stylesheet" href="/css/ldbtn.min.css"/>
	<link rel="stylesheet" href="/css/main.css?v=2"/>
	<title>HLL</title>
</head>
<body>

<div id="page-bg"></div>

<div id="page-holder" class="pt-3 pb-3 d-flex flex-row">
	<div class="container align-self-stretch d-flex flex-row">

		@yield('layout')

		{{-- по высоте: от верха экрана на всю высоту, по ширине: 100% --}}
		{{--<div class="align-self-stretch w-100">--}}
		{{--	<div class="rounded px-3 py-3 content-box-colors" style="min-height: 100%;">--}}
		{{--		Контент обычного вида на странице на всю высоту контейнера--}}
		{{--	</div>--}}
		{{--</div>--}}

		{{-- по высоте: центр экрана, по ширине: контент --}}
		{{--<div class="align-self-center w-100 d-flex flex-column">--}}
		{{--	<div class="align-self-center">--}}
		{{--		<div class="rounded px-3 py-3 content-box-colors">--}}
		{{--			контент по центру экрана, по типу модалки--}}
		{{--		</div>--}}
		{{--	</div>--}}
		{{--</div>--}}

		{{-- по высоте: верх экрана, по ширине: 100% --}}
		{{--<div class="align-self-start w-100">--}}
		{{--	<div class="rounded px-3 py-3 content-box-colors">--}}
		{{--		контент обычного вида от верха контейнера--}}
		{{--	</div>--}}
		{{--</div>--}}

		{{-- по высоте: центр экрана, по ширине: 100% --}}
		{{--<div class="align-self-center w-100">--}}
		{{--	<div class="rounded px-3 py-3 content-box-colors">--}}
		{{--		контент по центру экрана, но на полную ширину контейнера--}}
		{{--	</div>--}}
		{{--</div>--}}

	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/md5.min.js"></script>
<script src="/js/main.js?v=4"></script>

</body>
</html>
