
$(function () {
	const $pageBg = $('#page-bg');
	$(window).on('scroll resize', function () {
		const H = $(document).height() - $(window).height();
		const h = $pageBg.height() - $(window).height() - 1;
		const y = h / H * $(window).scrollTop();
		//console.log($(window).scrollTop(), y);
		$pageBg.css('top', '-' + y + 'px');
	});
});
