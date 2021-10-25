<?php


require_once("../db/Database.php");

$instance = Database::getInstance();
if ($instance == NULL) {
    $db = new Database();
    $instance = $db->getInstance();
}

$result = array();
$result['DATA']=[];
if(hash("SHA256",$_POST['key'])==$instance->key){
    $sql ="SELECT * FROM `filesupload` WHERE tipodoc=:tipoid AND numdoc=:numid ORDER BY fecha_subida DESC";
    $dbh=$instance->__connection;

    $stmt = $dbh->prepare($sql);
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $dataIn=array(
        ":tipoid" => $_POST['tipoid'],
        ":numid" => $_POST['numid']
    );
    try { 
        $stmt->execute($dataIn);
        if ($stmt){
            $result['STATUS'] = "OK"; 
        }
    } catch (PDOException $errr) { 
        $result['ERROR'] = $error->getMessage();
    } 
    while ($row = $stmt->fetch()){
        $result['DATA'][] = $row; 
    }
    if(!isset($result['DATA'])){
        $result['ERROR']=$dbh->errorInfo();
    }
    
    
}else{
    $result['STATUS'] = 'ERROR';
    $result['ERROR'] = 'Llaves incorrectas';
}

echo JSON_encode($result);



 
?>