<?php
	include 'header.php';

    $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'error=empty') !== false){
        echo "<br>&nbsp&nbspPlease fill out all fields.<br>";
    }
    elseif(strpos($url, 'error=username') !== false){
        echo "<br>&nbsp&nbspUsername already in use.<br>";
    }
    elseif(strpos($url, 'error=email') !== false){
        echo "<br>&nbsp&nbspThere is already an account with this email address.<br>";
    }

    if(isset($_SESSION['id'])){
        echo "<br><p class='pCenter'>You are already logged in!</p>";
    } else {
        echo "<br><form class='signupform' action='includes/signup.inc.php' method='POST'>
        &nbsp&nbsp<input type='text' name='first' placeholder='First Name'><br>
        &nbsp&nbsp<input type='text' name='last' placeholder='Last Name'><br>
        &nbsp&nbsp<input type='text' name='email' placeholder='Email'><br>
        &nbsp&nbsp<input type='text' name='uid' placeholder='Username'><br>
        &nbsp&nbsp<input type='password' name='pwd' placeholder='Password'><br><br>
        &nbsp&nbsp<button type='submit'>Sign Up</button>
    </form>";
    }
?>