<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0  w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-black">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/dashboard.png" alt="">
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
               <a href="<?php echo URLROOT?>pages/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer <?php if($data["page"] == "customers"){ echo 'bg-gray-600' ;} ?>">
                      <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/profile.png" alt="">
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Customers</span>
               </a>
         </li>
         <li>
            <a href="<?php echo URLROOT?>pages/insurances" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer <?php if($data["page"] == "insurances"){ echo 'bg-gray-600' ;} ?>">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/insurance.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Insurances</span>
            </a>
         </li>
         <li>
            <a href="<?php echo URLROOT?>pages/articles" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer <?php if($data["page"] == "articles"){ echo 'bg-gray-600' ;} ?>">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/car.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Articles</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/claim.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Claims</span>
            </a>
         </li>
         <li>
            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/money.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Premiums</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/logout.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
