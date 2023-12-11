<?php
   if(!isset($_GET['hal'])){
     return header("location: http://" . $_SERVER['HTTP_HOST'] . "/todolist/apps?hal=kategori");
   }
?>

<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Kategori
   </h2>
   <center>
   <div clas="col-md-3">
      <a href='./kategori/add.php'
        class="flex px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">

        Tambah Kategori

       
      </a>
    </div>

    <br>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr 
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class=text-center class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Kategori</th>
              <th class="px-4 py-3">Actions</th>
              


            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">

              <?php
                            include('../config/koneksi.php');
                                $tampil = mysqli_query($koneksi,"SELECT * FROM kategori");
                            while ($data = mysqli_fetch_array($tampil)) {


                                ?>

            <tr style="text-transform:capitalize;"
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="text-center"><?php echo $data['id']; ?></th>

              <td>
                <p class="px-4 py-3 text-sm"><?php echo $data['kategori']; ?></p>
              </td>

              
              <td>
                
                                  
                                
                        <div class="flex items-center space-x-1 text-sm">  
                                <a href="edit.php?&id=<?=$data['id']?>">
                                
                                 
                        
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button></a>
                          


                          
                                <a href="del.php?&id=<?=$data['id']?>">                       <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                              ></path>
                            </svg>
                          </button></i></a>

                                    
                                    

              </td>
            </tr>
            <?php
                            }
                            ?>

            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <?php
if(isset($_GET['']))

?>
   </center>
</div>