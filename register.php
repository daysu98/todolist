<?php
if (!isset($_GET['hal'])) {
   return header("location:/todolist?hal=register");
}
?>

<div class="flex flex-col overflow-y-auto md:flex-row">
   <div class="h-32 md:h-auto md:w-1/2">
      <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
         src="./assets/img/create-account-office.jpeg" alt="Office" />
      <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
         src="./assets/img/create-account-office-dark.jpeg" alt="Office" />
   </div>
   <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
         <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Create account
         </h1>
         <form method="POST">
            <label class="block text-sm">
               <span class="text-gray-700 dark:text-gray-400">Username</span>
               <input type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="example_123" name="username" />
            </label>
            <label class="block mt-4 text-sm">
               <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
               <input type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="John Elbert" name="nama" />
            </label>
            <label class="block mt-4 text-sm">
               <span class="text-gray-700 dark:text-gray-400">Email</span>
               <input type="email"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="example@mail.com" name="email" />
            </label>
            <label class="block mt-4 text-sm">
               <span class="text-gray-700 dark:text-gray-400">Password</span>
               <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="***************" type="password" name="password" />
            </label>
            <label class="block mt-4 text-sm">
               <span class="text-gray-700 dark:text-gray-400">
                  Confirm password
               </span>
               <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="***************" type="password" name="confirm_password" />
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit"
               class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
               name="btn_register">
               Create account
            </button>
         </form>

         <hr class="mt-4 mb-2" />

         <center>
            <p class="dark:text-gray-200">
               Sudah memiliki akun?
               <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="/todolist">
                  Login
               </a>
            </p>
         </center>
      </div>
   </div>
</div>