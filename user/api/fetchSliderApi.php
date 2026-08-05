<?php

include("db.php");
$code = "SELECT * FROM slider ";
$res = $db->query($code);
if($res->num_rows>0){
  $tmpData = [];
  while($data = $res->fetch_assoc()){
    $tmpData[] = $data;
  }
  http_response_code(200);
  echo json_encode($tmpData);
} else {
  http_response_code(401);
  echo "data not found";
}

 ?>
