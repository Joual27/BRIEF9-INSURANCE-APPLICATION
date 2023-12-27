<?php


class Insurer {
    private $insurerId;
    private $brandName;
    private $email;
    private $phone;

    public function __construct() {
    }

    public function getInsurerId() {
        return $this->insurerId;
    }

    public function setInsurerId($insurerId) {
        $this->insurerId = $insurerId;
    }

    public function getBrandName() {
        return $this->brandName;
    }

    public function setBrandName($brandName) {
        $this->brandName = $brandName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}


?>