toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": false,
	"progressBar": true,
	"positionClass": "toast-top-center",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "700",
	"timeOut": "3000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
};

function showInfo(msg, delay) {
	delay = delay || 3000;
	toastr.info(msg, '', { timeOut: delay });
}

function showSuccess(msg, delay) {
	delay = delay || 3000;
	toastr.success(msg, '', { timeOut: delay });
}

function showError(msg) {
	toastr.error(msg, '', {
		progressBar: false,
		closeButton: true,
		timeOut: 0,
		extendedTimeOut: 0
	});
}

$(function () {
	const $pageBg = $('#page-bg');
	$(window).on('scroll resize', function () {
		const H = $(document).height() - $(window).height();
		const h = $pageBg.height() - $(window).height() - 1;
		const y = h / H * $(window).scrollTop();
		//console.log($(window).scrollTop(), y);
		$pageBg.css('top', '-' + y + 'px');
	});

	$('#register-do').click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		this.blur();

		// showInfo('[info] Некая информация без заголовка');
		// showSuccess('[success fast] Почти та же информация, но уже с незаголовком', 1500);
		// showError('[error] Ошибка с крестиком, и без автоскрытия');
		showSuccess('[success] Некая информация без заголовка');

		return false;
	});
	
});
