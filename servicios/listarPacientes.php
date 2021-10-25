<?php

include_once '../DTO/pacientes_DTO.php';
 
$inst = new pacientes_DTO();

$dataOut= $inst->listarPacientes($_POST['key']); 
$json= json_encode($dataOut);  
echo $json;
?>