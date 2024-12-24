<?php
$conn = new mysqli("localhost", "root", "", "crud_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">          
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
.form {
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
    background-color: #359338   ;
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
<form method="POST" action="" class="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Nama:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    <label for="phone">Telepon:</label>
    <input type="text" name="phone" value="<?php echo $phone; ?>" required><br>
    <button type="submit">Update</button>
</form>

</body>
</html>

