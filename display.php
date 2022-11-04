<?php

$conn = new mysqli('localhost', 'root', 'root', 'forms'); //for connection to database
if (!$conn) {
    die("connection not established");
} else {
    //echo "connection established";
    echo "<br>";
    $query = "select * from froms_data";
    $r = mysqli_query($conn, $query);

    $num = mysqli_num_rows($r);
    $arr = [];

    $j = 0;
    $i = 0;
    while ($row = mysqli_fetch_assoc($r)) {
        array_push($arr, $row);
    }
}
?>

<html>
<head>

</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>SKU</th>
        <th>Description</th>
    </tr>

    </thead>
    <tbody>
    <?php
    foreach ($arr as $value) { ?>
        <tr>
            <td> <?php
                echo $value['ID']; ?>  </td>
            <td> <?php
                echo $value['product_name']; ?>  </td>
            <td> <?php
                echo $value['sku']; ?>  </td>
            <td> <?php
                echo $value['description']; ?>  </td>
        </tr>
    <?php
    } ?>
    </tbody>
</table>

</body>
</html>
