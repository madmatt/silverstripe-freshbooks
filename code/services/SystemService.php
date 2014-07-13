<?php
class SystemService {
	private static $dependencies = array(
		'systemGateway' => '%$FreshBooksSystemGateway'
	);

	/**
	 * @var FreshBooksSystemGateway
	 */
	private $systemGateway;
}