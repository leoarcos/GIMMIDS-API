<?php

include_once '../DTO/consultasNutricional_DTO.php';





$inst = new consultasNutricional_DTO();

$dataOut= $inst->listarConsultasPaciente($_POST['datos']);



echo json_encode($dataOut);

?>