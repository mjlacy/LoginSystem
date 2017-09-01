<?php
include 'header.php';
include 'dbh.php';

if(isset($_SESSION['id'])) {

    $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'error=username') !== false){
        echo "<br>&nbsp&nbspUsername already in use.<br>";
        exit();
    }
    elseif(strpos($url, 'error=email') !== false){
        echo "<br>&nbsp&nbspThere is already an account with this email address.<br>";
        exit();
    }

    $id = $_GET['edit'];

    $sql="SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo "<form action ='includes/editMyAcct.inc.php' method ='POST'><br>
            <input type='hidden' name='id' value = $id>
            &nbsp&nbsp<label>First Name:</label> <br>&nbsp&nbsp<input type='text' name='first' value=".$row['first']."><br><br>
            &nbsp&nbsp<label>Last Name:</label> <br>&nbsp&nbsp<input type='text' name='last' value=".$row['last']."><br><br>
            &nbsp&nbsp<label>User Name:</label> <br>&nbsp&nbsp<input type='text' name='uid' value=".$row['uid']."><br><br>
            &nbsp&nbsp<label>Email:</label> <br>&nbsp&nbsp<input type='text' name='email' value=".$row['email']."><br><br>
            &nbsp&nbsp<label>Password:</label> <br>&nbsp&nbsp<input type='password' name='password' value=".$row['pwd']."><br><br>
            &nbsp&nbsp<button type='submit'>Submit</button>";
}

else{
    echo "<br> Please log in to manipulate the database";
}
?>