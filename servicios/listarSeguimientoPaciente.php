<?phpinclude_once '../DTO/pacientes_DTO.php';    $inst=new pacientes_DTO();$dataOut = $inst->listarSeguimientoPaciente($_POST['datos']);echo json_encode($dataOut); ?>