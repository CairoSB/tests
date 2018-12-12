<?php

//PHP code to ADD data to CQ database, it even check fist id the data is not empty and say if it was successfully.
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'config.php';

$chapterN = utf8_decode($_POST['chapter']);
$threadN = utf8_decode($_POST['thread']);
$pubD = utf8_decode($_POST['date']);
$epub = "https://data.anonpone.com/serve/thread/coltquest/$threadN?type=epub";


if(!empty($chapterN) && !empty($threadN) && !empty($pubD)){

    //INCLUIR
    $queryInclui = "INSERT INTO ColtQuestChapters (chapterNumber, threadNumber, epub, publicationDate) VALUES ('".$chapterN."','".$threadN."', '".$epub."', '".$pubD."')";
    $inclui = mysqli_query($conn,$queryInclui);
    if($inclui):
        mysqli_close($conn);
        echo("Item adicionado!!");
        header("location: CQlinks.html?enviado=ok");
    else:
        mysqli_close($conn);
        echo("Erro, algum problema em salvar no banco de dados!!");
        header("location: CQlinks.html?enviado=nok");
    endif;
}else{
    mysqli_close($conn);
    echo("Erro, algum campo vazio!!");
    header("location: CQlinks.html?campos=nok");
}
//gulp
//heroku
?>