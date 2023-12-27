<?php 



class InsuranceOfClientServiceImp implements InsuranceOfClientServiceI{
    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function addInsuranceOfClient(Customer $customer,Insurer $insurer){
        $addInsuranceOfClientQuery = "INSERT INTO insuranceofclient VALUES (:customerId , :insurerId)";
        $this->db->query($addInsuranceOfClientQuery);
        $this->db->bind(":customerId" , $customer->getCustomerId());
        $this->db->bind(":insurerId" , $insurer->getInsurerId());
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
}

?>