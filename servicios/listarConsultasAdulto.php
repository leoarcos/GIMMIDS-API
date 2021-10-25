<?php

include_once '../DTO/consultasG_DTO.php';





$inst = new consultasG_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>