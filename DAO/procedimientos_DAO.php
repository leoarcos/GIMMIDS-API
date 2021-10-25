<?php



include '../db/Database.php';



class procedimientos_DAO {



    function __construct() {


    }

    public function listarProcedimientos($key){

        
        $instance = Database::getInstance(); 
        if ($instance == NULL) { 
            $db = new Database();
            $instance = $db->getInstance(); 
        }

        $result = array();
        $result['DATA']=[];
        
        if(hash("SHA256",$key)==$instance->key){
        
             
            
    
            $sql = "SELECT * FROM procedimientos ";
     
    
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
             
            try { 
                $stmt->execute();
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $errr->getMessage();
            } 
            while ($row = $stmt->fetch()){
                $result['DATA'][] = $row; 
            }
            if(!isset($result['DATA'])){
                $result['ERROR']=$dbh->errorInfo();
            }
    
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }

        return $result;

    }



    



    public function registrarProcedimientos($data){ 

        
        $instance = Database::getInstance();
        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance(); 

        }
        $result = array(); 
        if(hash("SHA256",$data['key'])==$instance->key){
        
             $data2=JSON_decode($data['data'], true);
           
    
            $sql="INSERT INTO procedimientos( `idJSON_procedimiento`, `fechaProce`, `horaProce`, `nombrPacienteAte`, `tipodocupacie`, `numDocpPaci`, `sexoPAciees`, `cieIngCon`, `cieIngConComp`, `AmbreaProc`, `FinaProc`, `perfilPersonat`, `nombrePersonAtien`, `formReaAcQ`, `ordenesIngCon`) VALUES (:idJSON_procedimiento, :fechaProce,:horaProce,:nombrPacienteAte,:tipodocupacie,:numDocpPaci,:sexoPAciees,:cieIngCon,:cieIngConComp,:AmbreaProc,:FinaProc,:perfilPersonat,:nombrePersonAtien,:formReaAcQ,:ordenesIngCon)";
    
    
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":idJSON_procedimiento" => $data2['idJSON_procedimiento'],
                ":fechaProce" => $data2['fechaProce'],
                ":horaProce" => $data2['horaProce'],
                ":nombrPacienteAte" => $data2['nombrPacienteAte'],
                ":tipodocupacie" => $data2['tipodocupacie'],
                ":numDocpPaci" => $data2['numDocpPaci'],
                ":sexoPAciees" => $data2['sexoPAciees'],
                ":cieIngCon" => $data2['cieIngCon'],
                ":cieIngConComp" => $data2['cieIngConComp'],
                ":AmbreaProc" => $data2['AmbreaProc'],
                ":FinaProc" => $data2['FinaProc'],
                ":perfilPersonat" => $data2['perfilPersonat'],
                ":nombrePersonAtien" => $data2['nombrePersonAtien'],
                ":formReaAcQ" => $data2['formReaAcQ'],
                ":ordenesIngCon" => $data2['ordenesIngCon']
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){
                    $result['STATUS'] = "OK";
                    $result['ID'] = $dbh->lastInsertId(); 
                }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $error->getMessage();
            } 

        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        
        return $result;



        





    }
    
    public function listarProcedimientosPaciente($data){
        
         $instance = Database::getInstance();


        if ($instance == NULL) {



            $db = new Database();

            $instance = $db->getInstance();



        }

        $result = array();
        $result['DATA']=[];
        
        if(hash("SHA256",$data['key'])==$instance->key){
        
             
            
    
            $sql = "SELECT * FROM procedimientos WHERE tipodocupacie= :tipoid_pac AND numDocpPaci= :numid_pac";
     
    
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":tipoid_pac" => $data['tipoid_pac'],
                ":numid_pac"=>$data['numid_pac']
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $errr->getMessage();
            } 
            while ($row = $stmt->fetch()){
                $result['DATA'][] = $row; 
            }
            if(!isset($result['DATA'])){
                $result['ERROR']=$dbh->errorInfo();
            }
    
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }

        return $result;

    }

    
    public function listarProcedimientoID($data){
        
         $instance = Database::getInstance();


        if ($instance == NULL) {



            $db = new Database();

            $instance = $db->getInstance();



        }

        
        $result = array();
        $result['DATA']=[];

        if(hash("SHA256",$data['key'])==$instance->key){
        
             
            
    
            $sql = "SELECT * FROM procedimientos WHERE id_procedimiento=:id";
     
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":id" => $data['id']
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $errr->getMessage();
            } 
            while ($row = $stmt->fetch()){
                $result['DATA'][] = $row; 
            }
            if(!isset($result['DATA'])){
                $result['ERROR']=$dbh->errorInfo();
            }
    
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }

        return $result;

    }

}