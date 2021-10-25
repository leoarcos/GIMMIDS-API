<?php

include_once '../DAO/consultasG_DAO.php';



class consultasG_DTO

{

	

	function __construct()

	{

		# code...

	}

	
	public function listarConsultasId($id){

		

		$inst= new consultasG_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	public function updateAdultConsultation($data){
 
		$inst= new consultasG_DAO();

		$dataOut=$inst->updateAdultConsultation($data);

				

		return $dataOut;

	} 
	public function registerAdultConsultation($data){
		
		$inst= new consultasG_DAO();
		
		$dataOut=$inst->registerAdultConsultation($data);

				

		return $dataOut;

	} 

	public function listarConsultasG(){

		

		$inst= new consultasG_DAO();

		$dataOut=$inst->listarConsultasG();

		return $dataOut;

	} 
	public function listarConsultas($key){

		

		$inst= new consultasG_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasPaciente($datos){

		

		$inst= new consultasG_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos);

		return $dataOut;

	} 

	public function registrarConsultasG($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasG($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdulto($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdulto($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdultoA($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdultoA($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdultoB($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdultoB($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdultoC($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdultoC($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdultoD($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdultoD($data);

				

		return $dataOut;

	} 
	public function registrarConsultasAdultoE($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->registrarConsultasAdultoE($data);

				

		return $dataOut;

	} 

	public function actualizarConsultaG($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->actualizarConsultaG($data);

				

		return $dataOut;

	} 

	public function eliminarConsultaG($data){



		$inst= new consultasG_DAO();

		$dataOut=$inst->eliminarConsultaG($data);

				

		return $dataOut;

	} 

}

//new app_DTO()->listarMunicipios();





