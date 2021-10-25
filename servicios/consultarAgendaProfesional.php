<?php

include_once '../DTO/agendaServicios_DTO.php';


$inst=new agendaServicios_DTO();

$dataOut = $inst->consultarAgendaProfesional($_POST['datos'], $_POST['key']);



echo json_encode($dataOut);

?>