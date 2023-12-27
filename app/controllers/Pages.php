<?php

    class Pages extends Controller{
        public $userModel;
        public function __construct()
        {

        }
        public function dashboard() {
            $data = [
                "page" => "customers"
            ];
            $this->view('pages/dashboard',$data);
        }

        public function getAllCustomers(){
            $db = new Database();
            $customerService = new CustomerServiceImp($db);
            $customers = $customerService->getAllCustomers();
            echo json_encode($customers);
        }

        public function search(){
            if(isset($_REQUEST["search"])){
                $search =  $_REQUEST["search"] . '%';
                $db = new Database();
                $customerService = new CustomerServiceImp($db);
                $customerService->searchForCustomer($search);
            }
        }

        public function deleteCustomer(){
            if(isset($_POST["delete"])){
                $id = $_POST["id"];
                $db = new Database();
                $customerService = new CustomerServiceImp($db);
                $customerService->deleteCustomer($id);
                
                echo json_encode($customerService->getAllCustomers());
            }
        }

        public function editCustomer(){
            if(isset($_POST["edit"])){
                $id = $_POST["id"];
                $firstName = $_POST["firstName"];
                $familyName = $_POST["familyName"];
                $cin = $_POST["cin"];
                $adress = $_POST["adress"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];

                $customerToUpdate = new Customer();
                $customerToUpdate->setCustomerId($id);
                $customerToUpdate->setFirstName($firstName);
                $customerToUpdate->setFamilyName($familyName);
                $customerToUpdate->setCIN($cin);
                $customerToUpdate->setAddress($adress);    
                $customerToUpdate->setPhone($phone);    
                $customerToUpdate->setEmail($email);    
                $db = new Database();
                $customerService = new CustomerServiceImp($db);
                try{
                    $customerService->updateCustomer($customerToUpdate);
                    $customers = $customerService->getAllCustomers();
                    echo json_encode($customers);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }

        public function addCustomer(){
            if(isset($_POST["add"])){
                $id = uniqid();
                $firstName = $_POST["firstName"];
                $familyName = $_POST["familyName"];
                $cin = $_POST["cin"];
                $adress = $_POST["adress"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $insurerId = $_POST["insurer"];
                $brandName = $_POST["brandName"];

                $customerToAdd = new Customer();
                $customerToAdd->setCustomerId($id);
                $customerToAdd->setFirstName($firstName);
                $customerToAdd->setFamilyName($familyName);
                $customerToAdd->setCIN($cin);
                $customerToAdd->setAddress($adress);
                $customerToAdd->setPhone($phone);
                $customerToAdd->setEmail($email);

                $insurerOfCustomer = new Insurer();
                $insurerOfCustomer->setInsurerId($insurerId);
                $db = new Database();
                $customerService = new CustomerServiceImp($db);
                $insuranceOfClientService = new InsuranceOfClientServiceImp($db);

                try{
                    $customerService->addCustomer($customerToAdd);
                    $insuranceOfClientService->addInsuranceOfClient($customerToAdd,$insurerOfCustomer);
                    $customer_row = '
                    <tr class="odd:bg-white odd:dark:bg-white  even:dark:bg-slate-100 text-gray-500 font-medium">
                    <td scope="col" class="px-6 py-3">
                        '.$id.'                   
                     </td>
                    <td scope="col" class="px-6 py-3">
                        '.$firstName.'     
                    </td>
                    <td scope="col" class="px-6 py-3">
                         '.$familyName.'   
                    </td>
                    <td scope="col" class="px-6 py-3">
                         '.$cin.'     
                    </td>
                    <td scope="col" class="px-6 py-3">
                         '.$adress.'        
                    </td>
                    <td scope="col" class="px-6 py-3">
                         '.$phone.'   
                    </td>
                    <td scope="col" class="px-6 py-3">
                         '.$email.'     
                    </td>
                    <td scope="col" class="px-6 py-3>
                         '.$brandName.'     
                    </td>
                    <td scope="col" class="px-6 py-3 flex gap-[10px]>
                        <img src="http://localhost/insurance-app/pics/edit.png" class="w-[30px] h-[30px] edit cursor-pointer" data-id="'.$id.' " alt="">
                        <img src="http://localhost/insurance-app/pics/delete.png" class="w-[30px] h-[30px] delete cursor-pointer" data-id="'.$id.' " alt="">
                    </td>
                </tr>
                    
                    ';
                    echo json_encode($customer_row);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }


        public function insurances(){
            $data = [
                "page" => "insurances"
            ];
            $this->view("pages/insurances",$data);
        }

        public function getAllInsurances(){
           $db = new Database();
           $insuranceService = new InsuranceServiceImp($db);

           try{
             $insurances = $insuranceService->getAllInsurances();
             echo json_encode($insurances);
           }
           catch(PDOException $e){
            die($e->getMessage());
           }
        }

        public function addInsurance(){
            if(isset($_POST["add"])){
                $id = uniqid();
                $brandName = $_POST["brandName"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];

                $insuranceToAdd = new Insurer();
                $insuranceToAdd->setInsurerId($id);
                $insuranceToAdd->setBrandName($brandName);
                $insuranceToAdd->setPhone($phone);
                $insuranceToAdd->setEmail($email);

                $db = new Database();
                $insuranceService = new InsuranceServiceImp($db);

                try{
                    $insuranceService->addInsurance($insuranceToAdd);
                    $insurances = $insuranceService->getAllInsurances();
                    echo json_encode($insurances);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }

        }

        public function updateInsurance(){
            if(isset($_POST["edit"])){
                $id = $_POST["id"];
                $brand = $_POST["brandName"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];

                $insuranceToUpdate = new Insurer();
                $insuranceToUpdate->setInsurerId($id);
                $insuranceToUpdate->setBrandName($brand);
                $insuranceToUpdate->setPhone($phone);
                $insuranceToUpdate->setEmail($email);

                $db = new Database();
                $insuranceService = new InsuranceServiceImp($db);

                try{
                    $insuranceService->updateInsurance($insuranceToUpdate);
                    $insurances = $insuranceService->getAllInsurances();
                    echo json_encode($insurances);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }

        public function deleteInsurance(){
            if(isset($_POST["delete"])){
                $id = $_POST['id'];
                $db = new Database();
                $insuranceService = new InsuranceServiceImp($db);
                try{
                    $insuranceService->deleteInsurer($id);
                    $insurances = $insuranceService->getAllInsurances();
                    echo json_encode($insurances);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }


        public function articles(){
            $data = [
                "page" => "articles"
            ];
            $this->view("pages/articles",$data);
        }

        public function getAllArticles(){
            $db = new Database();
            $articleService = new ArticleServiceImp($db);
            try{
                $articles = $articleService->getAllArticles();
                echo json_encode($articles);
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
        }

        public function addArticle(){
            if(isset($_POST["add"])){
                $id = uniqid();
                $title = $_POST["title"];
                $content = $_POST["content"];
                $customerId = $_POST["customerId"];
                $insurerId = $_POST["insurerId"];

                $customer = new Customer();
                $customer->setCustomerId($customerId);

                $insurer = new Insurer();
                $insurer->setInsurerId($insurerId);

                $articleToAdd = new Article();
                $articleToAdd->setArticleId($id);
                $articleToAdd->setTitle($title);
                $articleToAdd->setContent($content);
                $articleToAdd->setCustomer($customer);
                $articleToAdd->setInsurer($insurer);

                $db = new Database();
                $articleService = new ArticleServiceImp($db);

                try{
                    $articleService->addArticle($articleToAdd);
                    $articles = $articleService->getAllArticles();
                    echo json_encode($articles);
                }
                catch(PDOException $e){
                    die($e->getPrevious());
                }
            }
        }

        public function updateArticle(){
            if(isset($_POST["edit"])){
                $id = $_POST["id"];
                $title = $_POST["title"];
                $content = $_POST["content"];

                $articleToUpdate = new Article();
                $articleToUpdate->setArticleId($id);
                $articleToUpdate->setTitle($title);
                $articleToUpdate->setContent($content);

                $db = new Database();
                $articleService = new ArticleServiceImp($db);

                try{
                    $articleService->updateArticle($articleToUpdate);
                    $articles = $articleService->getAllArticles();
                    echo json_encode($articles);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }

        public function deleteArticle(){
            if(isset($_POST["delete"])){
                $id = $_POST["id"];
                $db = new Database();
                $articleService = new ArticleServiceImp($db);

                try{
                    $articleService->deleteArticle($id);
                    $articles = $articleService->getAllArticles();
                    echo json_encode($articles);
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }
    }