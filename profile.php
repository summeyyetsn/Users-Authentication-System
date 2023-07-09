<?php

session_start();
if(isset($_SESSION["email"])){
    // echo "<h3> WELCOME ".$_SESSION["user_name"]."</h3>";
    echo "<center>
    <h2> Hello </h2>
    <h1>".$_SESSION["user_name"]."</h1>
    <h3> Welcome to your Profile Page.</h3>
    </center>";
    echo "<center><a href='logout.php' style='color:white; background-color:black; 
                     padding:5px; font-size:20px; border-radius:5px;'> LOGOUT</a></center>";
}
else{
    echo "You do not have permission to view this page.";
}
?>






