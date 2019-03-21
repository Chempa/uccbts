<?php
$servername = "localhost";
$username = "id9016744_server";
$password = "KIMPA7CB";
$db_name= "id9016744_btsucc_db";

$bus = $_GET["busid"];
$lat = floatval($_GET["lat"]);
$lon = floatval($_GET["lon"]);
// $speed = $_GET["speed"];

//The URL that we want to send a PUT request to.

$url = 'https://ucc-shuttle-tracker-app.firebaseio.com/coordinates.json';
$id = "";
if($bus == "A"){
    $id = "5b02e04f60b4261e1bae6e58";
}else if($bus == "B"){
    $id = "5b02e09160b4261e1bae6e72";
}else if($bus == "C"){
    $id = "5b02e06560b4261e1bae6e63";
}else if($bus == "D"){
    $id = "5b02e08160b4261e1bae6e70";
}else{
    $id = "None";
}

$data = array("id"=>$id,"busName"=>$bus,"lat"=>$lat,"lon"=>$lon);

if($id != "None"){
    $data_json = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
    echo "success: ".$response;
}else{
    echo "Failed";
}

?>
