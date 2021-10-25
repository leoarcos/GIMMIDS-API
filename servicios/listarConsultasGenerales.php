<?php

include_once '../DTO/consultas_DTO.php';





$inst = new consultas_DTO();

$dataOut= $inst->listarConsultas($_POST['key']);



echo json_encode($dataOut);

?>