<?php
ini_set('display_errors', '1');

// WORKING WITH DATABASE

// 1. Connect to the D.B.
$conn = mysqli_connect('localhost', 'root', 'root', 'movie_db');

if (isset($_GET['submit'])) {

    // True if you connected, false if not
    if ($conn) {
        echo 'Connected ! ';
        $name = $_GET['name'];
        $nationality = $_GET['nationality'];
        $birth_date = $_GET['birth_date'];
        $image = $_GET['img'];

        // 2. Prepare the query
        $query = "INSERT INTO directors(name, nationality, birth_date, img)
    VALUES('$name', '$nationality', '$birth_date', '$image')";

        // 3. Executing the query (send query to DB)
        $result = mysqli_query($conn, $query);

        // When insert/update/delete, it returns true or false
        if ($result)
            echo 'Successfully inserted in the DB!';
        else
            echo 'Problem inserting into the DB.';
    } else {
        echo 'Problem with connection !';
    }
}
// Close the connection
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="formContainer">
        <form action="" method="GET">
            <input type="text" name="name" placeholder="director name">
            <input type="text" name="nationality" placeholder="nationality">
            <input type="text" name="img" placeholder="image">
            <input type="date" name="birth_date" placeholder="date of birth">
            <input type="submit" name="submit" value="submit">

        </form>
    </div>
</body>

</html>