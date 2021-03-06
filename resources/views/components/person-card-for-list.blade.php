@php
    if ($isSuggest) {
		// мелкая карточка
		$cardClasses = 'friend-suggest-card';
		$cardStyle = 'width: 14rem;';
		$aboutClasses = 'small';
		$href = "/person/{$person->id}";
	} else {
		// большая карточка
		$cardClasses = 'friend-card';
		$cardStyle = 'width: 18rem;';
		$aboutClasses = 'font-weight-light';
		$href = "/friend/{$person->id}";
	}
@endphp

<a href="{!! $href !!}" class="{!! $cardClasses !!} hoverable-card card-link text-body border flex-shrink-0 flex-grow-0 rounded mr-2 mb-2 p-1" style="margin-left: 0; {!! $cardStyle !!}">
    <div class="img-top text-center"><img src="{!! asset($person->avatar) !!}" class="rounded img-thumbnail" style="width: 100%;" /></div>
    <div class="describe mt-2 p-1">
        @if($isSuggest)
            <h6 class="title">{{ $person->nameFormated() }}</h6>
        @else
            <h5 class="title">{{ $person->nameFormated() }}</h5>
        @endif
        <div class="text {!! $aboutClasses !!}">
            {{ Str::limit($person->interests, $isSuggest ? 95 : 140) }}
        </div>
        <div class="text">
            <small class="text-info" style="opacity: 0.8;">
                {{ $person->cityFormated() ?: 'No city' }} : {{ $person->age() }} {{ pluralForm($person->age(), ['год', 'года', 'лет']) }}
            </small>
        </div>
    </div>
</a>
