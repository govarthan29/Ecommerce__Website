<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

$message = [];

if (isset($_POST['Add_discount'])) {
    $id = $_POST['id'];
    $discount = $_POST['discount'];

    $update_discount = $conn->prepare("UPDATE `products` SET discount = ? WHERE id = ?");
    $update_discount->execute([$discount, $id]);

    $message[] = 'Discount updated successfully!';
}

// Delete product
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $update_discount_to_zero = $conn->prepare("UPDATE `products` SET `discount` = 0 WHERE `id` = ?");
    $update_discount_to_zero->execute([$delete_id]);
    header('location:discount.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

    <h1 class="heading">ADD Discount</h1>

    <form action="" method="post">
        <div class="flex">
            <div class="inputBox">
                <span>Product ID (required)</span>
                <input type="text" class="box" required maxlength="100" placeholder="Enter Product ID" name="id">
            </div>
            <div class="inputBox">
                <span>New Discount (required)</span>
                <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter New Discount"
                       onkeypress="if(this.value.length == 10) return false;" name="discount">
            </div>
        </div>

        <input type="submit" value="Add Discount" class="btn" name="Add_discount">
    </form>

</section>

<section class="show-products">

    <h1 class="heading">Products with discounts </h1>

    <div class="box-container">

        <?php
        $select_products = $conn->prepare("SELECT * FROM `products` where discount>0");
        $select_products->execute();
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="box">
                    <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
                    <div class="id" style="font-size: 15px;">Product ID:<?= $fetch_products['id']; ?></div>
                    <div class="discount" style="font-size: 15px;">Discount:<span><?= $fetch_products['discount']; ?></span>%</div>
                    <!-- <div class="details"><span><?= $fetch_products['details']; ?></span></div> -->
                    <div class="flex-btn">
                        <a href="update_discount.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
                        <a href="discount.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn"
                           onclick="return confirm('Delete this Discount?');">delete</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p class="empty">No Discounts added yet!</p>';
        }
        ?>

    </div>

</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
