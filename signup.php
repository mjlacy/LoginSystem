<?php
	include 'header.php';

    $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'error=empty') !== false){
        echo "Please fill out all fields";
    }
    elseif(strpos($url, 'error=username') !== false){
        echo "Username already exists";
    }

	if(isset($_SESSION['id'])){
	echo "<br><p class='pCenter'>Hi there user!</p><br>";
    } else {
	echo "<br><p class='pCenter'>You are not logged in!</p><br>";
    }

    if(isset($_SESSION['id'])){
        echo "<p class='pCenter'>You are already logged in!</p>";
    } else {
        echo "<form class='signupform' action='includes/signup.inc.php' method='POST'>
        <input type='text' name='first' placeholder='First Name'><br>
        <input type='text' name='last' placeholder='Last Name'><br>
        <input type='text' name='uid' placeholder='Username'><br>
        <input type='password' name='pwd' placeholder='Password'><br><br>
        <button type='submit'>Sign Up</button>
    </form>";
    }
?>