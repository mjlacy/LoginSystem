<?php
	include 'header.php';

    $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'error=empty') !== false){
        echo "<br>Please fill out all fields.<br>";
    }
    elseif(strpos($url, 'error=username') !== false){
        echo "<br>Username already in use.<br>";
    }
    elseif(strpos($url, 'error=email') !== false){
        echo "<br>There is already an account with this email address.<br>";
    }
    elseif(strpos($url, 'error=unregistered') !== false){
        echo "<br>&nbsp&nbspThanks for signing up, please check your email for an account confirmation link.<br>";
    }

    if(isset($_SESSION['id'])){
        echo "<br><p class='pCenter'>You are already logged in!</p>";
    } else {
        echo "<br><form class='signupform' action='includes/signup.inc.php' method='POST'>
        <input type='text' name='first' placeholder='First Name'><br>
        <input type='text' name='last' placeholder='Last Name'><br>
        <input type='text' name='email' placeholder='Email'><br>
        <input type='text' name='uid' placeholder='Username'><br>
        <input type='password' name='pwd' placeholder='Password'><br><br>
        <button type='submit'>Sign Up</button>
    </form>";
    }
?>