<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $conn = new mysqli("localhost","root","","crud_db");
    if ($conn -> connect_error){
        die("koneksi gagal: " . $conn->connect_error);

    }
    $sql ="DELETE FROM users where id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: index.php") ;

    }else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}


?>