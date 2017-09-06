<style>
    td, th {
        text-align: left;
        padding: 8px;
    }
</style>

<?php
include 'header.php';
include 'dbh.php';

if(isset($_SESSION['id'])) {

$inv_id = $_POST['inv_id'];
$description = $_POST['description'];
$quantityStored = $_POST['quantityStored'];
$quantityOrdered = $_POST['quantityOrdered'];
$tableHeadNeeded = true;
$count = 0;
$sql = "SELECT * FROM inventory WHERE ";
$andNeeded = false;

if($inv_id == "" && $description == "" && $quantityStored == "" && $quantityOrdered == ""){
    echo "<br> Please fill out at least 1 search field.";
    echo "<br><br><form action='searchInventoryForm.php'> 
                   <input type='submit' value='Search Inventory'/>
              </form>";
    exit();
}

//echo "<br>SQL after all null check: ".$sql;

if($inv_id !== "")
{
    $sql .= "inv_id = ".$inv_id;
    error_reporting(E_ERROR | E_PARSE);
    $andNeeded = true;
}

if($description !== "")
{
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "description = '".$description."'";
    $andNeeded = true;
}

if($quantityStored !== "")
{
    error_reporting(E_ERROR | E_PARSE);
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "quantityStored = ".$quantityStored;
    $andNeeded = true;
}

if($quantityOrdered !== "")
{
    error_reporting(E_ERROR | E_PARSE);
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "quantityOrdered = ".$quantityOrdered;
}

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        if($tableHeadNeeded){
            $tableHeadNeeded = false;
            $count++;
            echo "<table><tr><th>Id No.</th>
            <th>Description</th>
            <th>Quantity Stored</th>
            <th>Quantity Ordered</th></tr>";
        }
        echo "<tr>
                    <td> ".$row['inv_id']."</td>
                    <td> ".$row['description']."</td>
                    <td> ".$row['quantityStored']."</td>
                    <td> ".$row['quantityOrdered']."</td>
                    <td> <a href='editInventory.php?edit=$row[inv_id]'>Edit<br></td>
                    <td> <a href='includes/deleteInventory.inc.php?delete=$row[inv_id]'>Delete<br></td>
                </tr><br>";
    }

    if($count == 0) {
        echo "<br> No Items Found That Match All of Those Criteria.<br>";
    }
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>