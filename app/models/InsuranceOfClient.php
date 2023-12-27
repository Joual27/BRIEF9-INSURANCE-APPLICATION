<?php


class InsuranceOfClient{
    private Customer $customer;
    private Insurer $insurer;

    public function __construct(){

    }
    public function getCustomer(){
        return $this->customer;
    }
    public function setCustomer(Customer $customer){
         $this->customer = $customer;
    }
    public function getInsurer(){
        return $this->insurer;
    }
    public function setInsurer(Insurer $insurer){
        $this->insurer = $insurer;
    }

}


?>