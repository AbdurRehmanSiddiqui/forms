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
    <title>Records</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="Div_SearchBar">
    <input type="text" value="" class="Search_Bar" placeholder="Search">
</div>

<div  class="table" id="static">
<table>
        <thead>
        <tr>
            <b>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Description</th>
                <th>Actions</th>
            </b>
        </tr>
        </thead>

    <tbody>
    <?php
    foreach ($arr as $value) { ?>
        <tr id="record-<?= $value['ID']; ?>">
            <td><?= $value['ID']; ?></td>

            <td> <?php
                echo $value['product_name']; ?>  </td>

            <td> <?php
                echo $value['sku']; ?>  </td>

            <td> <?php
                echo $value['description']; ?>  </td>
            <td>
                <a href="edit.php?pk=<?php
                echo $value['ID']; ?>">Edit</a>

                <button class="delete"<?php
                echo $value['ID'] ?>">Delete
                </button>
            </td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>
<?php
mysqli_close($conn);
?>
</div>


<div class="table" id="dynamic">








</div>

<script>
    $(document).ready(function () {
        $(".delete").on("click", function (event) {
            var id = event.currentTarget.value;
            var rowIdentifier = '#record-' + id;

            $.ajax({
                url: "delete.php",
                type: "GET",
                data: {pk: id},
                success: function (data) {
                    console.log(data);
                    $(rowIdentifier).hide();
                }
            });
        });

        $(".Search_Bar").on("keyup", function (event) {
            var input = event.currentTarget.value;
            $.ajax({
                url: "Search.php",
                type: "GET",
                data: {search: input},
                success: function (data) {
                    console.log(data);
                    $(".table#dynamic").html(data);
                }
            });

        });
    });
</script>

</body>
</html>
