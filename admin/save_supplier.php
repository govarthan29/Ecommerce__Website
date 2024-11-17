<!-- <?php

$conn = new mysqli("localhost","root","","shop_db");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST["name"];
$contact = $_POST["contact"];
$item = $_POST["Item"];
$address = $_POST["address"];


$stmt = $conn->prepare("INSERT INTO suppliers (name, contact, item, address) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $contact, $item, $address);


if ($stmt->execute() === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?> -->
