<?php
session_start();
if($_SESSION['status_login'] != true){
  return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist");
}

$title = '';
$page  = '';

//Users
if (isset($_GET['hal']) && $_GET['hal'] == 'users') {
   $title = 'Data User';
   $page  = './users/users.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'addusers') {
   $title = 'Tambah Data User';
   $page  = './users/add.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'editusers') {
   $title = 'Edit Data User';
   $page  = './users/edit.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'delusers') {
   $title = 'Delete Data User';
   $page  = './users/del.php';
}

//kategori
if (isset($_GET['hal']) && $_GET['hal'] == 'kategori') {
   $title = 'Data Kategori';
   $page  = './kategori/kategori.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'addkategori') {
   $title = 'Tambah Data Kategori';
   $page  = './kategori/add.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'editkategori') {
   $title = 'Edit Data Kategori';
   $page  = './kategori/edit.php';
}
elseif (isset($_GET['hal']) && $_GET['hal'] == 'delkategori') {
   $title = 'Delete Data Kategori';
   $page  = './kategori/del.php';
}

//task
elseif (isset($_GET['hal']) && $_GET['hal'] == 'task') {
   $title = 'Task';
   $page  = 'task.php';
}
else {
   $title = 'Dashboard';
   $page  = 'dashboard.php';
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>
      <?= $title ?> - Todolist
   </title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
   <script src="../assets/js/init-alpine.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
   <script src="../assets/js/charts-lines.js" defer></script>
   <script src="../assets/js/charts-pie.js" defer></script>
</head>

<body>
   <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      <?php
      require_once("../layouts/sidebar.php");
      ?>
      <div class="flex flex-col flex-1 w-full">
         <?php
         require_once("../layouts/header.php");
         ?>
         <main class="h-full overflow-y-auto">
            <?php
            include($page);
            ?>
         </main>
      </div>
   </div>
</body>

</html>