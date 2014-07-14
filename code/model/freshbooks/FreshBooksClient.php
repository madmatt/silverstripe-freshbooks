<?php
class FreshBooksClient extends FreshBooksViewableData {
	private static $casting = array(
		'FirstName'               => 'Varchar',
		'LastName'                => 'Varchar',
		'Organization'            => 'Varchar',
		'Email'                   => 'Varchar',
		'Username'                => 'Varchar',
		'Password'                => 'Varchar',
		'WorkPhone'               => 'Varchar',
		'HomePhone'               => 'Varchar',
		'Mobile'                  => 'Varchar',
		'Fax'                     => 'Varchar',
		'Language'                => 'Varchar',
		'CurrencyCode'            => 'Varchar',
		'Notes'                   => 'Text',
		'PrimaryAddressStreet1'   => 'Varchar',
		'PrimaryAddressStreet2'   => 'Varchar',
		'PrimaryAddressCity'      => 'Varchar',
		'PrimaryAddressState'     => 'Varchar',
		'PrimaryAddressCountry'   => 'Varchar',
		'PrimaryAddressCode'      => 'Varchar',
		'SecondaryAddressStreet1' => 'Varchar',
		'SecondaryAddressStreet2' => 'Varchar',
		'SecondaryAddressCity'    => 'Varchar',
		'SecondaryAddressState'   => 'Varchar',
		'SecondaryAddressCountry' => 'Varchar',
		'SecondaryAddressCode'    => 'Varchar',
		'VatName'                 => 'Varchar',
		'VatNumber'               => 'Varchar',
	);

	/**
	 * @var string Client's first name
	 */
	private $firstName;

	/**
	 * @var string Client's surname
	 */
	private $lastName;

	/**
	 * @var string Organization this client represents (free-text)
	 */
	private $organization;

	/**
	 * @var string Email address for this client
	 */
	private $email;

	/**
	 * @var string Username for this client. The FreshBooks API defines the default for this as 'first name + last name'
	 */
	private $username;

	/**
	 * @var string Password for this client.
	 *
	 * Note: Not used when this client has been created from the FreshBooks API, but if it's set when a client is
	 * created, it will be sent to FreshBooks, and created with the given password.
	 */
	private $password;

	/**
	 * @var ArrayList<FreshBooksClient_Contact> A list of all contacts for this client.
	 * @see FreshBooksClient_Contact This object defines the fields set for this client contact.
	 */
	private $contacts;

	/**
	 * @var string Work Phone Number (may include country code, brackets etc. so not a pure number)
	 */
	private $workPhone;

	/**
	 * @var string Home Phone Number (may include country code, brackets etc. so not a pure number)
	 */
	private $homePhone;

	/**
	 * @var string Mobile Phone Number (may include country code, brackets etc. so not a pure number)
	 */
	private $mobile;

	/**
	 * @var string Fax Number (may include country code, brackets etc. so not a pure number)
	 */
	private $fax;

	/**
	 * @var string Two-character language code (e.g. 'en')
	 * @todo Where is this list defined? Doesn't seem to be possible to pull this from the FreshBooks API anywhere.
	 */
	private $language;

	/**
	 * @var string The currency code for this client. (e.g. 'USD')
	 * @todo Where is this list defined? Doesn't seem to be possible to pull this from the FreshBooks API anywhere.
	 */
	private $currencyCode;

	/**
	 * @var string Private notes for this client (not visible to the client themselves)
	 */
	private $notes;

	/**
	 * @var string Address Line 1 for the primary address (e.g. Apartment 4, 312 Fake Street)
	 */
	private $primaryAddressStreet1;

	/**
	 * @var string Address Line 2 for the primary address (e.g. Nottingham)
	 */
	private $primaryAddressStreet2;

	/**
	 * @var string City for the primary address
	 */
	private $primaryAddressCity;

	/**
	 * @var string State (if any) for the primary address
	 */
	private $primaryAddressState;

	/**
	 * @var string Country for the primary address
	 */
	private $primaryAddressCountry;

	/**
	 * @var string Zip/Postal Code for the primary address
	 */
	private $primaryAddressCode;

	/**
	 * @var string Address Line 1 for the secondary address (e.g. Apartment 4, 312 Fake Street)
	 */
	private $secondaryAddressStreet1;

	/**
	 * @var string Address Line 2 for the secondary address (e.g. Nottingham)
	 */
	private $secondaryAddressStreet2;

	/**
	 * @var string City for the secondary address
	 */
	private $secondaryAddressCity;

	/**
	 * @var string State (if any) for the secondary address
	 */
	private $secondaryAddressState;

	/**
	 * @var string Country for the secondary address
	 */
	private $secondaryAddressCountry;

	/**
	 * @var string Zip/Postal Code for the secondary address
	 */
	private $secondaryAddressCode;

	/**
	 * @var string The VAT/Tax name for this client
	 */
	private $vatName;

	/**
	 * @var string The VAT/Tax number for this client (while this is generally a number, it could be anything).
	 */
	private $vatNumber;
}

class FreshBooksClient_Contact extends FreshBooksViewableData {
	private static $casting = array(
		'Email'     => 'Varchar',
		'FirstName' => 'Varchar',
		'LastName'  => 'Varchar',
		'Username'  => 'Varchar',
		'Phone1'    => 'Varchar',
		'Phone2'    => 'Varchar'
	);

	/**
	 * @var string The email address for this client contact.
	 * @required This is the only required field for a client contact - all others are optional.
	 */
	private $email;

	/**
	 * @var string The first name for this client contact
	 */
	private $firstName;

	/**
	 * @var string The surname for this client contact
	 */
	private $lastName;

	/**
	 * @var string The username for this client contact.
	 */
	private $username;

	/**
	 * @var string The primary phone number for this client contact.
	 */
	private $phone1;

	/**
	 * @var string The secondary phone number for this client contact.
	 */
	private $phone2;
}