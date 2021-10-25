<?php

include_once '../DAO/consultasGes_DAO.php';



class consultasGes_DTO

{

	

	function __construct()

	{

		# code...

	}

	

	public function listarConsultasId($id){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	
	public function registerPregnantConsultation($data,$key){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->registerPregnantConsultation($data,$key);

		return $dataOut;

	} 

	public function registrarGestacion($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarGestacion($data);

		return $dataOut;

	} 
	public function registrarPlanMantenimiento($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarPlanMantenimiento($data);

		return $dataOut;

	}
	public function actualizarPlanMantenimiento($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->actualizarPlanMantenimiento($data);

		return $dataOut;

	}
	public function registrarEntrenamiento($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarEntrenamiento($data);

		return $dataOut;

	}
	public function actualizarEntrenamiento($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->actualizarEntrenamiento($data);

		return $dataOut;

	}
	public function ExtraerPlanMantenimiento($data){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->ExtraerPlanMantenimiento($data);

		return $dataOut;

	} 
	public function listarConsultas($key){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasPaciente($datos){

		

		$inst= new consultasGes_DAO();

		$dataOut=$inst->listarConsultasPaciente($datos);

		return $dataOut;

	} 

	public function registrarConsulta($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsulta($data);

				

		return $dataOut;

	} 

	public function registrarConsultaA($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaA($data);

				

		return $dataOut;

	} 
	public function registrarConsultaB($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaB($data);

				

		return $dataOut;

	} 
	public function registrarConsultaC($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaC($data);

				

		return $dataOut;

	} 
	public function registrarConsultaD($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaD($data);

				

		return $dataOut;

	} 
	public function registrarConsultaE($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaE($data);

				

		return $dataOut;

	} 
	public function registrarConsultaF($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaF($data);

				

		return $dataOut;

	} 
	public function registrarConsultaPlan($data){


		$inst= new consultasGes_DAO();

		$dataOut=$inst->registrarConsultaPlan($data);

				

		return $dataOut;

	} 
//new app_DTO()->listarMunicipios();



}

