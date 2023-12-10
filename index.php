<?php
session_start();
if($_SESSION['status_login'] == true){
  return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps");
}

$title = '';
$page  = '';

if (isset($_GET['hal']) && $_GET['hal'] == 'register') {
   $title = 'Register';
   $page  = 'register.php';

   if (isset($_POST['btn_register'])) {
      $username        = $_POST['username'];
      $email           = $_POST['email'];
      $password        = $_POST['password'];
      $confirmPassword = $_POST['confirm_password'];

      if (empty($username)) {
         echo "<script>alert('Username tidak boleh kosong!!!')</script>";
      }
      elseif (empty($email)) {
         echo "<script>alert('Email tidak boleh kosong!!!')</script>";
      }
      elseif (empty($password)) {
         echo "<script>alert('Password tidak boleh kosong!!!')</script>";
      }
      elseif ($confirmPassword != $password) {
         echo "<script>alert('Konfirmasi password tidak sama!!!')</script>";
      }
      else {
         require_once('./config/koneksi.php');

         $password = md5($password);

         $query = mysqli_query($koneksi, "INSERT INTO users (username, email, password, role_id) VALUES ('$username', '$email', '$password', '2')");
         if ($query) {
            session_start();
            echo "<script>alert('Akun berhasil dibuat.')</script>";
            header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist");
         }
         else {
            echo "<script>alert('Username atau Password salah!')</script>";
         }
      }
   }
}
else {
   $title = 'Login';
   $page  = 'login.php';

   if (isset($_POST['btn_login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username)) {
         echo "<script>alert('Username tidak boleh kosong!!!')</script>";
      }
      elseif (empty($password)) {
         echo "<script>alert('Password tidak boleh kosong!!!')</script>";
      }
      else {
         require_once('./config/koneksi.php');

         $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . md5($password) . "'");
         if (mysqli_num_rows($query) > 0) {
            $data_login = mysqli_fetch_array($query);
            session_start();
            $_SESSION['status_login'] = true;
            $_SESSION['user_id'] = $data_login['id'];
            header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps");
         }
         else {
            echo "<script>alert('Username atau Password salah!')</script>";
         }
      }
   }
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
   <link rel="stylesheet" href="assets/css/tailwind.output.css" />
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
   <script src="assets/js/init-alpine.js"></script>
</head>

<body>
   <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
         <?php
         include($page);
         ?>
      </div>
   </div>
</body>

</html>