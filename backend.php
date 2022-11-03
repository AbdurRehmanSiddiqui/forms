<?php

    echo "hello World";
    $n= $_POST['my_name'];
    $s=$_POST['my_sku'];
    $d=$_POST['my_description'];

    $conn=new mysqli('localhost','root','','form');
    if(!$conn)
    {
        die("connection was not made succesfully");
    }
    else{

        $php="insert into form(My_name,My_sku,Description)values($n,$s,$d)";


    }



?>