<?php 
require_once '../vendor/autoload.php';
$servername = "localhost";
$username = "susy";
$password = "novell";
$db="mkw";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$faker = Faker\Factory::create();
for($i=0; $i<20; $i++){
    $name=$faker->name();
    $picsum_id=rand(0, 1000);
    $imagefile="/sprawdzian/images/".str_replace(" ", "_", "$faker->name").".jpg";
    $url="https://picsum.photos/id/$picsum_id/info";
    $meta=file_get_contents($url);
    if($meta==null){
        return "Błąd";
    } else {
        $data= json_decode($meta); 
        $author= $data->author;
        $author= str_replace("`", " ", $author);
        $author= str_replace("'", " ", $author);
        $height= $data->height;
        $width= $data->width;
        $download= $data->download_url;
        file_put_contents("./images/".$imagefile, file_get_contents($download));
        $sql = "INSERT INTO images (name, picsum_id, imagefile, author, width, height)
        VALUES ('$name', '$picsum_id', '$imagefile', '$author', '$width', '$height')";
        
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }
    
}
?>