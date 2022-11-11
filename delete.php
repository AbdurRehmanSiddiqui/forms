<?php

$primaryKey = $_GET['pk'];
$row_identifier=$_GET['ri'];
$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("connection not established");
} else {

    $query = "DELETE FROM froms_data WHERE id='$primaryKey'";
    if(mysqli_query($conn, $query))
    {
        $a="Record deleted Successfully";
        echo $a;
    }
    else{
        $a="Record not deleted Successfully";
        echo $a;

    }
    mysqli_close($conn);
}


?>