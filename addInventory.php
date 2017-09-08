<?php
	include 'header.php';
	include 'dbh.php';

    $columnNames = array();

    if(isset($_SESSION['id'])) {
        $sql="SHOW COLUMNS FROM inventory";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
            array_push($columnNames, $row['Field']);
        }

        echo "<form action ='includes/addInventory.inc.php' method = 'POST'><br>";
             for($count = 1; $count< count($columnNames); $count++){
                echo "&nbsp&nbsp<label>$columnNames[$count]</label> <br>&nbsp&nbsp<input type='text' name=".$columnNames[$count]." value=".$row[$columnNames[$count]]."><br><br>";
             }
                echo"&nbsp&nbsp<button type='submit'>Add to Inventory</button></form>";
    }
    else{
        echo "<br> Please log in to manipulate the database";
    }
?>