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
    $cat = $_POST['category'];

    $code = "SELECT * FROM category WHERE category_name='$cat'";
    $res = $db->query($code);
    if($res->num_rows>0){
      http_response_code(409);
      echo "category already exist";
    }else{
      $sqlCode = "INSERT INTO category(category_name)VALUES('$cat')";
      $db->query($sqlCode);
      http_response_code(200);
      echo "category  created";
    }
  }else {
    http_response_code(401);
    echo "unauthorized ...";
  }
} catch (\Exception $e) {
  http_response_code(401);
  echo $e->getMessage();
}
 ?>
