<?php
if (!isset($_GET['hal'])) {
   return header("location:/todolist/apps?hal=edituser");
}

if ($_SESSION['role_id'] != 1) {
   echo "<script>window.location='/todolist/apps';</script>";
}
?>

<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Edit Data User
   </h2>
   <center>
      <p class="dark:text-gray-200">Selamat Datang di aplikasi Todolist</p>
   </center>
</div>