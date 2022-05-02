<?php

// WORKING WITH DATABASE

// 1. Connect to the D.B.
$conn = mysqli_connect('localhost', 'root', '', 'movie_db');
$movies = array();

// True if you connected, false if not
if($conn) {
    echo 'Connected ! ';

    // 2. Prepare the query
    $query = 'SELECT * FROM movies';

    // 3. Executing the query (send query to DB)
    $results = mysqli_query($conn, $query);

    // I retrieved results but I need to fetch before using them
    // 4. Fetch the results as an associative array
    $movies = mysqli_fetch_all($results, MYSQLI_ASSOC);

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
    <title>Document</title>

</head>
<body>
    <?php foreach ($movies as $movie) :?>
        <img src= <?=$movie['poster'] ?>>
        <a href ="movie.php?id=<?= $movie['id']?>">Show Details</a> 
        <p>
            <strong>Title :</strong>
            <?= $movie['title']; ?>
        </p>
        <p>
            <strong>Views :</strong>
            <?= $movie['views']; ?>
        </p>
       
        
        
        <hr>
    <?php endforeach; ?>
</body>
</html>