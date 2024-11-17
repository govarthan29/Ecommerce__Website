<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $supplierId = $_POST['supplierId'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $item = $_POST['item'];

    $updateSupplier = $conn->prepare("UPDATE `suppliers` SET name = ?, contact = ?,address=?, item=? WHERE id = ?");
    $updateSupplier->execute([$name, $contact, $address, $item, $supplierId]);

    header('location:index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('location:index.php');
    exit();
}

$supplierId = $_GET['id'];

$getSupplier = $conn->prepare("SELECT * FROM suppliers WHERE id = ?");
$getSupplier->execute([$supplierId]);
$supplier = $getSupplier->fetch(PDO::FETCH_ASSOC);

if (!$supplier) {
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>
    <?php include '../components/admin_header.php'; ?>
    <section class="form-container">
        <form action="" method="post">
            <h3>Update Supplier</h3>
            <input type="hidden" name="supplierId" value="<?php echo $supplier['id']; ?>">
            <input type="text" name="name" class="box" value="<?php echo $supplier['name']; ?>" placeholder="Supplier Name">
            <input type="text" name="contact" class="box" value="<?php echo $supplier['contact']; ?>" placeholder="Contact Number">
            <input type="text" name="address" class="box" value="<?php echo $supplier['address']; ?>" placeholder="address">
            <input type="text" name="item" class="box" value="<?php echo $supplier['item']; ?>" placeholder="item">
            <input type="submit" value="Update Now" class="btn" name="submit">
        </form>
    </section>
    <script src="../js/admin_script.js"></script>
</body>

</html>
