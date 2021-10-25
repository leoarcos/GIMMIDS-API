<?php



include_once '../DAO/referencias_DAO.php';


class referencias_DTO

{


	function __construct()



	{



		# code...



	}



	



	public function listarReferencias(){



		$inst= new referencias_DAO();



		$dataOut=$inst->listarReferencias();



		return $dataOut;



	} 



	public function registerReference($data){

		$inst= new referencias_DAO();



		$dataOut=$inst->registerReference($data);
		return $dataOut;



	} 

}