<?php
// 1. Connect to the D.B.
$conn = mysqli_connect('localhost', 'root', '', 'movie_db');


// True if you connected, false if not
if($conn) {
    echo 'Connected ! ';

    // 2. Prepare the query
        $id=$_GET['id'];
        $query= 'SELECT title, views, poster, name
        FROM movies 
        INNER JOIN directors
        ON movies.director_id=directors.id
        WHERE movies.id='.$id;
        
    
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

            <img src= <?=$movies[0]['poster'] ?>>
            <p>
                <strong>Title :</strong>
                <?= $movies[0]['title']; ?>
            </p>
            <p>
                <strong>Views :</strong>
                <?= $movies[0]['views']; ?>
            </p>
            <p>
                <strong>Director :</strong>
                <?= $movies[0]['name']; ?>
            </p>
            <hr>     
            
</body>
</html>