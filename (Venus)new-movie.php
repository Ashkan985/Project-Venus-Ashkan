<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new-movie</title>
</head>
<body>
    <form action="" method="get">
    <input type="text" name="title" placeholder="Movie Name" value="">
    <input type="text" name="views" placeholder="views" value="">
    <input type="text" name="director_id" value="">
    <input type="image" name="poster" value="" >
    <input type="submit" name='Submitbtn'value="send" >
    </form>

    <?php 
    if(isset($_POST['Submitbtn'])){
       // WORKING WITH DATABASE

    // 1. Connect to the D.B.
    $conn = mysqli_connect('localhost', 'root', '', 'movie_db');

    // True if you connected, false if not
    if($conn) {
    echo 'Connected ! ';

    $title= $_GET['title'];
    $views= $_GET['views'];
    $director_id= $_GET['director_id'];
    $image= $_GET['poster'];

    // 2. Prepare the query
    $query = "INSERT INTO movies( title, views, director_id, poster) VALUES ( '$title','$views','$director_id','$image')";
    

    // 3. Executing the query (send query to DB)
    $result = mysqli_query($conn, $query);

    // When insert/update/delete, it returns true or false
    if($result)
        echo 'Successfully inserted in the DB!';
    else
        echo 'Problem inserting into the DB.';
    } else {
    echo 'Problem with connection !';
    }

    // Close the connection
    mysqli_close($conn);
    }

    
    ?>
</body>
</html>