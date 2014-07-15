<?php
class FreshBooksSystemGateway extends FreshBooksBaseGateway {
	public function __construct() {
		parent::__construct('system');
	}

	/**
	 * Normally, we would call this the name of the method, but `current` is a reserved keyword in PHP, so we can't.
	 *
	 * @return SimpleXMLElement|null
	 */
	public function getSystem() {
		return $this->call('current');
	}
}