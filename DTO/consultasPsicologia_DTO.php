<?php

include_once '../DAO/consultasPsicologia_DAO.php';



class consultasPsicologia_DTO

{

	

	function __construct()

	{

		# code...

	}

	

	public function listarConsultas($key){

		

		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	
	public function listarConsultasId($id){

		

		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	public function listarConsultasPaciente($datos){

		

		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos );

		return $dataOut;

	} 

	public function updatePsicoConsultation($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->updatePsicoConsultation($data);

				

		return $dataOut;

	} 

	public function updatePsicoConsultationCIE($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->updatePsicoConsultationCIE($data);

				

		return $dataOut;

	} 

	public function updatePsicoConsultationPlan($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->updatePsicoConsultationPlan($data);

				

		return $dataOut;

	} 
	public function updatePsicoConsultationIdPaciente($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->updatePsicoConsultationIdPaciente($data);

				

		return $dataOut;

	} 
	public function registerPsicoConsultation($data){
		
		$inst= new consultasPsicologia_DAO();
		
		$dataOut=$inst->registerPsicoConsultation($data);

				

		return $dataOut;

	} 
	
	public function registrarConsultas($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultas($data);

				

		return $dataOut;

	} 
	
	public function registrarConsultaPsicologia($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultaPsicologia($data);

				

		return $dataOut;

	}
	public function registrarConsultaPsicologiaA($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultaPsicologiaA($data);

				

		return $dataOut;

	}
	public function registrarConsultaPsicologiaB($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultaPsicologiaB($data);

				

		return $dataOut;

	}
	public function registrarConsultaPsicologiaC($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultaPsicologiaC($data);

				

		return $dataOut;

	}
	public function registrarConsultaPsicologiaD($data){
 
		$inst= new consultasPsicologia_DAO();

		$dataOut=$inst->registrarConsultaPsicologiaD($data);

				

		return $dataOut;

	}
}

//new app_DTO()->listarMunicipios();





