<?php
class FreshBooksClientGateway extends FreshBooksBaseGateway {
	public function __construct() {
		parent::__construct('client');
	}

	public function createClient(FreshBooksClient $client) {
		return $this
			->setTemplate('FreshBooksClientGateway_createUpdateClient')
			->call('create', array(
				'Client' => $client
			));
	}
}