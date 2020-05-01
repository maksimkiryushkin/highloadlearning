@php
    if ($isSuggest) {
		// мелкая карточка
		$cardClasses = 'friend-suggest-card';
		$cardStyle = 'width: 14rem;';
		$titleTag = 'h6';
		$aboutClasses = 'small';
	} else {
		// большая карточка
		$cardClasses = 'friend-card';
		$cardStyle = 'width: 18rem;';
		$titleTag = 'h5';
		$aboutClasses = 'font-weight-light';
	}
@endphp

<a href="/friend/7" class="{!! $cardClasses !!} hoverable-card card-link text-body border flex-shrink-0 flex-grow-0 rounded mr-2 mb-2 p-1" style="margin-left: 0; {!! $cardStyle !!}">
    <div class="img-top text-center"><img src="/img/male/XzA4NTE0MjIuanBn.jpg" class="rounded img-thumbnail" style="width: 100%;" /></div>
    <div class="describe mt-2 p-1">
        <{!! $titleTag !!} class="title">Пётр Семёнов</{!! $titleTag !!}>
    <div class="text {!! $aboutClasses !!}">
        {{ Str::limit('This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 100) }}
    </div>
    <div class="text"><small class="text-muted">Челябинск : 38 лет</small></div>
    </div>
</a>
