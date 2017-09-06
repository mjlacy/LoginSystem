<?php
include 'header.php';
include 'dbh.php';

error_reporting(E_ALL ^ E_NOTICE);
$url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(strpos($url, 'error=wrongPassword') !== false){
    echo "<br>&nbsp&nbspOld password is incorrect.<br>";
}
if(strpos($url, 'error=noPassword') !== false){
    echo "<br>&nbsp&nbspNew password cannot be empty.<br>";
}
if(strpos($url, 'error=noMatch') !== false){
    echo "<br>&nbsp&nbspYour new password does not match.<br>";
}
if(strpos($url, 'success') !== false){
    echo "<br>&nbsp&nbspYour password has been changed successfully, please log in with your new password.<br>";
}

echo "<form action ='includes/newPassword.inc.php' method ='POST'><br>
    &nbsp&nbsp<label>Old Password:</label> <br>&nbsp&nbsp<input type='password' name='oldPassword'><br><br>
    &nbsp&nbsp<label>New Password:</label> <br>&nbsp&nbsp<input type='password' name='newPassword'><br><br>
    &nbsp&nbsp<label>Confirm New Password:</label> <br>&nbsp&nbsp<input type='password' name='confirmNewPassword'><br><br>
    &nbsp&nbsp<button type='submit'>Submit</button>
 </form>";
?>