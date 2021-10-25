<?php

include_once '../DAO/consultasNutricional_DAO.php';



class consultasNutricional_DTO

{

	

	function __construct()

	{

		# code...

	}

	
	
	public function listarConsultasId($id){

		

		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	public function updateNutriConsultation($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->updateNutriConsultation($data);

				

		return $dataOut;

	} 
	public function updateNutriConsultationCIE($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->updateNutriConsultationCIE($data);

				

		return $dataOut;

	} 
	public function updateNutriConsultationPlan($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->updateNutriConsultationPlan($data);

				

		return $dataOut;

	} 
	public function registerNutriConsultation($data){
		
		$inst= new consultasNutricional_DAO();
		
		$dataOut=$inst->registerNutriConsultation($data);

				

		return $dataOut;

	} 

	public function listarConsultas($key){

		

		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasPaciente($datos){

		

		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos);

		return $dataOut;

	} 

	public function registrarConsultas($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultas($data);

				

		return $dataOut;

	} 
	public function registrarConsultaNutricional($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultaNutricional($data);

				

		return $dataOut;

	} 
	public function registrarConsultaNutricionalA($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultaNutricionalA($data);

				

		return $dataOut;

	} 
	public function registrarConsultaNutricionalB($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultaNutricionalB($data);

				

		return $dataOut;

	} 
	public function registrarConsultaNutricionalC($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultaNutricionalC($data);

				

		return $dataOut;

	} 
	public function registrarConsultaNutricionalD($data){
 
		$inst= new consultasNutricional_DAO();

		$dataOut=$inst->registrarConsultaNutricionalD($data);

				

		return $dataOut;

	} 
}

//new app_DTO()->listarMunicipios();





