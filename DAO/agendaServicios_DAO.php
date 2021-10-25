<?php

include '../db/Database.php';

class agendaServicios_DAO {

    function __construct() {
        
    }
 
    
    public function registrarAgendaServicio($data, $key){
         
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
 
        if(hash("SHA256",$key)==$instance->key){

            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("INSERT INTO `admisiones`(`AgendarID`, `AgendarIDJSON`, `AgendartipoidRegPacAdmision`, `AgendaridRegPacAdmision`, `AgendarotroDocumRepAdmision`, `AgendarSexo`, `AgendarNombresAdmision`, `AgendarpprofeAgendarAdmision`, `AgendarServicioAdmision`, `AgendarFechaAgendarAdmision`, `AgendarHoraAgendarAdmision`, `usuarioregistraID`, `usuarioregistratipoID`, `fechaReg`, `estado`) VALUES (:AgendarID, :AgendarIDJSON, :AgendartipoidRegPacAdmision, :AgendaridRegPacAdmision, :AgendarotroDocumRepAdmision, :AgendarSexo, :AgendarNombresAdmision, :AgendarpprofeAgendarAdmision, :AgendarServicioAdmision, :AgendarFechaAgendarAdmision,  :AgendarHoraAgendarAdmision, :usuarioregistraID, :usuarioregistratipoID, :fechaReg,  0)");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":AgendarID" => $data['AgendarID'],
                ":AgendarIDJSON" => $data['AgendarIDJSON'] ,
                ":AgendartipoidRegPacAdmision" => $data['AgendartipoidRegPacAdmision'] ,
                ":AgendaridRegPacAdmision" => $data['AgendaridRegPacAdmision'] ,
                ":AgendarotroDocumRepAdmision" => $data['AgendarotroDocumRepAdmision'] ,
                ":AgendarSexo" => $data['AgendarSexo'] ,
                ":AgendarNombresAdmision" => $data['AgendarNombresAdmision'] ,
                ":AgendarpprofeAgendarAdmision" => $data['AgendarpprofeAgendarAdmision'] ,
                ":AgendarServicioAdmision" => $data['AgendarServicioAdmision'] ,
                ":AgendarFechaAgendarAdmision" => $data['AgendarFechaAgendarAdmision'] ,
                ":AgendarHoraAgendarAdmision" => $data['AgendarHoraAgendarAdmision'] ,
                ":usuarioregistraID" => $data['usuarioregistraID'] ,
                ":usuarioregistratipoID" => $data['usuarioregistratipoID'] ,
                ":fechaReg" => $data['fechaReg'] 
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $error->getMessage();
            } 
            
            /* 
         
            $sql="INSERT INTO `admisiones`(`AgendarID`, `AgendarIDJSON`, `AgendartipoidRegPacAdmision`, `AgendaridRegPacAdmision`, `AgendarotroDocumRepAdmision`, `AgendarSexo`, `AgendarNombresAdmision`, `AgendarpprofeAgendarAdmision`, `AgendarServicioAdmision`, `AgendarFechaAgendarAdmision`, `AgendarHoraAgendarAdmision`, `usuarioregistraID`, `usuarioregistratipoID`, `fechaReg`, `estado`) VALUES ('".$data['AgendarID']."','".$data['AgendarIDJSON']."','".$data['AgendartipoidRegPacAdmision']."','".$data['AgendaridRegPacAdmision']."','".$data['AgendarotroDocumRepAdmision']."','".$data['AgendarSexo']."','".$data['AgendarNombresAdmision']."','".$data['AgendarpprofeAgendarAdmision']."','".$data['AgendarServicioAdmision']."','".$data['AgendarFechaAgendarAdmision']."', '".$data['AgendarHoraAgendarAdmision']."','".$data['usuarioregistraID']."','".$data['usuarioregistratipoID']."','".$data['fechaReg']."', 0)"; 
             
            $result = array();
            $res = $instance->exec($sql); 
            if ($res['STATUS']=='OK' ) {
                
                $result['STATUS'] = 'OK';
                $result['ID'] = $res['ID'];
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
   
     
    public function consultarAgendaProfesional($data ,$key){
         
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        if(hash("SHA256",$key)==$instance->key){
         

            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT COUNT(*) as cont FROM `admisiones` WHERE `estado`=0 AND`AgendarpprofeAgendarAdmision`=:AgendarpprofeAgendarAdmision AND `AgendarFechaAgendarAdmision`=:AgendarFechaAgendarAdmision AND `AgendarHoraAgendarAdmision` BETWEEN :time1 AND :time2");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":AgendarpprofeAgendarAdmision" => $data['AgendarpprofeAgendarAdmision'] ,
                ":AgendarFechaAgendarAdmision" => $data['AgendarFechaAgendarAdmision'] ,
                ":time1" => $data['time1'] ,
                ":time2" => $data['time2'] , 
            );
            try { 
                $stmt->execute($dataIn);
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
            $sql="SELECT COUNT(*) as cont FROM `admisiones` WHERE `estado`=0 AND`AgendarpprofeAgendarAdmision`='".$data['AgendarpprofeAgendarAdmision']."' AND `AgendarFechaAgendarAdmision`='".$data['AgendarFechaAgendarAdmision']."' AND `AgendarHoraAgendarAdmision` BETWEEN '".$data['time1']."' AND '".$data['time2']."'";
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
    public function listarAgendaProfesionalID($data){
         
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
 
        if(hash("SHA256",$data['key'])==$instance->key){
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT ad.*, usr.nombres FROM admisiones ad, usuarios usr WHERE usr.numid=ad.AgendarpprofeAgendarAdmision AND ad.AgendarpprofeAgendarAdmision=:id AND ad.estado=0 ORDER BY ad.AgendarFechaAgendarAdmision ASC, ad.AgendarHoraAgendarAdmision ASC");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":id" => $data['id']
            );
            try { 
                $stmt->execute($dataIn);
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
            $sql="SELECT ad.*, usr.nombres FROM admisiones ad, usuarios usr WHERE usr.numid=ad.AgendarpprofeAgendarAdmision AND ad.AgendarpprofeAgendarAdmision='".$data['id']."' AND ad.estado=0 ORDER BY ad.AgendarFechaAgendarAdmision ASC, ad.AgendarHoraAgendarAdmision ASC";
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
    public function listarAgendaInstituto($data){
         
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
 
        
        
        if(hash("SHA256",$data['key'])==$instance->key){
            
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT ad.*, usr.nombres FROM admisiones ad, usuarios usr WHERE usr.numid=ad.AgendarpprofeAgendarAdmision AND ad.estado=0 ORDER BY ad.AgendarFechaAgendarAdmision ASC, ad.AgendarHoraAgendarAdmision ASC");
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
    public function actualizarEstadoAdmision($data){
         
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        $result=array();
        if(hash("SHA256",$data['key'])==$instance->key){
 

            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("UPDATE `admisiones` SET `estado`=:estado WHERE id=:id");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":estado" => $data['estado'],
                ":id"=>$data['id']
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){$result['STATUS'] = "OK"; }
            } catch (PDOException $errr) { 
                $result['ERROR'] = $error->getMessage();
            } 
             
            /* 
            $sql="UPDATE `admisiones` SET `estado`=".$data['estado']." WHERE id=".$data['id']."";
            $result = array();
            $res = $instance->exec($sql); 
            if ($res['STATUS']=='OK' ) {
                
                $result['STATUS'] = 'OK';  
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
