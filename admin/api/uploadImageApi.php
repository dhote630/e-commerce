<?php

include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
$image = $_FILES['image'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=='admin'){
  $name = $image['name'];
  $binary = $image['tmp_name'];
  $type = $image['type'];
  $size = $image['size']/1024/1024;
  if($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png'){
   if($size<=1){
     $randomNum = rand();
     $path = pathinfo($name);
     $ext = $path['extension'];
     $fileName = $randomNum.".".$ext;
     $cmpPath = "../productes/".$fileName;
     move_uploaded_file($binary,$cmpPath);
     http_response_code(200);
     echo $fileName;
   } else {
     http_response_code(405);
     echo "uplode less than 1 MB image file";
   }
  } else {
    http_response_code(405);
    echo "uplode only image";
  }
  }else {
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
   http_response_code(401);
   echo "unauthorized...";
}


 ?>
