<?php
include 'header.php';
include 'dbh.php';

$inv_id = $_GET['edit'];
$columnNames = array();

if(isset($_SESSION['id'])) {
    $sql="SHOW COLUMNS FROM inventory";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        array_push($columnNames, $row['Field']);
    }

    $sql="SELECT * FROM inventory WHERE inv_id = $inv_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo "<form action ='includes/editInventory.inc.php' method ='POST'><br>
            <input type='hidden' name='inv_id' value = $inv_id>";
            for($count = 0; $count< count($columnNames); $count++){
                $columnName = $columnNames[$count];
                $inputs = "&nbsp&nbsp<label>$columnNames[$count]</label> <br>&nbsp&nbsp<input type='text' name=";
                    if(strpos($columnName,' ')){
                        $columnName = str_replace(" ","", $columnName);
                    }
                    $inputs .= $columnName." value=".$row[$columnNames[$count]]."><br><br>";
                    echo $inputs;
            }
            echo "&nbsp&nbsp<button type='submit'>Submit</button></form>";
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>