<?php
$recordsPerPage = 10;

if (!isset($_GET['hal'])) {
   return header("location:/todolist/apps?hal=task");
}

if ($_SESSION['role_id'] != 2) {
   echo "<script>window.location='/todolist/apps';</script>";
}
?>
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
</head>

<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Task
   </h2>

   <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <div class="mb-8">
         <a href="?hal=addtask" style="width: fit-content;"
            class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg class="w-4 h-4 mr-2 -ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
               <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
               <g id="SVGRepo_iconCarrier">
                  <path
                     d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44771 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44772 13 7 12.5523 7 12C7 11.4477 7.44771 11 8 11H11V8Z"
                     fill="#f4f5f7"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd"
                     d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4Z"
                     fill="#f4f5f7"></path>
               </g>
            </svg>
            <span>Tambah Task</span>
         </a>
      </div>
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
         <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
               <thead>
                  <tr
                     class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                     <th class="px-4 py-3">Gambar</th>
                     <th class="px-4 py-3">Task</th>
                     <th class="px-4 py-3">Kategori</th>
                     <th class="px-4 py-3">Deadline</th>
                     <th class="px-4 py-3">Status</th>
                     <th class="px-4 py-3">Actions</th>
                  </tr>
               </thead>
               <div id="taskContent" class="w-full overflow-x-auto">
               <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php 
                  $query = mysqli_query($koneksi, "SELECT task.*, kategori.kategori, status.status FROM task JOIN kategori ON task.kategori_id = kategori.id JOIN status ON task.status_id = status.id WHERE task.user_id = $_SESSION[user_id]");
                  while ($data = mysqli_fetch_array($query)) { ?>
                     <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                           <div class="flex items-center text-sm ">
                              <!-- Avatar with inset shadow -->
                              <div class="relative hidden w-12 h-12 mr-3 rounded-full md:block">
                                 <img class="object-cover w-full h-full rounded-full" src="../uploads/<?= $data['pic'] ?>"
                                    alt="" loading="lazy" />
                                 <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                              </div>
                           </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                           <?= $data['task_name'] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                           <?= $data['kategori'] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                           <?= $data['deadline'] ?>
                        </td>
                        <td class="px-4 py-3 text-xs">
                           <?php
                           if ($data['status_id'] == 1) {
                              echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> ' . $data['status'] . ' </span>';
                           }
                           elseif ($data['status_id'] == 2) {
                              echo '<span  class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100"> ' . $data['status'] . ' </span>';
                           }
                           else {
                              echo '<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">' . $data['status'] . ' </span>';
                           }

                           ?>
                        </td>
                        <td class="px-4 py-3">
                           <div class="flex items-center space-x-4 text-sm">
                              <a href="?hal=edittask&id=<?= $data['id'] ?>"
                                 class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                 aria-label="Edit">
                                 <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                       d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                 </svg>
                              </a>
                              <form action="?hal=deltask" method="post">
                                 <input type="hidden" name="id" value="<?= $data["id"] ?>">
                                 <button type="submit" name="hapus"
                                    onclick="return confirm('Yakin ingin menghapus task <?= $data['id'] ?>?');"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                       <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                    </svg>
                                 </button>
                              </form>
                           </div>
                        </td>
                     </tr>
                     <?php
                  }
                  ?>
                  </div>
               </tbody>
            </table>
            
            <script>
            $(document).ready(function () {
                function loadPage(page) {
                    $.ajax({
                        url: '?hal=task&page=' + page,
                        type: 'GET',
                        success: function (data) {
                            $('#taskContent').html(data);
                        },
                        error: function () {
                            console.log('Error loading page');
                        }
                    });
                }
        
                // Menanggapi klik pada halaman paginasi
                $(document).on('click', '.page-link', function (e) {
                    e.preventDefault();
                    var page = $(this).text();
                    loadPage(page);
                });
            });
        </script>
        
    
    <?php 
$sqlCount = "SELECT COUNT(*) as total FROM task";
$resultCount = $koneksi->query($sqlCount);
$row = $resultCount->fetch_assoc();
$totalPages = ceil($row['total'] / $recordsPerPage);

if ($totalPages > 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $page) ? 'active' : '';
        echo "<a class='page-link $activeClass' href='#'>$i</a>";
    }
    echo '</div>';
}
?>

    
         </div>
      </div>
   </div>
   <?php
// ... (your existing code)

// Fetch tasks from the database
$query = mysqli_query($koneksi, "SELECT task.*, kategori.kategori, status.status FROM task JOIN kategori ON task.kategori_id = kategori.id JOIN status ON task.status_id = status.id WHERE task.user_id = $_SESSION[user_id]");

while ($data = mysqli_fetch_array($query)) {
    // Check if the deadline has passed
    $currentDate = date('Y-m-d');
    $deadline = $data['deadline'];

    if ($currentDate > $deadline) {
        // Update the status to "expired"
        $updateQuery = "UPDATE task SET status_id = 4 WHERE id = $data[id]";
        mysqli_query($koneksi, $updateQuery);

        // Update the $data array to reflect the updated status
        $data['status_id'] = 4;
        $data['status'] = 'Expired';
    }
    ?>
    <tr class="text-gray-700 dark:text-gray-400">
        <!-- ... (your existing code) -->
    </tr>
    <?php
}
?>


</div>