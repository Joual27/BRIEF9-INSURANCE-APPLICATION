<?php



class ClaimServiceImp implements ClaimServiceI{

    private Database $db;


    public function __construct(Database $db){
        $this->db = $db;
    }
    public function getAllClaims(){
       $fetchClaimsQuery = "SELECT * FROM claim JOIN article ON claim.articleId = article.articleId ";
       $this->db->query($fetchClaimsQuery);
       try{
        return $this->db->fetchMultipleRows();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }
    public function addClaim(Claim $claim){
      $addClaimQuery = "INSERT INTO claim VALUES (:id , :desc , :articleId) ";
      $this->db->query($addClaimQuery);
      $this->db->bind(":id",$claim->getClaimId());
      $this->db->bind(":desc",$claim->getDescription());
      $this->db->bind(":articleId",$claim->getArticle()->getArticleId());

      try{
        $this->db->execute();
      }
      catch(PDOException $e){
        die($e->getMessage());
      }
    }
    public function updateClaim(Claim $claim){
       $updateClaimQuery = "UPDATE claim SET description = :desc WHERE claimId = :id";
       $this->db->query($updateClaimQuery);
       $this->db->bind(":desc" ,$claim->getDescription());
       $this->db->bind(":id" ,$claim->getClaimId());
       try{
        $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
      }
    }
    public function deleteClaim($claimId){
       $deleteClaimQuery = "DELETE FROM claim WHERE claimId = :id";
       $this->db->query($deleteClaimQuery);
       $this->db->bind(":id" ,$claimId);
       try{
        $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
      }
    }
}

?>