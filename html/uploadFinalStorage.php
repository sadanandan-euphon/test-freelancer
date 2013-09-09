<?php
session_start();
require_once '../files/config/config.php';
$echoarray = array();

//*** FILTER ****

//Upload check...
if(!isset($_POST))
{
    $echoarray['meldung'] = 'Es wurden keine daten hochgeladen';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

if( !isset($_POST['options']['src']) ||
    !isset($_POST['options']['brand']) ||
    !isset($_POST['options']['category']) ||
    !isset($_POST['options']['subcategory']) ||
    !isset($_POST['options']['price']) ||
    !isset($_POST['options']['city']) ||
    !isset($_POST['options']['shop'])){
        $echoarray['meldung'] = 'Nicht alle Optionen gesetzt.';
        echo json_encode(array("echoarray" => $echoarray));
        exit;
}

//Check Options...
$idbrand = security($_POST['options']['brand']);
$idcategory = security($_POST['options']['category']);
$idsubcategory = security($_POST['options']['subcategory']);
$idprice = security($_POST['options']['price']);
$idcity = security($_POST['options']['city']);
$idshop = security($_POST['options']['shop']);


//Copy file...
$oldsrc = security($_POST['options']['src']);
$dname = explode(".", $oldsrc);
$extension = $dname[count($dname)-1];
$uniqid = uniqid('', true);
$newsrc = '../files/images/'.$uniqid.'.'.$extension;

if(!copy($oldsrc, $newsrc)){
    $echoarray['meldung'] = 'Datei konnte nicht in Zielordner transferiert werden';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

//Generate picture id
$query = "INSERT INTO pic (pathpic) VALUES ('$newsrc')";
mysql_query($query);
if(mysql_affected_rows()=== 0){
    $echoarray['meldung'] = 'Pfad konnte nicht in Picture Tabelle geschreiben werden';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

//Get picture id
$query = "Select idpic from pic WHERE pathpic LIKE '$newsrc'";
$result = mysql_query($query);
if(mysql_affected_rows()){
    $datensatz = mysql_fetch_assoc($result);
    $idpic = $datensatz['idpic'];
}else{
    $echoarray['meldung'] = 'Picture ID konnte nicht generiert werden';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}
                        
//Delete old file...
unlink($oldsrc);

//Insert Data...
$iduser = '1';
$idcolor = '2';

$query = "INSERT INTO picoverview (iduser, idpic, idcategory, idsubcategory, idcity, idshop, idbrand, idprice, idcolor, timestamp) 
          VALUES ('$iduser', '$idpic', '$idcategory', '$idsubcategory', '$idcity', '$idshop', '$idbrand', '$idprice', '$idcolor', NOW())";
mysql_query($query);

if(mysql_affected_rows()=== 0){
    $echoarray['meldung'] = 'Daten koennen nicht in die Datenbank geschrieben werden.';
    echo json_encode(array("echoarray" => $echoarray));
}