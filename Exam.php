<?php
require_once'function/DBConnectionHandler.php'

$serverName = "140.127.74.201:9001";
$userName = "root";
$password = "root";
$db = "bigdata";

try {
    DBConnectionHandler::setConnection(
        $serverName,
        $userName,
        $password,
        $db
    );

    $connection = DBConnectionHandler::getConnection();
    echo "success!";
}catch(PDOException $e){
    echo "ERROR ".$spl."<br>". $e->getMessage();

//2-1
$sql2_1 = "SELECT DISTINCT dp001_video_item_sn, dp001_indicator FROM edu_bigdata_imp1 WHERE PseudoID =: ID";
$stml2_1 = $connection->prepare($sql2_1);
$stml2_1->bindValue(':ID',281);
$stml2_1->excute();
$r2_1 = $stml2_1->fetchAll(PDO::FETCH_ASSOC);
print($r2_1);

//2-2
$sql2_2 = "SELECT COUNT(DISTINCT dp001_prac_score_rate) FROM edu_bigdata_imp1 WHERE PseudoID =: ID AND dp001_prac_score_rate =: RATE";
$stml2_2 = $connection->prepare($sql2_2);
$stml2_2->bindValue(':ID',281);
$stml2_2->bindValue(':RATE',100);
$stml2_2->excute();
$r2_2 = $stml2_2->fetchAll(PDO::FETCH_ASSOC);
print($r2_2);

//4-1
$sql4_1 = "SELECT dp001_video_item_sn, COUNT(DISTINCT dp001_video_item_sn) AS result FROM edu_bigdata_imp1 WHERE dp001_video_item_sn ORDER BY result DESC LIMIT 1";
$stml4_1 = $connection->prepare($sql4_1);
$stml4_1->excute();
$r4_1 = $stml4_1->fetchAll(PDO::FETCH_ASSOC);
print($r4_1);

//4-2
$sql4_2 = "SELECT COUNT(DISTINCT dp002_extensions_alignment) FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment =: extensions";
$stml4_2 = $connection->prepare($sql4_2);
$stml4_2->bindValue(':extensions','十二年國民基本教育類');
$stml4_2->excute();
$r4_2 = $stml4_2->fetchAll(PDO::FETCH_ASSOC);
print($r4_2);

//4-3
$sql4_3 = "SELECT dp002_verb_display_zh_TW,COUNT(dp002_verb_display_zh_TW) AS order FROM edu_bigdata_imp1 WHERE dp002_verb_display_zh_TW =: VA ORDER BY order DESC  LIMIT 3";
$stml4_3 = $connection->prepare($sql4_3);
$stml4_3->bindValue(':VA','NA');
$stml4_3->excute();
$r4_3 = $stml4_3->fetchAll(PDO::FETCH_ASSOC);
print($r4_3);

//4-4
$sql4_4 = "SELECT COUNT(DISTINCT dp002_extensions_alignment) FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment =: extensions";
$stml4_4 = $connection->prepare($sql4_4);
$stml4_4->bindValue(':extensions','校園職業安全');
$stml4_4->excute();
$r4_4 = $stml4_4->fetchAll(PDO::FETCH_ASSOC);
print($r4_4);
}
?>