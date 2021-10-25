<?php

 
$rutaArchivo=$_POST['tipodoc'].$_POST['numdoc']."-".$_POST['nombreaFile'].".pdf";

if (move_uploaded_file($_FILES["myfile"]['tmp_name'], $rutaArchivo)){ 
    //ya se cargo, se procede a ingresar a la base de datos
    require_once("../db/Database.php");
    

    $instance = Database::getInstance();
    if ($instance == NULL) {
        $db = new Database();
        $instance = $db->getInstance();
    }
    
    $result = array();
    $result['DATA']=[];
    if(hash("SHA256",$_POST['key'])==$instance->key){
        $sql ="INSERT INTO `filesupload`(`id_paciente`, `file`, `nombre`, `doc_user_sube`, `tipodoc`, `numdoc`) VALUES ( :id_paciente,  :rutaArchivo, :nombreaFile, :doc_user_sube, :tipodoc, :numdoc)";
        $dbh=$instance->__connection;

        $stmt = $dbh->prepare($sql);
        // Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dataIn=array(
            ":id_paciente" => intVal($_POST['id_paciente']),
            ":rutaArchivo" => $rutaArchivo,
            ":nombreaFile" => $_POST['nombreaFile'],
            ":doc_user_sube" => intVal($_POST['doc_user_sube']),
            ":tipodoc" => $_POST['tipodoc'],
            ":numdoc" => $_POST['numdoc']
        );
        try { 
            $stmt->execute($dataIn);
            if ($stmt){
                $result['STATUS'] = "OK";
                $result['ID'] = $dbh->lastInsertId(); 
            }
        } catch (PDOException $errr) { 
            $result['ERROR'] = $error->getMessage();
        } 
        
        
    }else{
        $result['STATUS'] = 'ERROR';
        $result['ERROR'] = 'Llaves incorrectas';
    }
    
    echo JSON_encode($result);
    
    
    
}else{
    $data['ERROR']="Ocurrio algun error al subir el fichero {$nombre_archivo}. No pudo guardarse.";
    $data['STATUS']="ERROR";
    echo JSON_encode($data);
    //$errors[] = "Ocurrio algun error al subir el fichero {$nombre_archivo}. No pudo guardarse.";
}
/*
if(count($errors) > 0) {
 showErrors($errors);
}
*/
?>