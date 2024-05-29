<?php 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
  echo "Connection was successful<br>";
}


//insert data

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_date = $_POST['publication_date'];

    // Prepare SQL statement
    $sql = "INSERT INTO register (title, author, genre, publication_date) VALUES ('$title', '$author', '$genre', '$publication_date')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
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
    <title>Book Registration</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div>
                <img src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png" class="w-32 mx-auto"/>
            </div>
            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">Book Registration</h1>
                <div class="w-full flex-1 mt-8">
                    <form action="" method="post" class="mx-auto max-w-xs">
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                               type="text" name="title" placeholder="Title" required/>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                               type="text" name="author" placeholder="Author" required/>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                               type="text" name="genre" placeholder="Genre" required/>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                               type="text" name="publication_date" placeholder="Publication Date" required/>
                        <button type="submit" class="mt-5 tracking-wide font-semibold bg-green-700 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                                <circle cx="8.5" cy="7" r="4"/>
                                <path d="M20 8v6M23 11h-6"/>
                            </svg>
                            <span class="ml-3">Submit</span>
                        </button>
                    </form>
                    <p class="mt-6 text-xs text-gray-600 text-center">
                        The Recorded Data will be
                        <a href="record.html" class="border-b border-gray-500 border-dotted">Shown Here</a>
                        and its
                        <a href="#" class="border-b border-gray-500 border-dotted">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-green-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('designer_life.svg');"></div>
        </div>
    </div>
</body>
</html>
