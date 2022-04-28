<?php 
require_once 'vendor/autoload.php';
$servername = "localhost";
$username = "susy";
$password = "novell";
$db="mkw";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$faker = Faker\Factory::create();
for($i=0; $i<20; $i++){

}
?>