<?php
include 'header.php';
include 'dbh.php';

$inv_id = $_GET['edit'];

if(isset($_SESSION['id'])) {
    $sql="SELECT * FROM inventory WHERE inv_id = $inv_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo "<form action ='includes/editInventory.inc.php' method ='POST'><br>
            <input type='hidden' name='inv_id' value = $inv_id>
            &nbsp&nbsp<label>Description:</label> <br>&nbsp&nbsp<input type='text' name='description' value=".$row['description']."><br><br>
            &nbsp&nbsp<label>Quantity Stored:</label> <br>&nbsp&nbsp<input type='text' name='quantityStored' value=".$row['quantityStored']."><br><br>
            &nbsp&nbsp<label>Quantity Ordered:</label> <br>&nbsp&nbsp<input type='text' name='quantityOrdered' value=".$row['quantityOrdered']."><br><br>
            &nbsp&nbsp<button type='submit'>Submit</button>
         </form>";
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>