<?php
   if(!isset($_GET['hal'])){
     return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps?hal=kategori");
   }
?>
<?php
include ('koneksi.php');
$id = $_GET['id'];
$show = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($show);

?>

 <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            > <br>
            Form Ubah Data kategori
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form method="POST">
              <label class="block text-sm">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                <input type="text" name="nama" value="<?php echo $data['nama']  ?>" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Nama Lengkap" required class="form-control"
                />
              </label> <br>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input type="text" name="username" value="<?=  $data['username'] ?>" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Username" required class="form-control"
                />
              </label> <br>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Telp</span>
                <input type="number" name="tlp" value="<?=  $data['tlp'] ?>" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Telp" required class="form-control"
                />
              </label>
             <br>
           

           
                <button type="submit" name="edit"
                 class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                 >
               
                 
save                  
                 
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </button>
             
                
    <a href="kategori.php" class="btn btn-secondary">Batal</a>
 </form>



 <?php
 include('koneksi.php');
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $tlp = $_POST['tlp'];


  $edit = mysqli_query($koneksi , 'UPDATE kategori SET nama="'.$nama.'" , username="'.$username.'" , password="'.$password.'" , tlp="'.$tlp.'" WHERE id="'.$id.'"');


  if($edit){
    echo'<script>
    alert("Berhasil mengubah data kategori !");
    window.location="kategori.php";
  </script>';
  }

}



?>