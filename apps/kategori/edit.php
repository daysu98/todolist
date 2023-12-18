<?php
if (!isset($_GET['hal'])) {
  return header("location:/todolist/apps?hal=editkategori");
}

if ($_SESSION['role_id'] != 2) {
  echo "<script>window.location='/todolist/apps';</script>";
}
?>
<?php
$id   = $_GET['id'];
$show = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($show);

?>

<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"> <br>
      Form Ubah Data kategori
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form method="POST">
        <label class="block text-sm">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <span class="text-gray-700 dark:text-gray-400">Kategori </span>
          <input type="text" name="kategori" value="<?php echo $data['kategori'] ?>" required
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Masukkan Nama Lengkap" required class="form-control" />
        </label> 
        
        



        <button type="submit"
            class="block px-4 py-2 mt-6 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            style="float: right;" name="simpan">
            Save
            
        </button>
        <button class="block px-4 py-2 mt-6 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            style="float: left;" name="batal">
        <a href="/todolist/apps?hal=kategori" class="btn btn-secondary">Batal</a>
        </button>
      </form>



      <?php
      if (isset($_POST['edit'])) {
        $id       = $_POST['id'];
        $kategori     = $_POST['kategori'];
        


        $edit = mysqli_query($koneksi, 'UPDATE kategori SET kategori="' . $kategori . '"  WHERE id="' . $id . '"');


        if ($edit) {
          echo '<script>
    alert("Berhasil mengubah data kategori !");
    window.location=apps/kategori/index.php;
  </script>';
        }

      }



      ?>