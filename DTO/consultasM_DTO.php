<?php

include_once '../DAO/consultasM_DAO.php';



class consultasM_DTO

{

	

	function __construct()

	{

		# code...

	}

	
	public function listarConsultasId($id){

		

		$inst= new consultasM_DAO();

		$dataOut=$inst->listarConsultasId($id);

		return $dataOut;

	} 
	
	
	public function updateMenorConsultation($data){
 
		$inst= new consultasM_DAO();

		$dataOut=$inst->updateMenorConsultation($data);

				

		return $dataOut;

	} 
	public function registerMenorConsultation($data){
		
		$inst= new consultasM_DAO();
		
		$dataOut=$inst->registerMenorConsultation($data);

				

		return $dataOut;

	} 

	public function listarConsultasM(){

		

		$inst= new consultasM_DAO();

		$dataOut=$inst->listarConsultasM();

		return $dataOut;

	} 
	public function listarConsultas($key){

		

		$inst= new consultasM_DAO();

		$dataOut=$inst->listarConsultas($key);

		return $dataOut;

	} 
	public function listarConsultasPaciente($dato){

		

		$inst= new consultasM_DAO();

		$dataOut=$inst->listarConsultasPaciente($dato);

		return $dataOut;

	} 

	public function registrarConsultasM($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasM($data);

				

		return $dataOut;

	} 

	public function registrarConsultasMenor($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenor($data);

				

		return $dataOut;

	} 
	public function registrarConsultasMenorA($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorA($data);

				

		return $dataOut;

	} 
	public function registrarConsultasMenorB($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorB($data);

				

		return $dataOut;

	} 
	public function registrarConsultasMenorC($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorC($data);

				

		return $dataOut;

	} 
	public function registrarConsultasMenorD($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorD($data);

				

		return $dataOut;

	} 

	public function registrarConsultasMenorE($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorE($data);

				

		return $dataOut;

	} 

	public function registrarConsultasMenorF($data){



		$inst= new consultasM_DAO();

		$dataOut=$inst->registrarConsultasMenorF($data);

				

		return $dataOut;

	} 


//new app_DTO()->listarMunicipios();



}

