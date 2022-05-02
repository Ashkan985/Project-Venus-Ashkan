<?php

// WORKING WITH DATABASE

// 1. Connect to the D.B.
$conn = mysqli_connect('localhost', 'root', 'root', 'movie_db');
$directors = array();
// True if you connected, false if not
if ($conn) {
    echo 'Connected ! ' . '<br>';

    // 2. Prepare the query
    $id = $_GET['id'];
    $query = 'SELECT * 
    FROM directors 
    LEFT JOIN movies
    ON movies.director_id = directors.id
    WHERE directors.id = ' . $id;


    // 3. Executing the query (send query to DB)
    $results = mysqli_query($conn, $query);

    // I retrieved results but I need to fetch before using them
    // 4. Fetch the results as an associative array
    $directors = mysqli_fetch_all($results, MYSQLI_ASSOC);

    // echo '<pre>';
    // var_dump($books);
    // echo '</pre>';

} else {
    echo 'Problem with connection !';
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
    <title>Director</title>
</head>

<body>


    <img src=<?= $directors[0]['img'] ?>>
    <p><?= 'Name : ' . $directors[0]['name'] . '<br>' ?></p>
    <p><?= 'Nationality : ' . $directors[0]['nationality'] . '<br>' ?></p>
    <p><?= 'Title : ' . $directors[0]['title'] . '<br>' ?></p>
    <p><?= 'Views : ' . $directors[0]['views'] . '<br>' ?></p>
    <img src=<?= $directors[0]['poster'] ?>>

    <hr>


</body>

</html>