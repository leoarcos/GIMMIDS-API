<?php

include_once '../DTO/consultasGes_DTO.php';



$inst = new consultasGes_DTO();

$dataOut= $inst->listarConsultasPaciente($_POST['datos']);



echo json_encode($dataOut);

?>