<?php

echo "hello World";
$n = $_POST['my_name'];
$s = $_POST['my_sku'];
$d = $_POST['my_description'];

//echo $n;
//echo $s;


$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("connection was not made succesfully");
} else {
    echo "connection successful";

    $php ="insert into froms_data(product_name,sku,description)values('$n', '$s', '$d')";
    mysqli_query($conn, $php);

    mysqli_close($conn);
}
?>