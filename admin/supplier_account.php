<?php

include '../components/connect.php';

session_start();

$supplier_id = $_SESSION['supplier_id']; // Assuming you have a session variable for supplier ID

if(!isset($supplier_id)){
   header('location:supplier_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   header('location:products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>supplier Accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/supplier_header.php'; ?>

<section class="accounts">

   <h1 class="heading">supplier Accounts</h1>

   <div class="box-container">

   <?php
      $select_accounts = $conn->prepare("SELECT * FROM `users`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
   <div class="box">
      <p> supplier ID: <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> supplier name: <span><?= $fetch_accounts['name']; ?></span> </p>
      
      <!-- Adjust the link according to supplier permissions -->
      <a href="supplier_account.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('Delete this account? The supplier-related information will also be deleted!')" class="delete-btn">Delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No accounts available!</p>';
      }
   ?>

   </div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
