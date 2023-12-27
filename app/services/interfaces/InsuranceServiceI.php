<?php





interface InsuranceServiceI{
     
    public function getAllInsurances();
    public function addInsurance(Insurer $insurer);
    public function updateInsurance(Insurer $insurer);

    public function deleteInsurer($insurerId);
    

}



?>