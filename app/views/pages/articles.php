
<?php  
 require APPROOT . '/views/incFile/header.php'; 
 require APPROOT . '/views/incFile/sidebar.php'; 

 ?>

<main class="my-[3rem] w-[100%]">
   

   <div class="w-[80%] ml-[15%] ">
        <div class="flex justify-between" >
            <div class="my-[1rem]">
                <p class='font-semibold text-[1.3rem] text-violet-500'>ARTICLES DASHBOARD</p>
            </div>
            <div class="my-[1rem]">
                <button class="py-[0.6rem] px-[1.2rem] bg-violet-500 text-white font-semibold rounded-lg" id="showArticleForm">+ Add Article</a></button>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md my-[2rem]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black dark:text-white h-[50px]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TITLE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CONTENT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            HOLDER
                        </th>
                        <th scope="col" class="px-6 py-3">
                            INSURANCE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody id="articles">
                
                </tbody>           
            </table>
        </div>

   </div>

   <div class="absolute w-[100%] h-[100%] bg-gray-500 inset-0 bg-opacity-50 backdrop-filter backdrop-blur-md flex justify-center items-center hidden" id="addArticleForm">
     <form method="POST" class="pb-[2rem] pt-[0.7rem] w-[30%] bg-gray-50 flex flex-col gap-[20px] rounded-xl" id="articleForm">
        <div class="w-[90%] mx-auto flex justify-end">
            <img src="<?= URLROOT?>/pics/close.png" alt="" class="w-[35px] h-[35px] cursor-pointer" id="closeBtn">
        </div>
        <div class="w-[100%] mb-[1rem]">
            <p class="text-center text-[1.2rem] font-medium text-violet-500">Add Article Form</p>
        </div>
        <div class="w-[100%]">
            <input type="text"  id="title" placeholder="enter The Title" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p id="firstNameError" class="text-red-500 font-medium ml-[15%]"></p>
        </div>
       
        <div>
            <input type="text" id="content" placeholder="enter Article's content" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
            <p class="text-red-500 font-medium  ml-[15%]" id="phoneError"></p>
        </div>
        <div>
            <select  id="holder" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
                <option value="">Select Article's Holder</option>
            </select>
        </div>
        <div>
            <select  id="insurance" class="bg-violet-100 px-[0.4rem] py-[0.5rem] rounded-lg w-[70%] ml-[15%] focus:outline-none font-medium">
                <option value="">Select Article's Insurance</option>
            </select>
        </div>
        <div class="w-[100%] flex justify-center mt-[1rem]">
            <input  type="submit" class="bg-violet-500 text-white w-[20%] mx-auto py-[0.4rem] rounded-lg cursor-pointer" id="addArticleBtn" value="Submit">
        </div>
        <div class="w-[100%] flex justify-center mt-[1rem]">
            <input type="button" class="bg-violet-500 text-white w-[20%] mx-auto py-[0.4rem] rounded-lg cursor-pointer hidden editBtn" id="updateArticleBtn"  value="Update">
        </div>
        <div>
             <p id="articleError" class="text-red-500 font-medium  ml-[15%]"></p>
        </div>
     </form>
   </div>
</main>


<?php 
 require APPROOT . '/views/incFile/insuranceFooter.php'; 
?>
