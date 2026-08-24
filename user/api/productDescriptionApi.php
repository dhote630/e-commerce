<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$token = $_GET['token'];
$privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";

try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->data->role=='user'){
   $userid = $decodeToken->data->id;
   $productid = $_GET['productid'];
   $sqlCode = "SELECT
   product.id,
   product.quantity,
   product.title,
   product.description,
   product.price,
   product.front_pic,
   product.back_pic,
   product.left_pic,
   product.right_pic,
   brand.brand_name,
   category.category_name
   FROM product LEFT JOIN brand ON product.brand_id=brand.id
   LEFT JOIN category ON brand.cat_id=category.id WHERE product.id='$productid'";
   $res = $db->query($sqlCode);
   if($res->num_rows>0){
     $data = $res->fetch_assoc();
     http_response_code(200);
     echo json_encode($data);
   }else {
     http_response_code(404);
     echo "data not found";
   }
 } else {
   http_response_code(401);
   echo "unauthorized...";
 }
} catch (\Exception $e) {
 http_response_code(401);
 echo $e->getMessage();
}


 ?>
