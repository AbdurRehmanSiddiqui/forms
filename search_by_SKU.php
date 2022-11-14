<?php

$input = $_GET['inpt'];
//echo $input;

$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("connection not successful");
} else {
    $query = "select * from froms_data where sku like '%$input'";
    $result = mysqli_query($conn, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $html = '<tr>';
        $html = $html . '<td>' . $data['ID'] . '</td>';
        $html = $html . '<td>' . $data['product_name'] . '</td>';
        $html = $html . '<td>' . $data['sku'] . '</td>';
        $html = $html . '<td>' . $data['description'] . '</td>';
        $html = $html . '<td>'.'<a href="edit.php?pk='.$data['ID'].'">Edit</a></td>';
        $html = $html . '</tr>';
        echo $html;
    }
}


?>