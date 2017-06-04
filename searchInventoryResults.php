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
//echo "Beginning SQL: ".$sql;
$andNeeded = false;

//echo "ID is type: ".gettype($inv_id)."<br>";
//echo "Description is type: ".gettype($description)."<br>";
//echo "quantityStored is type: ".gettype($quantityStored)."<br>";
//echo "quantityOrdered is type: ".gettype($quantityOrdered)."<br>";

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
    $sql .= "inv_id = ".$inv_id; //.= is the equivalent to += for strings
    error_reporting(E_ERROR | E_PARSE); //silences warning that comes up if a string is searched for
    $andNeeded = true;
}

//echo "<br>SQL after id check: ".$sql;

if($description !== "")
{
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "description = '".$description."'";
    $andNeeded = true;
}

//echo "<br>SQL after description check: ".$sql;

if($quantityStored !== "")
{
    error_reporting(E_ERROR | E_PARSE);
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "quantityStored = ".$quantityStored;
    $andNeeded = true;
}

//echo "<br>SQL after quantityStored check: ".$sql;

if($quantityOrdered !== "")
{
    error_reporting(E_ERROR | E_PARSE);
    if($andNeeded){
        $sql .= " AND ";
    }
    $sql .= "quantityOrdered = ".$quantityOrdered;
}

    //$sql = "SELECT * FROM inventory WHERE inv_id = ".$inv_id." OR description = '".$description."'
    //OR quantityStored = ".$quantityStored." OR quantityOrdered = ".$quantityOrdered."";

    //echo"<br> SQL Statement: " .$sql."<br>";

    $result = mysqli_query($conn, $sql);
    //echo "Before While loop";
    while($row = mysqli_fetch_array($result)) {
        //echo "<br><br> In While loop";
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
    //echo"<br>Search Criteria<br>".$inv_id."<br>".$description."<br>".$quantityStored."<br>". $quantityOrdered;
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>