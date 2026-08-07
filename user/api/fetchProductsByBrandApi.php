<?php

include("db.php");
$brandid = $_GET['brandid'];
$sqlCode = "SELECT product.*,brand.id AS brandid,brand.brand_name
 FROM brand INNER JOIN product ON brand.id = product.brand_id WHERE brand.id='$brandid'";
 $response = $db->query($sqlCode);
 if($response->num_rows>0){
   $tmpData[] ='';
   while($data = $response->fetch_assoc()){
     $tmpData[] = $data;
   }
   http_response_code(200);
   echo json_encode($tmpData);
 } else {
   http_response_code(404);
   echo "Data Not Found";
 }

 ?>
