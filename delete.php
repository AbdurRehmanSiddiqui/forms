<?php

$primaryKey = $_GET['pk'];
$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("connection not established");
} else {
    $query = "DELETE FROM froms_data WHERE id='$primaryKey'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}


?>