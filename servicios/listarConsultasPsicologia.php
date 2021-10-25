<?php

include_once '../DTO/consultasPsicologia_DTO.php';





$inst = new consultasPsicologia_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>