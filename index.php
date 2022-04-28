<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="col-lg-8 mx-auto p-3 py-md-5">
    <h1>Gallery</h1>
        <p class="fs-5 col-md-8">Here you go:</p>

        <div class="mb-5">
        <p><?php echo date('d-m-y h:m:s');?></p>
        </div>
        <div>
        <div class="album py-5 bg-light">
            <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" style='max-width:80vw;'>
            <?php
            $servername = "localhost";
            $username = "susy";
            $password = "novell";
            $db="mkw";
            
            if($_GET["site"]==null){
                $_GET["site"]=1;
            }
            $site=$_GET["site"]*8;
            if($site==null){
                $site=8;
            };
            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            $sql = "SELECT id, name, author, imagefile, width, height FROM images";
            $result = $conn->query($sql);
            $records=$result->num_rows;
            if ($result->num_rows > 0) {
                // output data of each row
                $reader=1;
                
                while($row = $result->fetch_assoc()) {
                    if($reader>=$site-7 and $reader<=$site){
                        echo"
                        <a href='/sprawdzian/exam/view.php?id=".$row["id"]."&site=".$_GET["site"]."'>
                        <div style='max-width:20vw;' class=\"col\">
                        <div class=\"card shadow-sm\">
                            <img style='max-height:100px; max-width:200px;'placehorder='photo' src='".$row["imagefile"]."' height='".$row["height"]."' width='".$row["width"]."'>
                            <div class=\"card-body\">
                            <p class=\"card-text\">".$row["name"]."<br>Author: ".$row["author"]."</p>
                            </div>
                        </div>
                        </div></a>";
                    } 
                    $reader++;
                }
              } else {
                echo "No photos";
              }
                
            ?>
                
            </div>
            </div>
        </div>
        <?php $max=ceil($records/8);
        ?>
        <a href='/sprawdzian/exam/index.php?site=<?php if($_GET["site"]==1){
            echo '1';
        }else{
            echo $_GET["site"]-1;
        }?>'><button><</button></a>
        <a href='/sprawdzian/exam/index.php?site=<?php if($_GET["site"]<$max){
            echo $_GET["site"]+1;
            
        }else{
            echo $_GET["site"];
        }?>'><button>></button></a>
</div>
</body>
</html>