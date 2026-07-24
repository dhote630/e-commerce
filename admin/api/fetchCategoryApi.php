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
  $code = "SELECT * FROM category ";
  $res = $db->query($code);
  $category = [];
  while($data = $res->fetch_assoc()){
    array_push($category,["Id" => $data['id'],"Name" => $data['category_name']]);
  }
  http_response_code(200);
  echo json_encode($category);
  } else{
    http_response_code(401);
    echo "unauthorized....";
  }
} catch (\Exception $e) {
 http_response_code(401);
 echo $e->getMessage();
}


 ?>
