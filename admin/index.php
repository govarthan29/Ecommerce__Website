<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <style>
        /* body {
            font-family:'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        } */

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* h1 {
            color: #007bff;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #2980b9;
            color: #fff;
            font-size: 1.7rem;
        }

        table td {
            text-align: center;
            font-size: 1.7rem;
        }
        
        /* .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 100px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        } */
    </style>
</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <div class="container">
        <h1 class="heading">Supplier Details</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Item</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'get_suppliers.php'; ?>
            </tbody>
        </table>
        <a href="addsupplier.php" class="btn">Add Supplier</a>
        
    </div>

    
    <!-- <div id="supplierModal" class="modal">
        <div class="">
            <span class="close">&times;</span>
            <h2>Add/Edit Supplier</h2>
            <form action="save_supplier.php" method="POST">
                <input type="hidden" id="supplierId" name="supplierId">
                <input type="text" id="name" name="name" placeholder="Supplier Name">
                <input type="text" id="contact" name="contact" placeholder="Contact Number">
                <input type="text" id="address" name="address" placeholder="address">
                <input type="text" id="item" name="address" placeholder="item">
                <input type="submit" value="Save Supplier">
            </form>
        </div>
    </div> -->

    <script src="../js/admin_script.js"></script>
</body>

</html>
