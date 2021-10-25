<?php

include_once '../DTO/consultasM_DTO.php';





$inst = new consultasM_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>