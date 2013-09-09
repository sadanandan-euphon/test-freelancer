<?php
session_start();
require_once '../files/config/config.php';
$echoarray = array();

//Login check
//if(isset($_SESSION["istangemeldet"]) && 1 != $_SESSION["istangemeldet"])
//{
//    
//    $echoarray['meldung'] = 'Bitte anmelden';
//    echo json_encode(array("echoarray" => $echoarray));
//    exit;
//}

//Upload check
if(!isset($_FILES['file']))
{
    $echoarray['meldung'] = 'Es wurde keine Datei ausgewählt';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

if($_FILES['file']['error']>0)
{
    switch ($_FILES['file']['error'])
    {
        case 1: $echoarray['meldung'] = 'Wert upload_max_filesize überschritten';
                break;
        case 2: $echoarray['meldung'] = 'Wert max_file_size überschritten';
                break;
        case 3: $echoarray['meldung'] = 'Die Datei wurde unvollständig hochgeladen';
                break;
        case 4: $echoarray['meldung'] = 'Es wurde keine Datei hochgeladen';
                break;
        case 6: $echoarray['meldung'] = 'Datei kann nicht hochgeladen werden: Kein tmp.';
                break;
        case 7: $echoarray['meldung'] = 'Datei kann nicht geschrieben werden.';
    }
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

// Type check

$allowedExts = array("jpg", "jpeg", "gif", "png");
$dname = explode(".", $_FILES["file"]["name"]);
$extension = $dname[count($dname)-1];
$size = (2000000);

if(!in_array($extension, $allowedExts))
{
    $echoarray['meldung'] = 'Nur die Formate "jpeg", "gif", "png" sind erlaubt.';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

if($_FILES["file"]["size"] > $size)
{
    $echoarray['meldung'] = 'Die Datei ist zu groß (Max 2MB).';
    echo json_encode(array("echoarray" => $echoarray));
    exit;
}

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] <= $size)
&& in_array($extension, $allowedExts))
{
        //Move File
        
        $uniqid = uniqid('', true);
        $upfile = '../files/imagestransfer/'.$uniqid.'.'.$extension;
        
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
            {
                $echoarray['meldung'] = 'Datei wurde nicht in das Zielverzeichnis verschoben';
                echo json_encode(array("echoarray" => $echoarray));
                exit;
            }
            
            $echoarray['meldung'] = 'Die Datei wurde erfolgreich hochgeladen.';
            $echoarray['imgdata'] = '<img width="100%" height="100%" src="'.$upfile.'">';
            echo json_encode(array("echoarray" => $echoarray));
        }else
        {
            $echoarray['meldung'] =  'Möglicher Angriff beim Hochladen.';
            echo json_encode(array("echoarray" => $echoarray));
        }
        
//        $userid = $_SESSION["id"];
//        $filesize = $_FILES["file"]["size"];
//        $filetype = $_FILES["file"]["type"];
//        $query = "INSERT INTO picupload (id, userid, path, size, type, active) VALUES ('$uniqid','$userid','$upfile', '$filesize', '$filetype', '1')";
//        mysql_query($query);
//        
//        if(mysql_affected_rows() == 1)
//        {
//            $echoarray['meldung'] = 'Die Datei wurde erfolgreich hochgeladen.<br><br>';
//            $echoarray['imgdata'] = '<img width="100%" height="100%" src="'.$upfile.'">';
//            echo json_encode(array("echoarray" => $echoarray));
//            
//        }else
//        {
//            $echoarray['meldung'] = 'Daten koennen nicht in Datenbank geschrieben werden.';
//            echo json_encode(array("echoarray" => $echoarray));
//        }
}