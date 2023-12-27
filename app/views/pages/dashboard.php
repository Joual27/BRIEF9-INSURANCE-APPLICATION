
<?php  
 require APPROOT . '/views/incFile/header.php'; 
 require APPROOT . '/views/incFile/sidebar.php'; 

 ?>

<main class="my-[3rem] w-[100%]">
   

   <div class="w-[80%] ml-[15%] ">
        <div class="flex justify-between" >
            <div class="my-[1rem]">
                <p class='font-semibold text-[1.3rem] text-violet-500'>Customers Dashboard</p>
            </div>
            <div class="my-[1rem]">
                <button class="py-[0.6rem] px-[1.2rem] bg-violet-500 text-white font-semibold rounded-lg" id="showAddCustomerForm"><a href="<?php echo URLROOT ?>/admin/addUser">+ Add Customer</a></button>
            </div>
        </div>
        <div class="font-semibold flex w-[100%]">
            <input id="searchCustomers" type="text" placeholder="search for customer" class="py-[0.6rem] px-[0.3rem] rounded-lg bg-slate-100 focus:outline-none">
        </div>
        <div class="relative overflow-x-auto shadow-md my-[2rem]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="customersTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black dark:text-white h-[50px]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FIRST NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FAMILY NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CIN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ADRESS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PHONE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EMAIL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            INSURER
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody id="searchResult">
                    
                </tbody>           
            </table>
        </div>

   </div>

   <div class="absolute w-[100%] h-[100%] bg-gray-500 inset-0 bg-opacity-50 backdrop-filter backdrop-blur-md flex justify-center items-center hidden" id="addCustomerForm">
     <form method="POST" class="pb-[2rem] pt-[0.7rem] w-[30%] bg-gray-50 flex flex-col gap-[20px] rounded-xl" id="customerForm">
        <div class="w-[90%] mx-auto flex justify-end">
            <img src="<?= URLROOT?>/pics/close.png" alt="" class="w-[35px] h-[35px] cursor-pointer" id="closeBtn">
        </div>
        <div class="w-[100%] mb-[1rem]">
            <p class="text-center text-[1.2rem] font-medium text-violet-500">Add Customer Form</p>
        </div>
        <div class="w-[100%]">
            <input type="text" name="firstName" id="firstName" placeholder="enter Your First Name" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p id="firstNameError" class="text-red-500 font-medium ml-[15%]"></p>
        </div>
        <div>
            <input type="text" name="familyName" id="familyName" placeholder="enter Your Family Name" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p class="text-red-500 font-medium  ml-[15%]" id="familyNameError"></p>
        </div>
        <div>
            <input type="text" name="CIN" id="cin" placeholder="enter Your CIN" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p class="text-red-500 font-medium  ml-[15%]" id="cinError"></p>
        </div>
        <div>
            <input type="text" name="Adress" id="adress" placeholder="enter Your Adress" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
        </div>
        <div>
            <input type="text" name="phone" id="phone" placeholder="enter Your Phone Number" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p class="text-red-500 font-medium  ml-[15%]" id="phoneError"></p>
        </div>
        <div>
            <input type="text" name="email" id="email" placeholder="enter Your email" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p class="text-red-500 font-medium  ml-[15%]" id="emailError"></p>
        </div>
        <div>
            <select id="insurer" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
                <option value="">Select Your Insurer</option>
            </select>
            <p class="text-red-500 font-medium  ml-[15%]" id="emailError"></p>
        </div>
        <div class="w-[100%] flex justify-center mt-[1rem]">
            <input name="submitBtn" type="submit" class="bg-violet-500 text-white w-[20%] mx-auto py-[0.4rem] rounded-lg cursor-pointer" id="submit" value="Submit">
        </div>
        <div class="w-[100%] flex justify-center mt-[1rem]">
            <input type="button" class="bg-violet-500 text-white w-[20%] mx-auto py-[0.4rem] rounded-lg cursor-pointer hidden editCustomerBtn"  value="Update">
        </div>
        <div>
             <p id="error" class="text-red-500 font-medium  ml-[15%]"></p>
        </div>
     </form>
   </div>
</main>

<?php 
 require APPROOT . '/views/incFile/footer.php'; 
?>
