<?php
include_once '../DTO/pacientes_DTO.php'; 
$inst=new pacientes_DTO();
//$dataOut = $inst->registrarPaciente(json_decode($_POST['datos'], true));
$dataOut = $inst->registrarPaciente($_POST['datos'], $_POST['key']);
echo json_encode($dataOut);
?>