<?php 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

//create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
  echo "Connection was successful<br>";
}

//delete data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
  $delete_id = $_POST['delete_id'];
  $delete_sql = "DELETE FROM register WHERE id = $delete_id";
  if (mysqli_query($conn, $delete_sql)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
}

//update
// $sql = "UPDATE `register` SET genre='Non-fiction' WHERE id=6";

// if (mysqli_query($conn, $sql)) {
//     echo "Record updated successfully<br>";
// } else {
//     echo "Error updating record: " . mysqli_error($conn) . "<br>";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Book Records</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 mt-8">
        <div class="p-6 sm:p-12">
          <div class="flex justify-between items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">Book Records</h1>
            <button onclick="window.location.href = 'index.html'" class="px-4 py-2 bg-green-500 text-white rounded-lg">Add New Record</button>
          </div>
          <div class="overflow-x-auto mt-8">
            <table class="w-full table-fixed">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Title</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Author</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Genre</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Publication Date</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch records from the database
                $sql = "SELECT * FROM register";
                $result = mysqli_query($conn, $sql);

                // Check if there are records
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='px-6 py-2'>" . $row["title"] . "</td>";
                        echo "<td class='px-6 py-2'>" . $row["author"] . "</td>";
                        echo "<td class='px-6 py-2'>" . $row["genre"] . "</td>";
                        echo "<td class='px-6 py-2'>" . $row["publication_date"] . "</td>";
                        echo "<td class='px-6 py-2'>
                                <button class='px-4 py-2 bg-indigo-500 text-white rounded-lg'>Edit</button>
                                <form method='POST' action='' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                    <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-lg ml-2'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='px-6 py-2 text-center'>No records found</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </body>
</html>
