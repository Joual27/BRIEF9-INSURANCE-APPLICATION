<?php




class CustomerServiceImp implements CustomerServiceI{
    private $db;

    public function __construct(Database $db){
       $this->db = $db;
    }

    public function getAllCustomers(){
        $fetchCustomersQuery = "SELECT
        i.insurerId AS insurer_id,
        i.brandName AS insurer_brand,
        i.phone AS insurer_phone,
        i.email AS insurer_email,
        c.customerId AS customer_id,
        c.firstName AS customer_firstName,
        c.familyName AS customer_familyName,
        c.cin AS customer_cin,
        c.adress AS customer_adress,
        c.phone AS customer_phone,
        c.email AS customer_email
    FROM
        insurer i
    JOIN
        insuranceofclient ic ON i.insurerId = ic.insurerId
    JOIN
        customer c ON c.customerId = ic.customerId;
    ";
        $this->db->query($fetchCustomersQuery);
        try{
           return $this->db->fetchMultipleRows();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function searchForCustomer($searchValue){
        $searchQuery = "SELECT * FROM customer WHERE firstName LIKE :searchValue OR familyName LIKE :searchValue OR CIN LIKE :searchValue";
        $this->db->query($searchQuery);
        $this->db->bind(":searchValue",$searchValue);
        try{
            $result = $this->db->fetchMultipleRows();
            echo json_encode($result);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function getCustomerById($customerId){

    }
    public function addCustomer(Customer $customer){
       $addCustomerQuery = "INSERT INTO customer VALUES (:id,:firstName,:familyName,:cin,:adress,:phone,:email)";
       $this->db->query($addCustomerQuery);
       $this->db->bind(":id", $customer->getCustomerId());
       $this->db->bind(":firstName", $customer->getFirstName());
       $this->db->bind(":familyName", $customer->getFamilyName());
       $this->db->bind(":cin", $customer->getCIN());
       $this->db->bind(":adress", $customer->getAddress());
       $this->db->bind(":phone", $customer->getPhone());
       $this->db->bind(":email", $customer->getEmail());
       try{
          $this->db->execute();
       }
       catch(PDOException $e){
          die($e->getMessage());
       }  
    }

    public function updateCustomer(Customer $customer){
       $updateCustomerQuery = "UPDATE customer SET firstName = :firstName , familyName = :familyName , CIN = :cin , adress = :adress , phone = :phone , email = :email WHERE customerId = :customerId";
       $this->db->query($updateCustomerQuery);
       $this->db->bind(":firstName",$customer->getFirstName());
       $this->db->bind(":familyName",$customer->getFamilyName());
       $this->db->bind(":cin",$customer->getCIN());
       $this->db->bind(":adress",$customer->getAddress());
       $this->db->bind(":phone",$customer->getPhone());
       $this->db->bind(":email",$customer->getEmail());
       $this->db->bind(":customerId",$customer->getCustomerId());
       try{
        $this->db->execute();
       }
       catch(PDOException $e){
         die($e->getMessage());
       }


    }

    public function deleteCustomer($customerId){
       $deleteCustomerQuery = "DELETE FROM customer WHERE customerId = :customerId";
       $this->db->query($deleteCustomerQuery);
       $this->db->bind(":customerId",$customerId);
       try{
        $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }

}

?>