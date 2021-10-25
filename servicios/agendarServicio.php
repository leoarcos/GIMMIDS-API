<?php

include_once '../DTO/agendaServicios_DTO.php';


$inst=new agendaServicios_DTO();

$dataOut = $inst->registrarAgendaServicio($_POST['datos'], $_POST['key']);



echo json_encode($dataOut);

?>