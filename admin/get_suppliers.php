<?php

$conn = new mysqli("localhost","root","","shop_db");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["contact"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["item"]."</td>";
        echo "<td>
        <form action='delete_supplier.php' method='post' >
            <input type='hidden' name='id' value='".$row["id"]."'>
            <button type='submit' name='delete' class='delete-btn'>Delete</button>
        </form>
        <button><a href='update_supplier.php?id=".$row["id"]."'class='option-btn'>Update</a></button>
      </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No suppliers found</td></tr>";
}


$conn->close();
?>
