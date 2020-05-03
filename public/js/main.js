toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
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

function showSuccess(msg, delay, showProgress) {
	delay = delay || 3000;
	showProgress = showProgress || false;
	toastr.success(msg, '', { timeOut: delay, progressBar: !!showProgress });
}

function showError(msg) {
	toastr.error(msg, '', {
		progressBar: false,
		closeButton: true,
		timeOut: 0,
		extendedTimeOut: 0
	});
}

// showInfo('[info] Некая информация без заголовка');
// showSuccess('[success fast] Почти та же информация', 1500);
// showError('[error] Ошибка с крестиком, и без автоскрытия');
// showSuccess('[success] Некая информация без заголовка');

function blockElem($el) {
	if ($el.hasClass('running')) return false;
	$el.addClass('running');
	return true;
}

function unblockElem($el) {
	$el.removeClass('running');
}

function simpleSuccessHandle(D, delay, showProgress) {
	delay = delay || 2800;
	showProgress = showProgress || false;
	if (D.status !== 'success') {
		showError(D.reason);
		return;
	}
	if (D.message) {
		showSuccess(D.message, delay + 100, showProgress);
	}
	if (D.url) {
		if (D.message) {
			setTimeout(function () {
				window.location.href = D.url;
			}, delay);
		} else {
			window.location.href = D.url;
		}
	}
}

$(function () {
	const $pageBg = $('#page-bg');
	$(window).on('scroll resize', function () {
		const H = $(document).height() - $(window).height();
		const h = $pageBg.height() - $(window).height() - 1;
		const y = h / H * $(window).scrollTop();
		$pageBg.css('top', '-' + y + 'px');
	});

	$('#go-register').click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		var $btn = $(this);
		$btn.blur();
		if (!blockElem($btn)) return false;

		var $form = $('#register-form');

		// особая проверка на пустоту пароля, потому что сервер этого сделать не сможет
		if ($form.find('#password').val().length <= 0) {
			unblockElem($btn);
			showError('Пожалуйста, задайте не пустой Пароль');
			return false;
		}

		var data = {
			name: $form.find('#name').val(),
			lastname: $form.find('#lastname').val(),
			birthday: $form.find('#birthday').val(),
			gender: $form.find('input[name="gender"]:checked').val() || '',
			city: $form.find('#city').val(),
			interests: $form.find('#interests').val(),
			email: $form.find('#email').val(),
			password: MD5($form.find('#password').val()),
		};

		$.ajax({
			async: true,	// не ждем завершения
			type: $form.attr('method'),
			url: $form.attr('action'),
			dataType: 'json',
			data: data,
			cache: false,
			global: false,
			success: function (D) {
				unblockElem($btn);
				simpleSuccessHandle(D, 2800, true);
			},// success()
			error: function (jqXHR, textStatus, errorThrown) {
				unblockElem($btn);
				showError(errorThrown.length ? errorThrown : 'Возникла ошибка, попробуйте повторить операцию позже!');
			}// error()
		});

		return false;
	});

	$('#go-auth').click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		var $btn = $(this);
		$btn.blur();
		if (!blockElem($btn)) return false;

		var $form = $('#auth-form');

		var data = {
			login: $form.find('#login').val(),
			password: MD5($form.find('#password').val()),
		};

		$.ajax({
			async: true,	// не ждем завершения
			type: $form.attr('method'),
			url: $form.attr('action'),
			dataType: 'json',
			data: data,
			cache: false,
			global: false,
			success: function (D) {
				unblockElem($btn);
				simpleSuccessHandle(D, 700);
			},// success()
			error: function (jqXHR, textStatus, errorThrown) {
				unblockElem($btn);
				showError(errorThrown.length ? errorThrown : 'Возникла ошибка, попробуйте повторить операцию позже!');
			}// error()
		});

		return false;
	});

});
