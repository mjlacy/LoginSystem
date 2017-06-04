<?php
include 'header.php';
include 'dbh.php';

if(isset($_SESSION['id'])) {
    echo "<br>&nbsp&nbspEnter what criteria you would like to see any matching items for.

        <form action ='searchInventoryResults.php' method ='POST'><br>
            &nbsp&nbspID No.: <br>&nbsp&nbsp<input type='text' name='inv_id'><br><br>
            &nbsp&nbspDescription: <br>&nbsp&nbsp<input type='text' name='description'><br><br>
            &nbsp&nbspQuantity Stored: <br>&nbsp&nbsp<input type='text' name='quantityStored'><br><br>
            &nbsp&nbspQuantity Ordered: <br>&nbsp&nbsp<input type='text' name='quantityOrdered'><br><br>
            &nbsp&nbsp<button type='submit'>Search</button>
         </form>";
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>