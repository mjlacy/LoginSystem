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
            $columnName = $columnNames[$count];
            $inputs = "&nbsp&nbsp<label>$columnNames[$count]</label> <br>&nbsp&nbsp<input type='text' name=";
            if(strpos($columnName,' ')){
                $columnName = str_replace(" ","", $columnName);
            }
            $inputs .= $columnName." value=".$row[$columnNames[$count]]."><br><br>";
            echo $inputs;
        }
        echo"&nbsp&nbsp<button type='submit'>Add to Inventory</button></form>";
    }

    else{
        echo "<br> Please log in to manipulate the database";
    }
?>