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
	 * @var int The Client's ID in FreshBooks (not a SilverStripe database ID)
	 */
	private $clientID;

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

	/**
	 * @param int $clientID
	 * @return self
	 */
	public function setClientID($clientID) {
		$this->clientID = $clientID;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getClientID() {
		return $this->clientID;
	}

	/**
	 * @param string $currencyCode
	 * @return self
	 */
	public function setCurrencyCode($currencyCode) {
		$this->currencyCode = $currencyCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCurrencyCode() {
		return $this->currencyCode;
	}

	/**
	 * @param string $email
	 * @return self
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $fax
	 * @return self
	 */
	public function setFax($fax) {
		$this->fax = $fax;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * @param string $firstName
	 * @return self
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param string $homePhone
	 * @return self
	 */
	public function setHomePhone($homePhone) {
		$this->homePhone = $homePhone;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHomePhone() {
		return $this->homePhone;
	}

	/**
	 * @param string $language
	 * @return self
	 */
	public function setLanguage($language) {
		$this->language = $language;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * @param string $lastName
	 * @return self
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param string $mobile
	 * @return self
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * @param string $notes
	 * @return self
	 */
	public function setNotes($notes) {
		$this->notes = $notes;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNotes() {
		return $this->notes;
	}

	/**
	 * @param string $organization
	 * @return self
	 */
	public function setOrganization($organization) {
		$this->organization = $organization;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrganization() {
		return $this->organization;
	}

	/**
	 * @param string $password
	 * @return self
	 */
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $primaryAddressCity
	 * @return self
	 */
	public function setPrimaryAddressCity($primaryAddressCity) {
		$this->primaryAddressCity = $primaryAddressCity;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressCity() {
		return $this->primaryAddressCity;
	}

	/**
	 * @param string $primaryAddressCode
	 * @return self
	 */
	public function setPrimaryAddressCode($primaryAddressCode) {
		$this->primaryAddressCode = $primaryAddressCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressCode() {
		return $this->primaryAddressCode;
	}

	/**
	 * @param string $primaryAddressCountry
	 * @return self
	 */
	public function setPrimaryAddressCountry($primaryAddressCountry) {
		$this->primaryAddressCountry = $primaryAddressCountry;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressCountry() {
		return $this->primaryAddressCountry;
	}

	/**
	 * @param string $primaryAddressState
	 * @return self
	 */
	public function setPrimaryAddressState($primaryAddressState) {
		$this->primaryAddressState = $primaryAddressState;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressState() {
		return $this->primaryAddressState;
	}

	/**
	 * @param string $primaryAddressStreet1
	 * @return self
	 */
	public function setPrimaryAddressStreet1($primaryAddressStreet1) {
		$this->primaryAddressStreet1 = $primaryAddressStreet1;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressStreet1() {
		return $this->primaryAddressStreet1;
	}

	/**
	 * @param string $primaryAddressStreet2
	 * @return self
	 */
	public function setPrimaryAddressStreet2($primaryAddressStreet2) {
		$this->primaryAddressStreet2 = $primaryAddressStreet2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrimaryAddressStreet2() {
		return $this->primaryAddressStreet2;
	}

	/**
	 * @param string $secondaryAddressCity
	 * @return self
	 */
	public function setSecondaryAddressCity($secondaryAddressCity) {
		$this->secondaryAddressCity = $secondaryAddressCity;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressCity() {
		return $this->secondaryAddressCity;
	}

	/**
	 * @param string $secondaryAddressCode
	 * @return self
	 */
	public function setSecondaryAddressCode($secondaryAddressCode) {
		$this->secondaryAddressCode = $secondaryAddressCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressCode() {
		return $this->secondaryAddressCode;
	}

	/**
	 * @param string $secondaryAddressCountry
	 * @return self
	 */
	public function setSecondaryAddressCountry($secondaryAddressCountry) {
		$this->secondaryAddressCountry = $secondaryAddressCountry;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressCountry() {
		return $this->secondaryAddressCountry;
	}

	/**
	 * @param string $secondaryAddressState
	 * @return self
	 */
	public function setSecondaryAddressState($secondaryAddressState) {
		$this->secondaryAddressState = $secondaryAddressState;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressState() {
		return $this->secondaryAddressState;
	}

	/**
	 * @param string $secondaryAddressStreet1
	 * @return self
	 */
	public function setSecondaryAddressStreet1($secondaryAddressStreet1) {
		$this->secondaryAddressStreet1 = $secondaryAddressStreet1;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressStreet1() {
		return $this->secondaryAddressStreet1;
	}

	/**
	 * @param string $secondaryAddressStreet2
	 * @return self
	 */
	public function setSecondaryAddressStreet2($secondaryAddressStreet2) {
		$this->secondaryAddressStreet2 = $secondaryAddressStreet2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecondaryAddressStreet2() {
		return $this->secondaryAddressStreet2;
	}

	/**
	 * @param string $username
	 * @return self
	 */
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string $vatName
	 * @return self
	 */
	public function setVatName($vatName) {
		$this->vatName = $vatName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getVatName() {
		return $this->vatName;
	}

	/**
	 * @param string $vatNumber
	 * @return self
	 */
	public function setVatNumber($vatNumber) {
		$this->vatNumber = $vatNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getVatNumber() {
		return $this->vatNumber;
	}

	/**
	 * @param string $workPhone
	 * @return self
	 */
	public function setWorkPhone($workPhone) {
		$this->workPhone = $workPhone;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getWorkPhone() {
		return $this->workPhone;
	}

	/**
	 * @return ArrayList<FreshBooksClient_Contact>
	 */
	public function getContacts() {
		if(!isset($this->contacts)) {
			$this->contacts = new ArrayList(); // Always ensure we return an ArrayList, even if there's no contacts yet
		}

		return $this->contacts;
	}
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

	/**
	 * @param string $email
	 * @return self
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $firstName
	 * @return self
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param string $lastName
	 * @return self
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param string $phone1
	 * @return self
	 */
	public function setPhone1($phone1) {
		$this->phone1 = $phone1;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone1() {
		return $this->phone1;
	}

	/**
	 * @param string $phone2
	 * @return self
	 */
	public function setPhone2($phone2) {
		$this->phone2 = $phone2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone2() {
		return $this->phone2;
	}

	/**
	 * @param string $username
	 * @return self
	 */
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}
}