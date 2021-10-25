<?php

include_once '../DAO/consultas_DAO.php';



class consultas_DTO

{

	

	function __construct()

	{

		# code...

	}

	

	public function listarConsultas($key){

		

		$inst= new consultas_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasId($id){

		

		$inst= new consultas_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	public function listarConsultasPaciente($datos){

		

		$inst= new consultas_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos);

		return $dataOut;

	} 

	public function registrarConsultaGeneral($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultaGeneral($data);

				

		return $dataOut;

	} 
	public function updateGeneralConsultation($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->updateGeneralConsultation($data);

				

		return $dataOut;

	} 
	public function updateGeneralConsultationCIE($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->updateGeneralConsultationCIE($data);

				

		return $dataOut;

	}  
	public function updateGeneralConsultationPlan($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->updateGeneralConsultationPlan($data);

				

		return $dataOut;

	} 
	public function updateGeneralConsultationIdPaciente($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->updateGeneralConsultationIdPaciente($data);

				

		return $dataOut;

	} 
	public function registerGeneralConsultation($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registerGeneralConsultation($data);

				

		return $dataOut;

	} 
	public function registrarConsultaGeneralA($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultaGeneralA($data);

				

		return $dataOut;

	} 
	public function registrarConsultaGeneralB($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultaGeneralB($data);

				

		return $dataOut;

	} 
	public function registrarConsultaGeneralC($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultaGeneralC($data);

				

		return $dataOut;

	} 
	public function registrarConsultaGeneralD($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultaGeneralD($data);

				

		return $dataOut;

	} 
	public function registrarConsultas($data){
 
		$inst= new consultas_DAO();

		$dataOut=$inst->registrarConsultas($data);

				

		return $dataOut;

	} 
}

//new app_DTO()->listarMunicipios();





