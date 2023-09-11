<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

include "connection.php";

$start  = $_GET["start"];
$end    = $_GET["end"];
$groups = $_GET["groups"];

$factor = $groups / ($end - $start);

$sql = 
  "SELECT `date`, 
  AVG(`open`) as `open`, 
  SUM(`volume_usd`) AS `volume_usd` 
  FROM `btc_prices` 
  WHERE `unix` > $start 
  AND `unix` < $end 
  GROUP BY CAST(`unix` * $factor AS UNSIGNED)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    printf("Error2: %s\n", mysqli_error($conn));
    exit;
}

$date = [];
$open = [];
$volume_usd = [];

while($row = mysqli_fetch_assoc($result)) {
    array_push($date, $row['date']);  
    array_push($open, $row['open']);
    array_push($volume_usd, $row['volume_usd']);  
}

$obj=new stdClass;
$obj->sql = $sql;
$obj->date = $date;
$obj->open = $open;
$obj->volume_usd = $volume_usd;

$myJSON = json_encode($obj);

echo $myJSON;

?>