<?php
abstract class FreshBooksBaseGateway extends Object {
	/**
	 * @var string The base URL for the FreshBooks API. Set in _config/freshbooks.yml. Includes the {subdomain} param,
	 *             set in {@link self::setupClient()}.
	 */
	private static $base_url;

	/**
	 * @var string The subdomain for your FreshBooks account. For example, this might be 'example', and is part of the
	 *             URL for your FreshBooks account (https://example.freshbooks.com). Set in your own YML config file.
	 */
	private static $subdomain;

	/**
	 * @var string The gateway name (e.g. 'system'). Combined with the method name (e.g. 'current') when requesting.
	 */
	protected $gatewayName;

	/**
	 * @var GuzzleHttp\Client The Guzzle client that sends requests and returns responses for this gateway
	 */
	protected $client;

	/**
	 * @param string $gatewayName The base gateway name for this gateway.
	 */
	public function __construct($gatewayName) {
		$this->gatewayName = $gatewayName;
	}

	/**
	 * @param string $method The method name to request/submit data to (e.g. if $this->gatewayName is 'invoice', then
	 *                       $method could be 'get', 'list' etc.). The method may be dot-notated (e.g. lines.add).
	 * @param array  [$args] An array of arguments to be passed in for this request.
	 * @return \GuzzleHttp\Message\ResponseInterface|null Either a Response-style object, or null if there was an error
	 *
	 */
	public function call($method, $args = array()) {
		$this->setupClient($method);

		try {
			$request = $this->client->createRequest('GET', sprintf("%s.%s", $this->gatewayName, $method));
			$this->extend('updateRequest', $method, $request);

			$response = $this->client->send($request);

			// TODO Test response, log as error/debug

			return $response;
		} catch(\GuzzleHttp\Exception\RequestException $e) {
			// TODO Log error, using $e->getRequest(), and if($e->hasResponse()), then also $e->getResponse()
		} catch(\Exception $e) {
			// TODO Log generic error
		}

		return null;
	}

	/**
	 * Sets up the {@link \GuzzleHttp\Client} object for this request.
	 */
	private function setupClient($method) {
		if(!self::$subdomain || !self::$base_url) {
			throw new \FreshBooksApiException(
				"You need to specify your FreshBooks subdomain in a YML fragment. See documentation in README.md."
			);
		}

		$this->client = new \GuzzleHttp\Client(array(
			'base_url' => array(
				self::$base_url,
				array(
					'subdomain' => self::$subdomain
				)
			)
		));
	}
}