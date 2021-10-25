<?php



include_once '../DAO/procedimientos_DAO.php';


class procedimientos_DTO

{


	function __construct()



	{



		# code...



	}



	



	public function listarProcedimientos(){



		



		$inst= new procedimientos_DAO();



		$dataOut=$inst->listarProcedimientos();



		return $dataOut;



	} 



	public function registrarProcedimientos($data){

		$inst= new procedimientos_DAO();



		$dataOut=$inst->registrarProcedimientos($data);
		return $dataOut;



	} 
	public function listarProcedimientosPaciente($data){

		$inst= new procedimientos_DAO();



		$dataOut=$inst->listarProcedimientosPaciente($data);
		return $dataOut;



	} 
	function listarProcedimientoID($data){
	 
	 	$inst= new procedimientos_DAO();



		$dataOut=$inst->listarProcedimientoID($data);
		return $dataOut;
   
	}

}