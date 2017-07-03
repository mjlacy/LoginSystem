<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url("https://images.freecreatives.com/wp-content/uploads/2015/12/Plaid-Texture-Seamless-Pattern.jpg");
            background-size: 100%;
        }
    </style>
<meta charset="UTF-8">
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li>&nbsp<a href="index.php">Home</a></li>
            <?php
                if(isset($_SESSION['id'])){
                    echo "<li><a href=\"addInventory.php\">Add to Inventory</a></li>";
//                    echo "<form action='addInventory.php'>
//                   <input type='submit' value='Add to Inventory'/>
//                    </form>";

                    echo "<li><a href=\"searchInventoryForm.php\">Search Inventory</a></li>";
//                    echo "<form action='searchInventoryForm.php'>
//                   <input type='submit' value='Search Inventory'/>
//                    </form>";

                    echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
//                    echo "<form action='includes/logout.inc.php'>
//	                <button>Log Out</button>
//                    </form>";
                } else {
                    echo"<form action='includes/login.inc.php' method='POST'>
                        <input type='text' name='uid' placeholder='Username'>
                        <input type='password' name='pwd' placeholder='Password'>
                        <button type='submit'>&nbsp&nbsp&nbspLog In</button>
                    </form>
                    <li><a href=\"signup.php\">Sign Up</a></li>";
                }
            ?>
		</ul>
	</nav>
</header>