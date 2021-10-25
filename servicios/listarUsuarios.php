<?php

include_once '../DTO/usuarios_DTO.php';

 


$inst = new usuarios_DTO();

$dataOut= $inst->listarUsuarios($_POST['institucion'], $_POST['key']);



echo json_encode($dataOut);

?>