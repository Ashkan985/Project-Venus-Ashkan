<!-- 
	2. Create a page 'director.php'.
	This page is a descriptive page for each director. It'll display the picture, name and nationality of the director.
	It'll also display ALL the movies from this director (at least the title).
	This page will have to use the GET method to get the id of the director you want to display.
	So in your adress bar it'll look like this : 'localhost/director.php?id=1' -->

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
    FROM directors' ;


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
    <title>Movies</title>
</head>

<body>
   <?php $director[0]['title'];?>
    <?php foreach ($directors as $director):?>

    <img src=<?= $director['img'] ?>>
    <p><?= 'Name : ' . $director['name'] . '<br>' ?></p>
    <p><?= 'Nationality : ' . $director['nationality'] . '<br>' ?></p>
    <a href=" director.php?id=<?= $director['id'] ?>">Description</a>

    <hr>
    <?php  endforeach;?>

</body>

</html>