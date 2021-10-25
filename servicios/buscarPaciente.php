<?php
include_once '../DTO/pacientes_DTO.php';


$inst = new pacientes_DTO();
$dataOut= $inst->buscarPaciente($_POST['cc'], $_POST['id'],$_POST['key']);

echo json_encode($dataOut);
?>