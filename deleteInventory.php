<?php

//Just a confirmation page to ensure this item should be deleted. Not currently used.
include 'header.php';

$inv_id = $_GET['delete'];

if(isset($_SESSION['id'])) {
    echo "Are you sure you want to delete item ".$inv_id."? This action cannot be undone.
        <form action ='includes/deleteInventory.inc.php' method ='POST'><br>
            <input type='hidden' name='inv_id' value = $inv_id>
            <button type='submit'>Yes</button>
        </form>
        <form action='index.php'>
            <input type='submit' value='No' />
         </form>";
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>