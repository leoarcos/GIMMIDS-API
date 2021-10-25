<?php

include_once '../DTO/consultasEnfermeria_DTO.php';





$inst = new consultasEnfermeria_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>