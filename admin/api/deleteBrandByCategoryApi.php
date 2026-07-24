<?php
include("db.php");
include("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$privateKey = "gkdfweuorfejhfrt3w478945hrh4t5o9thnk5r09ur9-tjfd;-0";
$token = $_POST['token'];
try {
$decodeCode = JWT::decode($token,new Key($privateKey,'HS256'));
if($decodeCode->role='admin'){
 $sqlCode ="DELETE FROM brand WHERE cat_id NOT IN ( SELECT id FROM category )";
 $db->query($sqlCode);
 http_response_code(200);
 echo "success";
} else {
  http_response_code(401);
  echo "unauthorized...";
}
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}

 ?>
