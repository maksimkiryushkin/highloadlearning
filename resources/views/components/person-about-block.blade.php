<div class="d-flex flex-row align-items-start flex-wrap">
    <div class="mb-4">
        <img class="d-none d-xl-block align-self-start rounded img-thumbnail mr-4" style="max-height: 400px; max-width: 450px;" src="{!! asset($person->avatar) !!}" />
        <img class="d-none d-lg-block d-xl-none align-self-start rounded img-thumbnail mr-4" style="max-height: 350px; max-width: 380px;" src="{!! asset($person->avatar) !!}" />
        <img class="d-none d-md-block d-lg-none align-self-start rounded img-thumbnail mr-4" style="max-height: 300px; max-width: 320px;" src="{!! asset($person->avatar) !!}" />
        <img class="d-none d-sm-block d-md-none align-self-start rounded img-thumbnail mr-4" style="max-height: 250px; max-width: 220px;" src="{!! asset($person->avatar) !!}" />
        <img class="d-xs-block d-sm-none align-self-start rounded img-thumbnail mr-4" style="max-height: 200px; max-width: 100%;" src="{!! asset($person->avatar) !!}" />
        @if($isMe)
            {{--no buttons yet--}}
        @elseif($isFriend)
            <div class="mt-4">
                <button type="button" class="btn btn-warning">Перестать дружить</button>
            </div>
        @else
            <div class="mt-4">
                <button type="button" class="btn btn-success">Подружиться</button>
            </div>
        @endif
    </div>
    <div class="media-body mb-4" style="max-width: 60%;">
        <h3>{{ $person->nameFormated() }}</h3>
        <div>
            <span class="text-secondary font-weight-light">День рождения:</span>
            {{ localizeDate('d M Y', $person->birthday) }}
            ({{ $person->age() }} {{ pluralForm($person->age(), ['год', 'года', 'лет']) }})
        </div>
        <div>
            <span class="text-secondary font-weight-light">Пол:</span>
            {{ mb_strtolower($person->genderFormated()) }}
        </div>
        <div>
            <span class="text-secondary font-weight-light">Город:</span>
            {{ $person->cityFormated() ?: 'N/A' }}
        </div>
        <div class="mt-3">
            {{ $person->interests }}
        </div>
    </div>
</div>
