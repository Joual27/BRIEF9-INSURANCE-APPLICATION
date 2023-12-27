<?php





class InsuranceServiceImp implements InsuranceServiceI{
    private $db;


    public function __construct(Database $db){
       $this->db = $db;
    }
    public function getAllInsurances(){
       $fetchInsurersQuery = "SELECT * from insurer";
       $this->db->query($fetchInsurersQuery);
       try{
        return $this->db->fetchMultipleRows();
       }
       catch(PDOException $e){
         die($e->getMessage());
       }

    }
    public function addInsurance(Insurer $insurer){
       $addInsurerQuery = "INSERT INTO insurer VALUES (:id , :brandName , :email , :phone)";
       $this->db->query($addInsurerQuery);
       $this->db->bind(":id" , $insurer->getInsurerId());
       $this->db->bind(":brandName" , $insurer->getBrandName());
       $this->db->bind(":email" , $insurer->getEmail());
       $this->db->bind(":phone" , $insurer->getPhone());
       try{
        $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }

    }
    public function updateInsurance(Insurer $insurer){
         $updateInsurerQuery = "UPDATE insurer set brandName = :brandName , email = :email , phone = :phone WHERE insurerId = :id";
         $this->db->query($updateInsurerQuery);
         $this->db->bind(":id" , $insurer->getInsurerId());
         $this->db->bind(":brandName" , $insurer->getBrandName());
         $this->db->bind(":email" , $insurer->getEmail());
         $this->db->bind(":phone" , $insurer->getPhone());
         try{
          $this->db->execute();
         }
         catch(PDOException $e){
          die($e->getMessage());
         }
    }

    public function deleteInsurer($insurerId){
        $deleteInsuranceQuery = "DELETE FROM insurer WHERE insurerId = :id";
        $this->db->query($deleteInsuranceQuery);
        $this->db->bind(":id",$insurerId);
        try{
         $this->db->execute();
        }
        catch(PDOException $e){
         die($e->getMessage());
        }
    }
}


?>