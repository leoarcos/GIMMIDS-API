<?php
include_once '../DAO/pacientes_DAO.php';

class pacientes_DTO
{
	
	function __construct()
	{
		# code...
	}
	
	public function listarPacientes($key){
		
		$inst= new pacientes_DAO();
		$dataOut=$inst->listarPacientes($key);
        
		return $dataOut;
    } 
    public function registrarPaciente($data, $key){
        
		$inst= new pacientes_DAO();
		$dataOut=$inst->registrarPaciente($data, $key);
        
		return $dataOut;
    } 
    public function actualizarPaciente($data){
	
			$inst= new pacientes_DAO();
			$dataOut=$inst->actualizarPaciente($data);
					
			return $dataOut;
    } 
    public function buscarPaciente($cc, $id, $key){
        
		$inst= new pacientes_DAO();
		$dataOut=$inst->buscarPaciente($cc, $id, $key);
        
		return $dataOut;
    }
    public function buscarPacienteID($id){
        
		$inst= new pacientes_DAO();
		$dataOut=$inst->buscarPacienteID($id);
        
		return $dataOut;
    }
    
	public function registrarSeguimientoPaciente($data){
		
		$inst= new pacientes_DAO();
		$dataOut=$inst->registrarSeguimientoPaciente($data);
        
		return $dataOut;
    } 
	public function listarSeguimientoPaciente($data){
		
		$inst= new pacientes_DAO();
		$dataOut=$inst->listarSeguimientoPaciente($data);
        
		return $dataOut;
    } 
	public function listarSeguimientos($data){
		
		$inst= new pacientes_DAO();
		$dataOut=$inst->listarSeguimientos($data);
        
		return $dataOut;
    } 
}
//new app_DTO()->listarMunicipios();


