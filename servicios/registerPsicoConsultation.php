<?php


include_once '../DTO/consultasPsicologia_DTO.php';



$inst=new consultasPsicologia_DTO();

$dataOut = $inst->registerPsicoConsultation($_POST['datos']);



echo json_encode($dataOut);

?>