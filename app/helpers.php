<?php

use Carbon\Carbon;

/**
 * @param null|string|int|Carbon $datetime
 * @param bool $useMicrotime
 * @return int|float
 */
function convertAnyToTimestamp($datetime = null, $useMicrotime = false) {
	if ($datetime === null) {
		$ts = $useMicrotime ? microtime(true) : time();
	} elseif (is_numeric($datetime)) {
		$ts = $datetime;
	} elseif ($datetime instanceof Carbon) {
		$ts = $datetime->timestamp;
	} else {
		$ts = strtotime($datetime);
	}
	return $ts;
}

/**
 * @param null|string|int|Carbon $datetime
 * @return Carbon
 */
function convertAnyToCarbon($datetime = null) {
	if ($datetime instanceof Carbon) {
		$res = $datetime;
	} else {
		$res = Carbon::createFromTimestampMs(convertAnyToTimestamp($datetime, true) * 1000);
	}
	return $res;
}

/**
 * @param string $format
 * @param null $datetime
 * @return mixed
 */
function localizeDate($format = 'd M Y', $datetime = null) {
	$ts = convertAnyToCarbon($datetime);

	static $replaces = [
		'January' => 'января', 'Jan' => 'янв',
		'February' => 'февраля', 'Feb' => 'фев',
		'March' => 'марта', 'Mar' => 'мар',
		'April' => 'апреля', 'Apr' => 'апр',
		'May' => 'мая',
		'June' => 'июня', 'Jun' => 'июн',
		'July' => 'июля', 'Jul' => 'июл',
		'August' => 'августа', 'Aug' => 'авг',
		'September' => 'сентября', 'Sep' => 'сен',
		'October' => 'октября', 'Oct' => 'окт',
		'November' => 'ноября', 'Nov' => 'ноя',
		'December' => 'декабря', 'Dec' => 'дек',

		'Monday' => 'понедельник', 'Mon' => 'пн',
		'Tuesday' => 'вторник', 'Tue' => 'вт',
		'Wednesday' => 'среда', 'Wed' => 'ср',
		'Thursday' => 'четверг', 'Thu' => 'чт',
		'Friday' => 'пятница', 'Fri' => 'пт',
		'Saturday' => 'суббота', 'Sat' => 'сб',
		'Sunday' => 'воскресенье', 'Sun' => 'вс',
	];

	return str_replace(array_keys($replaces), array_values($replaces), $ts->format($format));
}

/**
 * Функция сколонения слов по числительным правилам. Например, для number=21
 * и wordForms=['шаг', 'шага', 'шагов'] вернет "шаг"
 *
 * $wordForms = [ 1 шаг, 2 шага, 5 шагов ]
 *
 * @param $number
 * @param array $wordForms например ['шаг', 'шага', 'шагов']
 * @return string
 */
function pluralForm($number, $wordForms) {
	$count = abs($number) % 100;
	$lcount = $count % 10;
	if ($count >= 11 && $count <= 19) return $wordForms[2];
	if ($lcount >= 2 && $lcount <= 4) return $wordForms[1];
	if ($lcount == 1) return $wordForms[0];
	return $wordForms[2];
}
