<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $name =$_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // koneksi database
    $conn = new mysqli("localhost","root","","crud_db");
    if ($conn->connect_error){
        die("koneksi gagal : ". $conn->connect_error);
    }
    $sql ="INSERT INTO users (name, email, phone) values ('$name', '$email', '$phone')";
    //fungsi jika database berhasil
    if ($conn->query($sql)===TRUE){
        header("location: index.php");

    }else{
        echo "Error" . $sql. "<br>" . $conn->error;
    }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style2.css">
    <title>Document</title>
</head>
<body>
    <style>
        /* Reset body style */
body {
    font-family: Arial, sans-serif;
    background-color: #f7faff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Styling Form Container */
form {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

/* Label Styling */
label {
    font-size: 14px;
    color: #333;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Input Fields Styling */
input[type="text"],
input[type="email"],
input[type="hidden"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #4a90e2;
    outline: none;
}

/* Submit Button Styling */
button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #359338;
}

/* Responsive Styling */
@media (max-width: 400px) {
    form {
        padding: 15px;
    }
    button {
        font-size: 14px;
    }
}

    </style>
    <form action="" method="post">
        Nama : <input type="text" name="name" required><br>
        email : <input type="text" name="email" required><br>
        phone : <input type="text" name="phone" required><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>