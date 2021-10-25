<?php

include_once '../DTO/consultasNutricional_DTO.php';





$inst = new consultasNutricional_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>