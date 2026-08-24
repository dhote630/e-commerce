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
    $cartQuery = "SELECT cart.id,cart.qnt,product.id As productsid,
    product.title,product.description,product.price,product.front_pic
    FROM cart LEFT JOIN product ON cart.product_id= product.id
    WHERE user_id='$userid'";
    $res = $db->query($cartQuery);
    if($res->num_rows>0){
      $tmp = [];
      while($data = $res->fetch_assoc()){
        $tmp[] = $data;
      }
      http_response_code(200);
      echo json_encode($tmp);
    }else {
      http_response_code(404);
      echo "not found";
    }
  }else {
    http_response_code(401);
    echo "unauthorized...";
  }

} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}


 ?>
