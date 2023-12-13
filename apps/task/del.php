<?php
if (!isset($_GET['hal'])) {
   return header("location:/todolist/apps?hal=task");
}

if ($_SESSION['role_id'] != 2) {
   echo "<script>window.location='/todolist/apps';</script>";
}

if (isset($_POST['hapus'])) { //proses hapus data kategori
   $id = $_POST['id'];

   $selectQuery = mysqli_query($koneksi, "SELECT * FROM task WHERE id=$id");
   $data        = mysqli_fetch_array($selectQuery);
   unlink($upload_file_directory . '/'. $data['pic']);
   $deleteQuery = mysqli_query($koneksi, "DELETE FROM task WHERE id=$id");
   if ($deleteQuery) {
      echo '
        <script>
            alert("Satu data task berhasil dihapus");
            window.location="/todolist/apps?hal=task"; 
        </script>
        ';
   }
}
?>