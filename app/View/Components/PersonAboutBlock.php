<?php

namespace App\View\Components;

use App\ExecutionContext;
use App\User;
use Illuminate\View\Component;

class PersonAboutBlock extends Component {

	/** @var User */
	public $person;

	public $isMe;
	public $isFriend;

	/**
	 * @param User $person
	 * @param bool $isFriend
	 */
	public function __construct($person, $isFriend = false) {
		$me = ExecutionContext::getUser();

		$this->person = $person ?: new User();
		$this->isMe = $me && ($this->person->id == $me->id);
		$this->isFriend = (bool)$isFriend;
	}

	public function render() {
		return view('components.person-about-block');
	}

}
