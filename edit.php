<?php

if (isset($_GET['pk'])) {
$primaryKey = $_GET['pk'];

$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("CONNECTION UNSUCCESSFUL");
} else {
    $query = "Select * from froms_data where id =$primaryKey";
    $result = mysqli_query($conn, $query);
    $r = mysqli_fetch_assoc($result);
    // echo var_dump($r);


}


?>

<!Doctype html>
<html>
<title>Add Products</title>
<link rel="stylesheet" href="style.css">
<div class="center">
    <h1>Edit PRODUCT</h1>
</div>
<body>
<form action="edit.php" method="POST">
    <input type="hidden" name="primary_key" value="<?php echo $r['ID']; ?>" />
    <div class="input">
        <label for="n"> Name</label>
        <input type="text" id="n" name="_name" class="i" value="<?php
        echo $r["product_name"]; ?>">
    </div>


    <div class="input">
        <label for="s"> SKU </label>
        <input type="text" id="s" name="_sku" class="i" value="<?php
        echo $r["sku"]; ?>">

    </div>

    <div class="textarea">
        <label for="d">Description </label>
        <textarea rows="10" cols="60" id="d" name="_description">
            <?php
            echo $r["description"]; ?>
        </textarea>

    </div>
    <div class="center">
        <input id="sbtn" type="Submit" value="Edit">
    </div>

</form>
<?php
mysqli_close($conn);
}
if (isset($_POST['_name'])) {
?>

<?php

$n = $_POST['_name'];
$s = $_POST['_sku'];
$d = $_POST['_description'];
$primary_key = $_POST['primary_key'];
$conn = new mysqli('localhost', 'root', 'root', 'forms');
if (!$conn) {
    die("CONNECTION UNSUCCESSFUL");
} else {
    $php = "update froms_data set product_name='$n', sku='$s', description='$d' where ID=$primary_key ";
    mysqli_query($conn, $php);
    mysqli_close($conn);
}
?>
<div class="right">
    <a href="display.php">
        View All Records
    </a>
</div>

</body>
</html>
<?php
} ?>








