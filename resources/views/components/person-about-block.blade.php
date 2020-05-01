<div class="d-flex flex-row align-items-start flex-wrap">
    <div class="mb-4">
        <img class="d-none d-xl-block align-self-start rounded img-thumbnail mr-4" style="max-height: 400px; max-width: 450px;" src="/img/anonymous_female.png" />
        <img class="d-none d-lg-block d-xl-none align-self-start rounded img-thumbnail mr-4" style="max-height: 350px; max-width: 380px;" src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" />
        <img class="d-none d-md-block d-lg-none align-self-start rounded img-thumbnail mr-4" style="max-height: 300px; max-width: 320px;" src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" />
        <img class="d-none d-sm-block d-md-none align-self-start rounded img-thumbnail mr-4" style="max-height: 250px; max-width: 220px;" src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" />
        <img class="d-xs-block d-sm-none align-self-start rounded img-thumbnail mr-4" style="max-height: 200px; max-width: 100%;" src="https://avatars.mds.yandex.net/get-pdb/1907041/41decff0-0bb9-4f1f-9d4a-56a9c70304f0/s1200?webp=false" />
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
        <h3>Василиса Семёнова</h3>
        <div>
            <span class="text-secondary font-weight-light">День рождения:</span>
            23 апреля 1998 (22 года)
        </div>
        <div>
            <span class="text-secondary font-weight-light">Пол:</span>
            женский
        </div>
        <div>
            <span class="text-secondary font-weight-light">Город:</span>
            Челябинск
        </div>
        <div class="mt-3">
            This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
        </div>
    </div>
</div>
