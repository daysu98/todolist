<?php
if (!isset($_GET['hal']) || !isset($_GET['id'])) {
   return header("location:/todolist/apps?hal=task");
}

if ($_SESSION['role_id'] != 2) {
   echo "<script>window.location='/todolist/apps';</script>";
}
?>

<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Edit Task
   </h2>
   <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800" style="margin-right: 7%; margin-left: 7%; ">
      <?php
      $query = mysqli_query($koneksi, "SELECT task.*, kategori.kategori, status.status FROM task JOIN kategori ON task.kategori_id = kategori.id JOIN status ON task.status_id = status.id WHERE task.id = $_GET[id]");
      $data  = mysqli_fetch_array($query);
      ?>
      <form method="POST" enctype="multipart/form-data">
         <div class="flex gap-6 items-center justify-center">
            <!-- Avatar with inset shadow -->
            <div class="relative rounded-full">
               <img class="object-cover rounded-full" style="width: 100px; height: 100px;"
                  src="../uploads/<?= $data['pic'] ?>" alt="" loading="lazy" />
               <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
            </div>
            <label class="block text-sm">
               <span class="text-gray-700 dark:text-gray-400">Gambar</span>
               <input type="file"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="pic" accept="image/*" />
            </label>
         </div>
         <label class="block text-sm  mt-4">
            <span class="text-gray-700 dark:text-gray-400">Judul Task</span>
            <input type="text"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               placeholder="Masukkan judul task..." name="task_name" value="<?= $data['task_name'] ?>" />
         </label>
         <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
               Kategori
            </span>
            <select name="kategori_id"
               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
               <option value="" selected disabled>Pilih Kategori</option>
               <?php
               $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE user_id = $_SESSION[user_id]");
               while ($kategori = mysqli_fetch_array($query)) {
                  ?>
                  <option value="<?= $kategori['id'] ?>" <?= (($data['kategori_id'] == $kategori['id']) ? 'selected' : '') ?>>
                     <?= $kategori['kategori'] ?>
                  </option>
                  <?php
               }
               ?>
            </select>
         </label>
         <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">Deadline</span>
            <input type="date"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               name="deadline" value="<?= $data['deadline'] ?>" />
         </label>
         <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
               Status
            </span>
            <select name="status_id"
               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
               <option value="" selected disabled>Pilih Kategori</option>
               <?php
               $query = mysqli_query($koneksi, "SELECT * FROM status");
               while ($status = mysqli_fetch_array($query)) {
                  ?>
                  <option value="<?= $status['id'] ?>" <?= (($data['status_id'] == $status['id']) ? 'selected' : '') ?>>
                     <?= $status['status'] ?>
                  </option>
                  <?php
               }
               ?>
            </select>
         </label>

         <!-- You should use a button here, as the anchor is only used for the example  -->
         <button type="submit"
            class="block px-4 py-2 mt-6 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            style="float: right;" name="simpan">
            Simpan
         </button>
      </form>
   </div>
</div>

<?php
if (isset($_POST['simpan'])) {
   $pic        = $_FILES['pic'];
   $task       = $_POST['task_name'];
   $kategoriId = $_POST['kategori_id'];
   $deadline   = $_POST['deadline'];
   $statusId   = $_POST['status_id'];

   if (empty($task)) {
      echo "<script>alert('Task tidak boleh kosong!!!')</script>";
   }
   elseif (empty($kategoriId)) {
      echo "<script>alert('Kategori tidak boleh kosong!!!')</script>";
   }
   elseif (empty($deadline)) {
      echo "<script>alert('Deadline tidak boleh kosong!!!')</script>";
   }
   else {

      $upload_dir = "../uploads/";

      if (!file_exists($upload_dir)) {
         mkdir($upload_dir, 0777, true);
      }

      if (!empty($pic)) {
         # code...
         $allowed_types = ["image/jpeg", "image/png"];
         $gambar_mime   = mime_content_type($pic['tmp_name']);

         if (!in_array($gambar_mime, $allowed_types)) {
            echo "<script>alert('Tipe gambar tidak diizinkan.')</script>";
         }

         $gambar_ext      = pathinfo($pic['name'], PATHINFO_EXTENSION);
         $new_gambar_name = uniqid() . "." . $gambar_ext;

         $destination = $upload_dir . $new_gambar_name;
         move_uploaded_file($pic['tmp_name'], $destination);
         unlink($upload_file_directory . '/' . $data['pic']);
      } else {
         $pic = $data['pic'];
      }

      $query = mysqli_query($koneksi, "UPDATE kategori SET task_name=' $task ' , pic=' $pic ' , kategori_id= $kategoriId  , deadline=' $deadlin', status_id= $statusId  WHERE id= $data[id] ");
      if ($query) {
         session_start();
         echo '<script>
                     alert("Task Berhasil Diubah.");
                     window.location="/todolist/apps/?hal=task";
                  </script>';
      }
      else {
         echo "<script>alert('Terjadi Kesalahan!')</script>";
      }
   }
}
?>