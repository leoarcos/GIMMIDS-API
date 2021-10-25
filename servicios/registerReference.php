<?php


include_once '../DTO/referencias_DTO.php';



$inst=new referencias_DTO();

$dataOut = $inst->registerReference($_POST['datos']);



echo json_encode($dataOut);

?>