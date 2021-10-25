<?php

include_once '../DTO/consultas_DTO.php';



$inst=new consultas_DTO();

$dataOut = $inst->registerGeneralConsultation($_POST['datos']);



echo json_encode($dataOut);

?>