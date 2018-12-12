<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// add the file with the configs of the database: Login, Password, BD Name and Table Name.
include 'config.php';

//set here the fist chapter number you want to include, the rest in the array will be set in crescent order.
//Example: $chapterN = 5 then the rest of the array will be, 6, 7, 8, etc..
//If you have chapterN that is float, like 5.2, you will need to add it manualy or edit it later.
$chapterN = 5;
$threadN = "";
$epub = "";

//array of all threds you whant to add in the database.
$threadNumbers = array(25427966 ,25496118 ,25567713 ,25627820 ,25690903 ,25780963 ,25855957 ,25937938 ,25984187 ,26031482 ,26077971 ,26169872 ,26215241 ,26276766 ,26344684 ,26420099 ,26506434 ,26583931 ,26699694 ,26785919 ,26835949 ,26952063 ,27006905 ,27073199 ,27135582 ,27171621 ,27341283 ,27407128 ,27482270 ,27544514 ,27642435 ,27751367 ,27842167 ,27957851 ,28046904 ,28138751 ,28228603 ,28289633 ,28373380 ,28428369 ,28523895 ,28632191 ,28731864 ,28823614 ,28894509 ,28961264 ,29034604 ,29102212 ,29238636 ,29319359 ,29386414 ,29437403 ,29501787 ,29560860 ,29616228 ,29668282 ,29735068 ,29782196 ,29826237 ,29897809 ,29984337 ,30071265 ,30288276 ,30511144 ,30631093 ,30734082 ,30861497 ,31045005 ,31210769 ,31303525 ,31427687 ,31559407 ,31683690 ,31773503 ,31855877 ,31922288 ,32285469 ,32387573 ,32644185 ,32735992 ,32980573 ,33065492);

foreach ($threadNumbers as &$value) {
    
    $epub = "https://data.anonpone.com/serve/thread/coltquest/$threadN?type=epub";
    $queryInclui = "INSERT INTO ColtQuestChapters (chapterNumber, threadNumber, epub) VALUES ('".$chapterN."','".$value."', '".$epub."')";
    $inclui = mysqli_query($conn,$queryInclui);
    $chapterN = $chapterN + 1;  
};

?>