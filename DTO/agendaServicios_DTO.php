<?php
include_once '../DAO/agendaServicios_DAO.php';

class agendaServicios_DTO
{
	
	function __construct()
	{
		# code...
	}
	
	public function registrarAgendaServicio($datos, $key){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->registrarAgendaServicio($datos, $key);
        
		return $dataOut;
    }  
	public function buscarAdmisionesDiaPaciente($datos){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->buscarAdmisionesDiaPaciente($datos);
        
		return $dataOut;
    }  
	public function consultarAgendaProfesional($datos, $key){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->consultarAgendaProfesional($datos, $key);
        
		return $dataOut;
    }  
	public function listarAgendaProfesionalID($datos){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->listarAgendaProfesionalID($datos);
        
		return $dataOut;
    } 
	public function listarAgendaInstituto($datos){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->listarAgendaInstituto($datos);
        
		return $dataOut;
    }  
	public function actualizarEstadoAdmision($datos){
		
		$inst= new agendaServicios_DAO();
		$dataOut=$inst->actualizarEstadoAdmision($datos);
        
		return $dataOut;
    }  
}
//new app_DTO()->listarMunicipios();


