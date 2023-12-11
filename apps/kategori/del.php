<?php
   if(!isset($_GET['hal'])){
     return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps?hal=kategori");
   }
?>


<div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    
                   <?php
                   include('koneksi.php');
$id      = $_GET['id'];
$tampil  = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$id'");
$data    = mysqli_fetch_array($tampil);
?>

<main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            > <br>
            Hapus Data Kategori
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
<form method="POST">
  <div class="form-group">
  <div class="alert alert-danger" role="alert">
  <h6>Yakin Akan Menghapus Data Kategori <b><?php echo $data['kategori'] ?></b> ?</h6>
  <br>
    <input type="hidden" name="id" value="<?php echo $id ?>" required class="form-control">
    <button type="submit" name="hapus"
                 class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                 >
               
                 
Hapus                  
                 
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </button>
    <a href="kategori.php" class="btn btn-secondary">Batal</a>
  </div>
  </div>
    </form>
    </div>

    <?php 
    if(isset($_POST['hapus'])){ //proses hapus data kategori
      $id  = $_POST['id'];
     
      $ubah = mysqli_query($koneksi, 'DELETE FROM kategori WHERE id="'.$id.'"');
        if ($ubah){
        echo '
        <script>
        alert("Berhasil Menghapus Data kategori");
        window.location="kategori.php"; //menuju ke halaman kategori
        </script>
        ';
      }
    }
?>          
                </div>
            </div>
        </div>