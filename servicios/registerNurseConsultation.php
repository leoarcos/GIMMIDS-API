<?php


include_once '../DTO/consultasEnfermeria_DTO.php';



$inst=new consultasEnfermeria_DTO();

$dataOut = $inst->registerNurseConsultation($_POST['datos']);



echo json_encode($dataOut);

?>