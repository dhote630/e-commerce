<?php

include("db.php");
$sqlCode = "SELECT GROUP_CONCAT(brand.brand_name,'=',brand.id) As brands,
 category.category_name,category.id,brand.id AS brandid
FROM category INNER JOIN brand ON category.id = brand.cat_id GROUP BY brand.cat_id;";
$response = $db->query($sqlCode);
if($response->num_rows>0){
  $tmpData = [];
 while($data = $response->fetch_assoc()){
   $tmpData[] = $data;
 }
 http_response_code(200);
 echo json_encode($tmpData);
} else {
  http_response_code(200);
  echo "data not found";
}
 ?>
