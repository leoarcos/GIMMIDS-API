<?php

include_once '../DTO/consultasGes_DTO.php';

//print_r($_POST['datos']);

$inst=new consultasGes_DTO();

$dataOut = $inst->registerPregnantConsultation($_POST['datos'],$_POST['key']);



echo json_encode($dataOut);

?>