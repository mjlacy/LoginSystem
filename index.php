<style>
    td, th {
        text-align: left;
        padding: 8px;
    }

</style>

<?php
	//include 'includes/bootstrap.inc.php';
    include 'header.php';
	include 'dbh.php';

	if(isset($_SESSION['id'])){
        $sql="SELECT * FROM inventory";
        $result = mysqli_query($conn, $sql);
        echo "<table class ='inventory'><tr><th>Id No.</th>
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

        echo "&nbsp&nbsp<form action='acctInfo.php'>
                   <input type='submit' value='Account Info'/>
                  </form>";

    } else {
        $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url, 'error=input') !== false){
            echo "<br> &nbsp Your username or password is incorrect!";
        } else {
            echo "<br> &nbsp Welcome to the PHP System! Please log in or create an account.";
            echo '<br><br>&nbsp<img src="http://www.pngall.com/wp-content/uploads/2016/07/Success-Free-Download-PNG.png"
            width="280" height="125" title="Logo of a company" alt="Logo of a company"/>
            <div class="dropdown">
             <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               Dropdown
               <span class="caret"></span>
             </button>
             <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a href="#">Action</a></li>
               <li><a href="#">Another action</a></li>
               <li><a href="#">Something else here</a></li>
               <li role="separator" class="divider"></li>
               <li><a href="#">Separated link</a></li>
             </ul>
           </div>';
        }
    }
?>