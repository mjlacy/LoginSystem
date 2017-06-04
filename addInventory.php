<?php
	include 'header.php';
    if(isset($_SESSION['id'])) {
        echo "
            <form action ='includes/addInventory.inc.php' method = 'POST'><br>
                &nbsp&nbsp<label>Description: </label><br>&nbsp&nbsp<input type='text' name='description'><br><br>
                &nbsp&nbsp<label>Quantity Stored: </label><br>&nbsp&nbsp<input type='text' name='quantityStored'><br><br>
                &nbsp&nbsp<label>Quantity Ordered: </label><br>&nbsp&nbsp<input type='text' name='quantityOrdered'><br><br>
                &nbsp&nbsp<button type='submit'>Add to Inventory</button>
             </form>";
    }
    else{
        echo "<br> Please log in to manipulate the database";
    }
?>