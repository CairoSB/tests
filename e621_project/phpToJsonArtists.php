<?php
// PHP code to get and show data from artists table from mine database.
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("cpanel.formaweb.com.br", "cairo_testes", "kDBg4bdUEyAE", "cairo_testes");

$result = $conn->query("SELECT ID, name, nameAbbr, status, bDay, description, site, tagList, tagFocus FROM artists");

$outp = "";
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"ID":"'         . $row["ID"]          . '",';
    $outp .= '"name":"'        . $row["name"]        . '",';
    $outp .= '"nameAbbr":"'    . $row["nameAbbr"]    . '",';
    $outp .= '"status":"'      . $row["status"]      . '",';
    $outp .= '"bDay":"'        . $row["bDay"]        . '",';
    $outp .= '"description":"' . $row["description"] . '",';
    $outp .= '"site":"'        . $row["site"]        . '",';
    $outp .= '"tagList":"'     . $row["tagList"]     . '",';
    $outp .= '"tagFocus":"'    . $row["tagFocus"]    . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>