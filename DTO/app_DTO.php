<?php
include_once '../DAO/app_DAO.php';

class app_DTO
{
	
	function __construct()
	{
		# code...
	}
	
	public function listarMunicipios(){
		
		$appDAO= new app_DAO();

		$result= $appDAO->listarMunicipios();
			
			
		return $result;
    }
    public function validarNick($nick){
		$appDAO= new app_DAO();
		$result= $appDAO->validarNick($nick);
		return $result;
	}
}
//new app_DTO()->listarMunicipios();


