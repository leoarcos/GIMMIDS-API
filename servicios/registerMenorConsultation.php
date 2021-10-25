<?php


include_once '../DTO/consultasM_DTO.php';



$inst=new consultasM_DTO();

$dataOut = $inst->registerMenorConsultation($_POST['datos']);



echo json_encode($dataOut);

?>