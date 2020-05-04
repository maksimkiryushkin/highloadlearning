@foreach($friends as $person)
	<x-person-card-for-list :person="$person" :isSuggest="false" />
@endforeach
