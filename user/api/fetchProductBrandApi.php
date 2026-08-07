<?php

include("db.php");
$sqlCode = "SELECT * FROM product ORDER BY RAND()";
$response = $db->query($sqlCode);
if($response->num_rows>0){
  $tmpData = [];
  while($data = $response->fetch_assoc()){
     $tmpData[] = $data;
  }
  http_response_code(200);
  echo json_encode($tmpData);
} else {
  http_response_code(404);
  echo "data not found";
}

?>
