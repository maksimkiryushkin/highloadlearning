<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>HLL</title>
	<style>
		body {
			position: relative;
			overflow-x: hidden;
		}
		#page-bg {
			position: fixed;
			width: 100%;
			height: 110vh;
			background: url("/img/bg.jpg") top center;
			background-size: cover;
			margin: 0;
			padding: 0;
		}
		#page-holder {
			z-index: 100;
		}
	</style>
</head>
<body>

<div id="page-bg"></div>

<div id="page-holder" class="pt-3 pb-3">
	<div class="container">
		<div class="rounded" style="background-color: green; opacity: 0.4; height: 2000px;"></div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
	$(function(){
		const $pageBg = $('#page-bg');
		$(window).on('scroll resize', function () {
			const H = $(document).height() - $(window).height();
			const h = $pageBg.height() - $(window).height() - 1;
			const y = h / H * $(window).scrollTop();
			//console.log($(window).scrollTop(), y);
			$pageBg.css('top', '-'+y+'px');
		});
	});
</script>

</body>
</html>
