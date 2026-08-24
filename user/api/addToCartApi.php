<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$token = $_POST['token'];
$privateKey = "ghsdoafd-9e40324709374435894vn9tb5rt";

try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->data->role=='user'){
   $userid = $decodeToken->data->id;
   $productid = $_POST['productid'];
   $qnt = $_POST['qnt'];
   $checkProduct = "SELECT * FROM cart WHERE user_id='$userid' AND product_id='$productid'";
   $productRes = $db->query($checkProduct);
   if($productRes->num_rows>0){
     $data = $productRes->fetch_assoc();
     $newQnt = $data['qnt']+$qnt;
     $updateQnt = "UPDATE cart SET qnt='$newQnt' WHERE user_id='$userid' AND product_id='$productid' ";
     $db->query($updateQnt);
     http_response_code(200);
     echo "Product added into cart";
   }else {
      $sqlCode = "INSERT INTO cart (product_id,user_id,qnt)
      VALUES ('$productid','$userid','$qnt')";
      $db->query($sqlCode);
      http_response_code(200);
      echo "Product added into cart";
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
