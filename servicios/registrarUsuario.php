<?php

include_once '../DTO/usuarios_DTO.php';





$inst = new usuarios_DTO();

$dataOut= $inst->registrarUsuario($_POST['datos'], $_POST['key']);



echo json_encode($dataOut);

?>