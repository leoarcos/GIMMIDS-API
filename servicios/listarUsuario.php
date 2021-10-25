<?php

include_once '../DTO/usuarios_DTO.php';





$inst = new usuarios_DTO();

$dataOut= $inst->listarUsuario($_POST['data']);



echo json_encode($dataOut);

?>