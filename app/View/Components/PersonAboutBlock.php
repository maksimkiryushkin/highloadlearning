<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PersonAboutBlock extends Component {

	public $person;
	public $isMe;
	public $isFriend;

	public function __construct($person, $isFriend = null) {
		$this->person = $person;
		$this->isMe = true;
		$this->isFriend = (bool)$isFriend;
	}

	public function render() {
		dump($this->person);
		return view('components.person-about-block');
	}

}
