<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=='admin'){
    $brandId = $_POST['brandId'];
    $productName = $_POST['name'];
    $description = addslashes($_POST['description']);
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $front = $_POST['front'];
    $back = $_POST['back'];
    $left = $_POST['left'];
    $right = $_POST['right'];
    $code = "SELECT * FROM product WHERE brand_id='$brandId' AND title='$productName'";
    $response = $db->query($code);
    if($response->num_rows>0){
      http_response_code(409);
      echo "product allready exist";
    }else {
      $sqlCode = "INSERT INTO product(brand_id,title,description,price,quantity,front_pic,back_pic,
        left_pic,right_pic)
        VALUES('$brandId','$productName','$description','$price','$qty','$front','$back','$left','$right')";
      $res = $db->query($sqlCode);
       http_response_code(200);
       echo "product created";
    }
  } else {
    http_response_code(401);
    echo "unauthorized....";
  }
} catch (\Exception $e) {
    http_response_code(401);
    echo $e->getMessage();
}


 ?>
