<?php
// Create a database
$servername="localhost";
$username="root";
$password="";
$db_name="Expense";

// Create a connection
$conn=mysqli_connect($servername,$username,$password,$db_name);

// Die if connection was not Successfully
if(!$conn){
    die("Connection was not created".mysqli_connect.error());
}
else{
    // echo"Connection Created Successfully";
}
?>