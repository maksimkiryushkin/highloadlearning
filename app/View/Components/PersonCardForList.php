<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PersonCardForList extends Component {

	public $person;
	public $isSuggest;

	public function __construct($person, $isSuggest) {
		$this->person = $person;
		$this->isSuggest = $isSuggest;
	}

	public function render() {
		return view('components.person-card-for-list');
	}

}
