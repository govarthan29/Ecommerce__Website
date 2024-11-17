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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <style>
        /* body {
            font-family: Arial, sans-serif;
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

        h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 8px 20px;
            background-color:  #2980b9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #2980b9;
        }

        /* table {
            width: 100%;
            border-collapse: collapse;
        } */

        table td, table th {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php include '../components/admin_header.php'; ?>
<div class="container">
        <h2>ADD SUPPLIER</h2>

        <form id="supplierForm" action="save_supplier.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Supplier Name">
        <input type="text" id="contact" name="contact" placeholder="Contact Number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
        <input type="text" id="Item" name="Item" placeholder="Supply Item">
        <input type="text" id="address" name="address" placeholder="Address">

            <input type="submit" value="Add Supplier">
            
        </form>
        

                        <!-- Supplier data will be inserted here dynamically -->
            </tbody>
        </table>
    </div>
</body>
</html>
