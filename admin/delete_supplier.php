<?php
include '../components/connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['id'];
   $delete_supplier = $conn->prepare("DELETE FROM `suppliers` WHERE id = ?");
   $delete_supplier->execute([$delete_id]);
   header('location:index.php');
}
?>
