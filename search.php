<?php

$data = $_GET["search"];

$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("connection not successful");
} else {
    $query = " select * from froms_data where product_name like '%$data'; ";
    $result = mysqli_query($conn, $query);

    $data = '<table><thead><tr><th>ID</th><th>Name</th><th>SKU</th><th>Description</th><th>Actions</th></tr></thead><tbody>';

    while ($r = mysqli_fetch_assoc($result)) {
        $data = $data . '<tr><td>' . $r['ID'] . '</td>';
        $data = $data . '<td>' . $r['product_name'] . '</td>';
        $data = $data . '<td>' . $r['sku'] . '</td>';
        $data = $data . '<td>' . $r['description'] . '</td>';
        $data = $data . '<td>' . '<a href="edit.php?pk=' . $r['ID'] . '">Edit</a></td></tr>';




    }
    $data = $data . '</tbody ></table > ';
    echo $data;
}




//

//    $data = '<table >
//                <thead>
//                    <tr>
//                        <th>ID</th>
//                        <th>Name</th>
//                        <th>SKU</th>
//                        <th>Description</th>
//                    </tr>
//                </thead>';
//
//
//    $data = '<tbody>'. $data . '</tbody></table>';


?>