<?php 





interface ClaimServiceI{
    public function getAllClaims();
    public function addClaim(Claim $claim);
    public function updateClaim(Claim $claim);
    public function deleteClaim($claimId);
}

?>