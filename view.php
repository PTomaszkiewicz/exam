<?php
 $id=$_GET["id"];
 $servername = "localhost";
 $username = "susy";
 $password = "novell";
 $db="mkw";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $db);
 $sql = "SELECT id, name, author, imagefile, width, height FROM images where id='$id'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img placeholder='zdjecie' src='".$row["imagefile"]."'>
        <h1>".$row["name"]."</h1>
        <h2>ID: ".$row["id"]."</h2>
        <h2>Author: ".$row["author"]."</h2>
        <h2>Width: ".$row["width"]."</h2>
        <h2>Height: ".$row["height"]."</h2>";
    }
 } else {
     echo "<h1>No record</h1>";
 }
 ?>
 <a href='/sprawdzian/exam/index.php?site=<?php echo $_GET["site"]?>'><button>Powrót</button></a>