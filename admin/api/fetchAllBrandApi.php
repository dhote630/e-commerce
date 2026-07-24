<?php

include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_GET['token'];
try {
  $decodeToken = JWT::decode($token,new Key($privateKey,'HS256'));
  if($decodeToken->role=='admin'){
    $sqlCode = "SELECT brand.*,category.category_name FROM brand LEFT JOIN category
    ON brand.cat_id=category.id";
    $res = $db->query($sqlCode);
    if($res->num_rows>0){
      $tmp = [];
     while($data = $res->fetch_assoc()){
       $tmp[] = $data;
     }
     http_response_code(200);
     echo json_encode($tmp);
    }else{
      http_response_code(404);
      echo "Data Not Found";
    }
  }else{
    http_response_code(401);
    echo "unauthorized...";
  }
} catch (\Exception $e) {
   http_response_code(401);
   echo $e->getMessage();
}


 ?>
