<?php

include '../components/connect.php';

session_start();

$supplier_id = $_SESSION['supplier_id']; 

if(!isset($supplier_id)){
   header('location:supplier_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/supplier_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>Welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p> 
         <a href="update_profile.php" class="btn">Update Profile</a>
      </div>

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE supplier_id = ?");
            $select_products->execute([$supplier_id]);
            $number_of_products = $select_products->rowCount();
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>Products Added</p>
         <a href="products.php" class="btn">See Products</a>
      </div>

      

      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages` WHERE supplier_id = ?");
            $select_messages->execute([$supplier_id]);
            $number_of_messages = $select_messages->rowCount();
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>New Messages</p>
         <a href="messages.php" class="btn">See Messages</a>
      </div>

   </div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
