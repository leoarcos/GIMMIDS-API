<?php



include '../db/Database.php';



class app_DAO {



    function __construct() {

        

    }



  



    public function listarMunicipios(){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }



         
        $result = array();

        if(hash("SHA256",$data['key'])==$instance->key){
            
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT mnp.* FROM municipios mnp");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
           
            try { 
                $stmt->execute();
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $error->getMessage();
            } 
            while ($row = $stmt->fetch()){
                $result['DATA'][] = $row; 
            }
            if(!isset($result['DATA'])){
                $result['ERROR']=$dbh->errorInfo();
            }
            /* 
            $sql="SELECT ad.*, usr.nombres FROM admisiones ad, usuarios usr WHERE usr.numid=ad.AgendarpprofeAgendarAdmision AND ad.estado=0 ORDER BY ad.AgendarFechaAgendarAdmision ASC, ad.AgendarHoraAgendarAdmision ASC";
            $result = array();
            $res = $instance->get_data($sql); 
            if ($res['STATUS']=='OK' ) {
                
                $result['STATUS'] = 'OK';
                $result['DATA'] = $res['DATA'];
            } else { 
                $result['STATUS'] = 'ERROR';
                $result['ERROR'] = $res['ERROR'];
                
            } */
         
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        return $result;

        



    }
 

   

}

