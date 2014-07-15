<?php
class ClientService {
	private static $dependencies = array(
		'clientGateway' => '%$FreshBooksClientGateway'
	);

	/**
	 * @var FreshBooksClientGateway
	 */
	public $clientGateway;

	/**
	 * Creates a new Client object within FreshBooks.
	 *
	 * Caution: This will create a new Client in FreshBooks with the given details (assuming all mandatory information
	 * is provided). There are limits on some accounts as to the number of clients you can have (especially on the Free
	 * plan).
	 *
	 * @todo This method should validate the client has all mandatory fields before passing on to the gateway.
	 *
	 * @param FreshBooksClient $client The Client to create
	 * @return bool true on success, false on failure
	 */
	public function createClient(FreshBooksClient $client) {
		try {
			$response = $this->clientGateway->createClient($client);
			var_dump($response);

			if(
				!$response ||
				!$response->attributes() ||
				!$response->attributes()->status ||
				$response->attributes()->status == 'fail'
			) {
				throw new FreshBooksApiException(sprintf(
					"ClientService::createClient() failed. Error code: %s, error message: '%s', error field: '%s'",
					$response->code,
					$response->error,
					$response->field
				));
			}

			return true;
		} catch(Exception $e) {
			SS_Log::log($e, SS_Log::ERR);
			return false;
		}
	}
}