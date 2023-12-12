<?php
   if(!isset($_GET['hal'])){
     return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps?hal=addkategori"); 
   }
?>

<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add Kategori
   </h2> 
   <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
           
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form method="POST">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                <input type="text" name="kategori" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Masukkan Kategori Baru" required class="form-control"
                />
              </label> <br>
              
             <br>
           

           
                <button type="submit" name="simpan"
                 class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                 >
               
                 
save                  
                 
                    <path
                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                  </svg>
                </button>
             
                
    <a href="/todolist/apps?hal=kategori" class="btn btn-secondary">Batal</a>
 </form>


    <?php
    include('../config/koneksi.php');
    if(isset($_POST['simpan'])){ //proses simpan data kategori
      $kategori = $_POST['kategori'];
      

      $simpan = mysqli_query($koneksi, 'INSERT INTO kategori
      (kategori) VALUES 
      ("'.$kategori.'")');
      if ($simpan){
        echo '
        <script>
        alert("Berhasil Menambah Data Kategori");
        window.location=apps/kategori/index.php; //menuju ke halaman kategori
        </script>
        ';
      }
    }
?>
              