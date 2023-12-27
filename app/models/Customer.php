<?php



class Customer {
    private $customerId;
    private $firstName;
    private $familyName;
    private $CIN;
    private $address;
    private $phone;
    private $email;

    public function __construct() {
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getFamilyName() {
        return $this->familyName;
    }

    public function setFamilyName($familyName) {
        $this->familyName = $familyName;
    }

    public function getCIN() {
        return $this->CIN;
    }

    public function setCIN($CIN) {
        $this->CIN = $CIN;
    }
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}






?>