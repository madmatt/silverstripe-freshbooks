<?php
abstract class FreshBooksBaseGateway extends Object {
	/**
	 * @var string The base URL for the FreshBooks API. Set in _config/freshbooks.yml. Includes the {subdomain} param,
	 *             set in {@link self::setupClient()}.
	 * @config
	 */
	private static $base_url;

	/**
	 * @var string The API token, to be used to connect to the FreshBooks API. Set in your site-specific config.yml.
	 * @see self::setupClient();
	 * @config
	 */
	private static $api_token;

	/**
	 * @var string The subdomain for your FreshBooks account. For example, this might be 'example', and is part of the
	 *             URL for your FreshBooks account (https://example.freshbooks.com). Set in your own YML config file.
	 * @config
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
	 * @param string     $method The method name to request/submit data to (e.g. if $this->gatewayName is 'invoice',
	 *                           then $method could be 'get', 'list' etc.). Method may be dot-notated (e.g. lines.add).
	 * @param array|null [$args] An array of arguments to be passed in for this request.
	 * @return \GuzzleHttp\Message\ResponseInterface|null Either a Response-style object, or null if there was an error
	 *
	 */
	public function call($method, $args = null) {
		$this->setupClient();

		try {
			$request = $this->client->createRequest('GET', null, array(
				'auth' => array(
					$this->config()->api_token,
					'' // Password not required (see http://developers.freshbooks.com/authentication-2/#TokenBased)
				),
				'body' => SSViewer::execute_template('FreshBooksXMLRequest', new ArrayData(array(
						'GatewayName' => $this->gatewayName,
						'MethodName'  => $method,
						'Args' => (is_array($args) ? new ArrayData($args) : null)
				)))
			));

			$this->extend('updateRequest', $method, $request);
			$response = $this->client->send($request);

			// TODO Test response, log as error/debug

			return $response->xml();
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
	private function setupClient() {
		if(!is_null($this->client)) return; // We already have a \GuzzleHttp\Client setup

		if(!$this->config()->subdomain || !$this->config()->base_url) {
			throw new \FreshBooksApiException(
				"You need to specify your FreshBooks sub-domain (and base domain, if overwritten) in a YML fragment,"
					. " then ?flush=1 to clear the manifest. See documentation in README.md."
			);
		}

		if(!$this->config()->api_token) {
			throw new \FreshBooksApiException(
				"You need to specify your FreshBooks API token in a YML fragment, then ?flush=1 to clear the manifest."
					. " See documentation in README.md."
			);
		}

		$this->client = new \GuzzleHttp\Client(array(
			'base_url' => array(
				$this->config()->base_url,
				array(
					'subdomain' => $this->config()->subdomain
				)
			)
		));
	}
}