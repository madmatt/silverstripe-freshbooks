<?php
class ClientService {
	private static $dependencies = array(
		'clientGateway' => '%$FreshBooksClientGateway'
	);

	/**
	 * @var FreshBooksClientGateway
	 */
	private $clientGateway;

	public function createClient(FreshBooksClient $client) {

	}
}