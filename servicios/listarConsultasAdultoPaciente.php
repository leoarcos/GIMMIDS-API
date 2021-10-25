<?php

include_once '../DTO/consultasG_DTO.php';





$inst = new consultasG_DTO();

$dataOut= $inst->listarConsultasPaciente($_POST['datos']);



echo json_encode($dataOut);

?>