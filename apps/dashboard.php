

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
  </head>
   <style>
            body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        #getStartedButton {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ff3366;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #getStartedButton:hover {
            background-color: #cc0044;
        }
    </style>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
     
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      
     
      <div class="flex flex-col flex-1 w-full">
        
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
           <br>
           <br>
           <br>
            <!-- CTA -->
            
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
 <?php
// Assuming $userId contains the ID of the currently logged-in user
$userId = $_SESSION['user_id']; // You may need to adjust this based on your authentication mechanism

$query = "SELECT COUNT(*) AS totalTasks
          FROM task
          JOIN users ON task.user_id = users.id
          WHERE task.status_id != '6' AND task.status_id != '1' AND users.id = '$userId'";

// Assuming you have established a database connection before this
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if ($result) {
    // Fetch the total number of tasks
    $row = mysqli_fetch_assoc($result);
    $totalTasks = $row['totalTasks'];

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query failed
    $totalTasks = 0;
}
?>



<!-- Now you can use $totalTasks in your HTML code -->
<div>
    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Task
    </p>
    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        <?php echo $totalTasks; ?>
    </p>
</div>

              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
                fill-rule="evenodd"
                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                clip-rule="evenodd"
            ></path>
        </svg>
    </div>
    <?php
         if (isset($_SESSION['user_id'])) {
                  // Assign the user ID to the variable
                  $loggedInUserId = $_SESSION['user_id'];
                }
        // Assuming $loggedInUserId is the ID of the currently logged-in user

$query = "SELECT * FROM task 
          INNER JOIN users ON task.user_id = users.id 
          WHERE task.status_id = '1' AND task.user_id = '$loggedInUserId'";

// Perform the query
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if ($result) {
    // Get the total number of tasks
    $totalDone = mysqli_num_rows($result);

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query failed
    $totalDone = 0;
}
    ?>

    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Finish
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php echo number_format($totalDone); ?>
        </p>
    </div>
</div>

              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <?php
         if (isset($_SESSION['user_id'])) {
                  // Assign the user ID to the variable
                  $loggedInUserId = $_SESSION['user_id'];
                }
        // Assuming $loggedInUserId is the ID of the currently logged-in user

$query = "SELECT * FROM task 
          INNER JOIN users ON task.user_id = users.id 
          WHERE task.status_id = '3' AND task.user_id = '$loggedInUserId'";

// Perform the query
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if ($result) {
    // Get the total number of tasks
    $totalDone = mysqli_num_rows($result);

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query failed
    $totalDone = 0;
}
    ?>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Not Yet 
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php echo number_format($totalDone); ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <?php
        
                
                if (isset($_SESSION['user_id'])) {
                  // Assign the user ID to the variable
                  $loggedInUserId = $_SESSION['user_id'];
                }
        // Assuming $loggedInUserId is the ID of the currently logged-in user

$query = "SELECT * FROM task 
          INNER JOIN users ON task.user_id = users.id 
          WHERE task.status_id = '6' AND task.user_id = '$loggedInUserId'";

// Perform the query
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if ($result) {
    // Get the total number of tasks
    $totalDone = mysqli_num_rows($result);

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query failed
    $totalDone = 0;
}

    ?>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Expired
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php echo number_format($totalDone); ?>
                  </p>
                </div>
              </div>
            </div>

           
            <!-- New Table -->
           


            <!-- Charts -->
           
           
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
