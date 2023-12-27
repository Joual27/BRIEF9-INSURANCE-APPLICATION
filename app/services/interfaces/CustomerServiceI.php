<?php



interface CustomerServiceI{
    public function getAllCustomers();
    public function getCustomerById($customerId);
    public function searchForCustomer($searchValue);
    public function addCustomer(Customer $customer);

    public function updateCustomer(Customer $customer);
    
    public function deleteCustomer($customerId);

}

?>