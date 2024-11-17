<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

$message = []; // Initialize the message array

if(isset($_POST['update_discount'])){

   $id = $_POST['id'];
   $discount = $_POST['discount'];
   $discount = filter_var($discount, FILTER_SANITIZE_STRING);

   $update_discount = $conn->prepare("UPDATE `products` SET discount = ? WHERE id = ?");
   $update_discount->execute([$discount, $id]);

   $message[] = 'Discount updated successfully!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product Discount</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="update-discount">

   <!-- <h1 class="heading">Update Product Discount</h1> -->

   <!-- <?php if(!empty($message)): ?>
      <?php foreach($message as $msg): ?>
         <div class="message">
            <span><?= $msg; ?></span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
      <?php endforeach; ?>
   <?php endif; ?> -->

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
         $select_products->execute([$update_id]);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <section class="form-container">
   
   <form action="" method="post">
   <h1 class="heading">Update  Discount</h1>
      <input type="hidden" name="id"  value="<?= $fetch_products['id']; ?>">
      <input type="text" name="name" value="<?= $fetch_products['id']; ?>" required placeholder="Product ID:" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="name" value="<?= $fetch_products['discount']; ?>" required placeholder="Current Discount:" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <!-- <span>Product ID: <?= $fetch_products['id']; ?> </span> -->
      <!-- <span>Current Discount:<?= $fetch_products['discount']; ?></span> -->
      <input type="number" name="discount" required min="0" max="9999999999" placeholder="Enter New Discount" class="box">
      
      <div class="flex-btn">
         <input type="submit" name="update_discount" class="btn" value="Update Discount">
         <a href="discount.php" class="option-btn">Go Back</a>
      </div>
   </form>
   </section>
   
   <?php
            }
         }else{
            echo '<p class="empty">No product found!</p>';
         }
      }else{
         echo '<p class="empty">No product found!</p>';
      }
   ?>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
