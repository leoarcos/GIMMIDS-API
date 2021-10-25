<?php

include_once '../DAO/consultasEnfermeria_DAO.php';



class consultasEnfermeria_DTO

{

	

	function __construct()

	{

		# code...

	}

	

	public function listarConsultas($key){

		

		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasId($id){

		

		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 

	public function listarConsultasPaciente($datos){

		

		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos);

		return $dataOut;

	} 

	public function registrarConsultas($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultas($data);

				

		return $dataOut;

	} 

	public function updateNurseConsultation($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->updateNurseConsultation($data);

				

		return $dataOut;

	} 
	public function updateEnfermeriaConsultationCIE($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->updateEnfermeriaConsultationCIE($data);

				

		return $dataOut;

	} 
	public function updateEnfermeriaConsultationPlan($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->updateEnfermeriaConsultationPlan($data);

				

		return $dataOut;

	} 
	public function updateNurseConsultationIdPaciente($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->updateNurseConsultationIdPaciente($data);

				

		return $dataOut;

	} 
	public function registerNurseConsultation($data){
		
		$inst= new consultasEnfermeria_DAO();
		
		$dataOut=$inst->registerNurseConsultation($data);

				

		return $dataOut;

	} 
	
	public function registrarConsultaEnfermeria($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultaEnfermeria($data);

				

		return $dataOut;

	}
	public function registrarConsultaEnfermeriaA($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultaEnfermeriaA($data);

				

		return $dataOut;

	}
	public function registrarConsultaEnfermeriaB($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultaEnfermeriaB($data);

				

		return $dataOut;

	}
	public function registrarConsultaEnfermeriaC($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultaEnfermeriaC($data);

				

		return $dataOut;

	}
	public function registrarConsultaEnfermeriaD($data){
 
		$inst= new consultasEnfermeria_DAO();

		$dataOut=$inst->registrarConsultaEnfermeriaD($data);

				

		return $dataOut;

	}

}

//new app_DTO()->listarMunicipios();





