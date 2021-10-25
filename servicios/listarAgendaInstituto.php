<?php

include_once '../DTO/agendaServicios_DTO.php';


$inst=new agendaServicios_DTO();

$dataOut = $inst->listarAgendaInstituto($_POST['datos']);



echo json_encode($dataOut);

?>