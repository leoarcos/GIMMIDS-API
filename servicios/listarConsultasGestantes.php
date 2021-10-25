<?php

include_once '../DTO/consultasGes_DTO.php';





$inst = new consultasGes_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>