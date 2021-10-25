<?php
    include_once '../DTO/procedimientos_DTO.php';
    
    $inst=new procedimientos_DTO();
    $dataOut = $inst->listarProcedimientoID($_POST['datos']);
    
    echo json_encode($dataOut);
?>