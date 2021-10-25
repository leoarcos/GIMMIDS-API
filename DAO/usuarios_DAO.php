<?php

include '../db/Database.php';

class usuarios_DAO {

    function __construct() {
        
    }

  

    public function listarUsuarios($inst, $key){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        //$sql = "SELECT * FROM usuarios WHERE institucion='".$inst."'";
        if(hash("SHA256",$key)==$instance->key){
        
            
            $sql = "SELECT * FROM usuarios"; 
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
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
            
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        return $result;
        

    }
    
    public function listarUsuariosGimmids($key){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        //$sql = "SELECT * FROM usuarios WHERE institucion='".$inst."'";
        if(hash("SHA256",$key)==$instance->key){
        
           
            $sql = "SELECT * FROM usuarios"; 
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
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
            
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        return $result;
        

    }

    public function listarUsuario($data){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }


        if(hash("SHA256",$data['key'])==$instance->key){
        
           
            $sql = "SELECT * FROM usuarios WHERE user= :user AND pass= :pass"; 
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":user" => $data['user'],
                ":pass"=> $data['pass']
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
            
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        
        return $result;
        

    } 
    public function registrarUsuario($data ,$key){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        if(hash("SHA256",$key)==$instance->key){
        

            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("INSERT INTO usuarios(tipoid, numid, nombres, profesion, reg_prof, institucion, user, pass, direccion, permiso_agendar, permiso_hamb, permiso_procedimientos, permiso_informes, permiso_usuarios) VALUES(:tipoid, :numid, :nombres, :profesion, :reg_prof, :institucion, :user, :pass, :direccion, :permiso_agendar, :permiso_registro, :permiso_procedimientos, :permiso_informes, :permiso_usuarios) ");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":tipoid" => $data['tipoid'],
                ":numid"=> $data['numid'],
                ":nombres"=> $data['nombres'],
                ":profesion"=> $data['profesion'],
                ":reg_prof"=> $data['reg_prof'],
                ":institucion"=> $data['institucion'],
                ":user"=> $data['user'],
                ":pass"=> $data['pass'],
                ":direccion"=> $data['direccion'],
                ":permiso_agendar"=> $data['permiso_agendar'],
                ":permiso_registro"=> $data['permiso_registro'],
                ":permiso_procedimientos"=> $data['permiso_procedimientos'],
                ":permiso_informes"=> $data['permiso_informes'],
                ":permiso_usuarios"=> $data['permiso_usuarios']
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
            $result['ID'] = $dbh->lastInsertId();


 
        }else{
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = 'Llaves incorrectas';
        }
        return $result;
        

    }
     
   
   
}
