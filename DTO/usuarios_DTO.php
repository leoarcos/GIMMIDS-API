<?php
include_once '../DAO/usuarios_DAO.php';

class usuarios_DTO
{
	
	function __construct()
	{
		# code...
	}
	
	public function listarUsuarios($isnt, $key){
		
		$inst= new usuarios_DAO();
		$dataOut=$inst->listarUsuarios($isnt, $key);
        
		return $dataOut;
    } 
	public function listarUsuariosGimmids($key){
		
		$inst= new usuarios_DAO();
		$dataOut=$inst->listarUsuariosGimmids($key);
        
		return $dataOut;
    } 
	public function listarUsuario($data){
		
		$inst= new usuarios_DAO();
		$dataOut=$inst->listarUsuario($data);
        
		return $dataOut;
    } 
    public function registrarUsuario($data, $key){
        
		$inst= new usuarios_DAO();
		$dataOut=$inst->registrarUsuario($data, $key);
        
		return $dataOut;
    }   
}
//new app_DTO()->listarMunicipios();


