<?php
    include_once '../DTO/procedimientos_DTO.php';
     
    $inst=new procedimientos_DTO();
    $dataOut = $inst->registrarProcedimientos($_POST['datos']);
    
    echo json_encode($dataOut);
?>