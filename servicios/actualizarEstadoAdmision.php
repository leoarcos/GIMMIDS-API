<?php

include_once '../DTO/agendaServicios_DTO.php';


$inst=new agendaServicios_DTO();

$dataOut = $inst->actualizarEstadoAdmision($_POST['datos']);



echo json_encode($dataOut);

?>