<?php
// PHP version to get data from mine ColtQuestChapters database and convert to a Jason format.

header("Content-Type: application/json; charset=UTF-8");
include 'config.php';

$result = $conn->query("SELECT chapterNumber, threadNumber, epub, publicationDate FROM ColtQuestChapters");
$outp = "";
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"threadNumber":"'   . $row["threadNumber"]    . '",';
    $outp .= '"chapterNumber":"'   . $row["chapterNumber"]   . '",';
    $outp .= '"epub":"'            . $row["epub"]            . '",';
    $outp .= '"publicationDate":"' . $row["publicationDate"] . '"}';
};
$outp ='{"records":['.$outp.']}';

mysqli_close($conn);

echo($outp);
?>