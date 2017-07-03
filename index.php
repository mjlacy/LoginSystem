<style>
    td, th {
        text-align: left;
        padding: 8px;
    }

    /*.Buttons {*/
        /*position: fixed;*/
        /*top: 16%;*/
        /*left: 30%;*/
        /*width: 8%;*/
    /*}*/

    /*.Add {*/
        /*margin-bottom: 2px;*/
        /*width: 100%;*/
    /*}*/

</style>

<?php
	include 'header.php';
	include 'dbh.php';

	//echo "<br>";

	if(isset($_SESSION['id'])){
        $sql="SELECT * FROM inventory";
        $result = mysqli_query($conn, $sql);
        echo "<table><tr><th>Id No.</th>
        <th>Description</th>
        <th>Quantity Stored</th>
        <th>Quantity Ordered</th></tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td> ".$row['inv_id']."</td>
                <td> ".$row['description']."</td>
                <td> ".$row['quantityStored']."</td>
                <td> ".$row['quantityOrdered']."</td>
                <td> <a href='editInventory.php?edit=$row[inv_id]'>Edit<br></td>
                <td> <a href='includes/deleteInventory.inc.php?delete=$row[inv_id]'>Delete<br></td>
            </tr><br>";
        }

        $currentID = $_SESSION['id'];
        $sql = "SELECT type FROM users WHERE id='$currentID'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $acctType = $row['type'];

        if ($acctType == "Admin") {
            echo "&nbsp&nbsp<form action='usersTable.php'>
                   <input type='submit' value='See Users'/>
                  </form>";
        }

//        echo "&nbsp";
//
//        echo "<form action='addInventory.php'>
//                   <input type='submit' value='Add to Inventory'/>
//              </form>";
//
//        echo "&nbsp &nbsp &nbsp &nbsp"; // Adds space between buttons
//
//        echo "<form action='searchInventoryForm.php'>
//                   <input type='submit' value='Search Inventory'/>
//              </form>";

//        echo "<div class='Buttons'>
//                <div class='Add'>
//                    <form action='addInventory.php'>
//                        <input type='submit' value='Add to Inventory'/>
//                    </form>
//                </div>
//              </div>";

    } else {
        $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url, 'error=input') !== false){
            echo "<br> &nbsp Your username or password is incorrect!";
        } else {
            echo "<br> &nbsp Welcome to the PHP System! Please log in or create an account.";
            echo '<br><br>&nbsp<img src="http://www.pngall.com/wp-content/uploads/2016/07/Success-Free-Download-PNG.png" 
            width="280" height="125" title="Logo of a company" alt="Logo of a company"/>';
        }
    }
?>

</body>
</html>