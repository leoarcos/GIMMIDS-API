<?php

include '../db/Database.php';

class pacientes_DAO {

    function __construct() {
        
    }

  

    public function listarPacientes($key){
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$key)==$instance->key){
            $sql ="SELECT DISTINCT `idJSON`, `tipoidRegPac`, `idRegPac`, `otroDocumRep`, `nombres`, `papellido`, `sapellido`, `estCivil`, `sexo`, `fecNac`, `paisProcedencia`, `dptoProcedencia`, `mnpoProcedencia`, `paisResidencia`, `dptoResidencia`, `mnpoResidencia`, `direccionResidencia`, `zonaResidencia`, `telefono`, `status_migratorio`, `perfilPacie`, `movilidadPacie`, `tipoMoviliPAc`, `BDUA`, `eapb`, `tipoPoblacion`, `regimen`, `perEtnica`, `pueIndigena`, `fecha_registro`, `usuario_regitraid`, `usuario_regitratipoid`, `correoElec`, `OtraDireccion`, `acepta`, `tiemrpoingresoColo`, `remitidoP`, `remitidoPDesc`, `usuario_registrainst`, `hora_registro`, `estado` FROM `pacientes`";
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
    
    public function buscarPaciente($cc, $id, $key){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$key)==$instance->key){
            //$result = array();
           
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT * FROM pacientes WHERE tipoidRegPac= :cc AND idRegPac= :id");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":cc" => $cc,
                ":id"=>$id
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
        //return $result;
        

    }
    
    
    public function registrarPaciente($data, $key){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array(); 
        if(hash("SHA256",$key)==$instance->key){
             
            
            if(isset($data['paisProcedencia'])){
                $data['paisProcedencia']=$data['paisProcedencia'];
            }else{
    
                $data['paisProcedencia']='';
            }
    
            if(isset($data['dptoProcedencia'])){
                $data['dptoProcedencia']=$data['dptoProcedencia'];
            }else{
    
                $data['dptoProcedencia']='';
            }
    
            if(isset($data['mnpoProcedencia'])){
                $data['mnpoProcedencia']=$data['mnpoProcedencia'];
            }else{
    
                $data['mnpoProcedencia']='';
            }
    
            if(isset($data['paisResidencia'])){
                $data['paisResidencia']=$data['paisResidencia'];
            }else{
    
                $data['paisResidencia']='';
            }
    
            if(isset($data['dptoResidencia'])){
                $data['dptoResidencia']=$data['dptoResidencia'];
            }else{
    
                $data['dptoResidencia']='';
            }
    
            if(isset($data['mnpoResidencia'])){
                $data['mnpoResidencia']=$data['mnpoResidencia'];
            }else{
    
                $data['mnpoResidencia']='';
            }
    
            if(isset($data['direccionResidencia'])){
                $data['direccionResidencia']=$data['direccionResidencia'];
            }else{
    
                $data['direccionResidencia']='';
            }
    
            if(isset($data['zonaResidencia'])){
                $data['zonaResidencia']=$data['zonaResidencia'];
            }else{
    
                $data['zonaResidencia']='';
            }
    
            if(isset($data['telefono'])){
                $data['telefono']=$data['telefono'];
            }else{
    
                $data['telefono']='';
            }
    
            if(isset($data['status_migratorio'])){
                $data['status_migratorio']=$data['status_migratorio'];
            }else{
    
                $data['status_migratorio']='';
            }
            if(isset($data['perfilPacie'])){
                $data['perfilPacie']=$data['perfilPacie'];
            }else{
    
                $data['perfilPacie']='';
            }
            if(isset($data['movilidadPacie'])){
                $data['movilidadPacie']=$data['movilidadPacie'];
            }else{
    
                $data['movilidadPacie']='';
            }
            if(isset($data['tipoMoviliPAc'])){
                $data['tipoMoviliPAc']=$data['tipoMoviliPAc'];
            }else{
    
                $data['tipoMoviliPAc']='';
            }
            if(isset($data['BDUA'])){
                $data['BDUA']=$data['BDUA'];
            }else{
    
                $data['BDUA']='';
            }
            if(isset($data['eapb'])){
                $data['eapb']=$data['eapb'];
            }else{
    
                $data['eapb']='';
            }
            if(isset($data['tipoPoblacion'])){
                $data['tipoPoblacion']=$data['tipoPoblacion'];
            }else{
    
                $data['tipoPoblacion']='';
            }
            if(isset($data['regimen'])){
                $data['regimen']=$data['regimen'];
            }else{
    
                $data['regimen']='';
            }
            if(isset($data['perEtnica'])){
                $data['perEtnica']=$data['perEtnica'];
            }else{
    
                $data['perEtnica']='';
            }
            if(isset($data['pueIndigena'])){
                $data['pueIndigena']=$data['pueIndigena'];
            }else{
    
                $data['pueIndigena']='';
            }
            if(isset($data['correoElec'])){
                $data['correoElec']=$data['correoElec'];
            }else{
    
                $data['correoElec']='';
            }
            if(isset($data['OtraDireccion'])){
                $data['OtraDireccion']=$data['OtraDireccion'];
            }else{
    
                $data['OtraDireccion']='';
            }
            if(isset($data['aceptaTerminos'])){
                $data['aceptaTerminos']=$data['aceptaTerminos'];
            }else{
    
                $data['aceptaTerminos']='';
            }
            if(isset($data['tiemrpoingresoColo'])){
                $data['tiemrpoingresoColo']=$data['tiemrpoingresoColo'];
            }else{
    
                $data['tiemrpoingresoColo']='';
            }
            if(isset($data['remitidoP'])){
                $data['remitidoP']=$data['remitidoP'];
            }else{
    
                $data['remitidoP']='';
            }
            if(isset($data['remitidoPDesc'])){
                $data['remitidoPDesc']=$data['remitidoPDesc'];
            }else{
    
                $data['remitidoPDesc']='';
            }
            if(isset($data['fecNac'])){
                $data['fecNac']=$data['fecNac'];
            }else{
    
                $data['fecNac']='';
            }
            if(isset($data['sexo'])){
                $data['sexo']=$data['sexo'];
            }else{
    
                $data['sexo']='';
            } 
    
            if(isset($data['otroDocumRepNum'])){
                $data['otroDocumRepNum']=$data['otroDocumRepNum'];
            }else{
    
                $data['otroDocumRepNum']='';
            } 
            if(isset($data['rumv'])){
                $data['rumv']=$data['rumv'];
            }else{
    
                $data['rumv']='';
            } 
    
            if(isset($data['rumvNum'])){
                $data['rumvNum']=$data['rumvNum'];
            }else{
    
                $data['rumvNum']='';
            } 
    
            if(isset($data['PPT'])){
                $data['PPT']=$data['PPT'];
            }else{
    
                $data['PPT']='';
            } 
    
            if(isset($data['PPTNum'])){
                $data['PPTNum']=$data['PPTNum'];
            }else{
    
                $data['PPTNum']='';
            } 
    
    
    
           
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("INSERT INTO `pacientes`(`idJSON`, `tipoidRegPac`, `idRegPac`, `otroDocumRep`, `nombres`, `papellido`, `sapellido`, `estCivil`, `sexo`, `fecNac`, `paisProcedencia`, `dptoProcedencia`, `mnpoProcedencia`, `paisResidencia`, `dptoResidencia`, `mnpoResidencia`, `direccionResidencia`, `zonaResidencia`, `telefono`, `status_migratorio`, `perfilPacie`, `movilidadPacie`, `tipoMoviliPAc`, `BDUA`, `eapb`, `tipoPoblacion`, `regimen`, `perEtnica`, `pueIndigena`, `fecha_registro`, `usuario_regitraid`, `usuario_regitratipoid`,  `correoElec`, `OtraDireccion`, `acepta`, `tiemrpoingresoColo`, `remitidoP`, `remitidoPDesc`, `usuario_registrainst`, `otroDocumRepNum`, `rumv`, `rumvNum`, `PPT`, `PPTNum`) VALUES (:idJSON, :tipoidRegPac, :idRegPac, :otroDocumRep, :nombres, :papellido, :sapellido, :estCivil, :sexo, :fecNac, :paisProcedencia, :dptoProcedencia, :mnpoProcedencia, :paisResidencia, :dptoResidencia, :mnpoResidencia, :direccionResidencia, :zonaResidencia, :telefono, :status_migratorio,:perfilPacie,:movilidadPacie,:tipoMoviliPAc,:BDUA,:eapb,:tipoPoblacion,:regimen, :perEtnica, :pueIndigena, :fecha_registro,  :usuario_regitraid, :usuario_regitratipoid, :correoElec, :OtraDireccion, :aceptaTerminos, :tiemrpoingresoColo, :remitidoP, :remitidoPDesc, :usuario_registrainst, :otroDocumRepNum, :rumv, :rumvNum, :PPT, :PPTNum)");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":idJSON" => $data['idJSON'],
                ":tipoidRegPac"=> $data['tipoidRegPac'],
                ":idRegPac"=> $data['idRegPac'],
                ":otroDocumRep"=> $data['otroDocumRep'],
                ":nombres"=> $data['nombres'],
                ":papellido"=> $data['papellido'],
                ":sapellido"=> $data['sapellido'],
                ":estCivil"=> $data['estCivil'],
                ":sexo"=> $data['sexo'],
                ":fecNac"=> $data['fecNac'],
                ":paisProcedencia"=> $data['paisProcedencia'],
                ":dptoProcedencia"=> $data['dptoProcedencia'],
                ":mnpoProcedencia"=> $data['mnpoProcedencia'],
                ":paisResidencia"=> $data['paisResidencia'],
                ":dptoResidencia"=> $data['dptoResidencia'],
                ":mnpoResidencia"=> $data['mnpoResidencia'],
                ":direccionResidencia"=> $data['direccionResidencia'],
                ":zonaResidencia"=> $data['zonaResidencia'],
                ":telefono"=> $data['telefono'],
                ":status_migratorio"=> $data['status_migratorio'],
                ":perfilPacie"=> $data['perfilPacie'],
                ":movilidadPacie"=> $data['movilidadPacie'],
                ":tipoMoviliPAc"=> $data['tipoMoviliPAc'],
                ":BDUA"=> $data['BDUA'],
                ":eapb"=> $data['eapb'],
                ":tipoPoblacion"=> $data['tipoPoblacion'],
                ":regimen"=> $data['regimen'],
                ":perEtnica"=> $data['perEtnica'],
                ":pueIndigena"=> $data['pueIndigena'],
                ":fecha_registro"=> $data['fecha_registro'],
                ":usuario_regitraid"=> $data['usuario_regitraid'],
                ":usuario_regitratipoid"=> $data['usuario_regitratipoid'],
                ":correoElec"=> $data['correoElec'],
                ":OtraDireccion"=> $data['OtraDireccion'],
                ":aceptaTerminos"=> $data['aceptaTerminos'],
                ":tiemrpoingresoColo"=> $data['tiemrpoingresoColo'],
                ":remitidoP"=> $data['remitidoP'],
                ":remitidoPDesc"=> $data['remitidoPDesc'],
                ":usuario_registrainst"=> $data['usuario_registrainst'],
                ":otroDocumRepNum"=> $data['otroDocumRepNum'],
                ":rumv"=> $data['rumv'],
                ":rumvNum"=> $data['rumvNum'],
                ":PPT"=> $data['PPT'],
                ":PPTNum"=> $data['PPTNum']
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


           /*  $sql="INSERT INTO `pacientes`(`idJSON`, `tipoidRegPac`, `idRegPac`, `otroDocumRep`, `nombres`, `papellido`, `sapellido`, `estCivil`, `sexo`, `fecNac`, `paisProcedencia`, `dptoProcedencia`, `mnpoProcedencia`, `paisResidencia`, `dptoResidencia`, `mnpoResidencia`, `direccionResidencia`, `zonaResidencia`, `telefono`, `status_migratorio`, `perfilPacie`, `movilidadPacie`, `tipoMoviliPAc`, `BDUA`, `eapb`, `tipoPoblacion`, `regimen`, `perEtnica`, `pueIndigena`, `fecha_registro`, `usuario_regitraid`, `usuario_regitratipoid`,  `correoElec`, `OtraDireccion`, `acepta`, `tiemrpoingresoColo`, `remitidoP`, `remitidoPDesc`, `usuario_registrainst`, `otroDocumRepNum`, `rumv`, `rumvNum`, `PPT`, `PPTNum`) VALUES ('".$data['idJSON']."', '".$data['tipoidRegPac']."', '".$data['idRegPac']."', '".$data['otroDocumRep']."', '".$data['nombres']."', '".$data['papellido']."', '".$data['sapellido']."', '".$data['estCivil']."', '".$data['sexo']."', '".$data['fecNac']."', '".$data['paisProcedencia']."', '".$data['dptoProcedencia']."', '".$data['mnpoProcedencia']."', '".$data['paisResidencia']."', '".$data['dptoResidencia']."', '".$data['mnpoResidencia']."', '".$data['direccionResidencia']."', '".$data['zonaResidencia']."', '".$data['telefono']."', '".$data['status_migratorio']."','".$data['perfilPacie']."','".$data['movilidadPacie']."','".$data['tipoMoviliPAc']."','".$data['BDUA']."','".$data['eapb']."','".$data['tipoPoblacion']."','".$data['regimen']."', '".$data['perEtnica']."', '".$data['pueIndigena']."', '".$data['fecha_registro']."',  '".$data['usuario_regitraid']."', '".$data['usuario_regitratipoid']."', '".$data['correoElec']."', '".$data['OtraDireccion']."', '".$data['aceptaTerminos']."', '".$data['tiemrpoingresoColo']."', '".$data['remitidoP']."', '".$data['remitidoPDesc']."', '".$data['usuario_registrainst']."', '".$data['otroDocumRepNum']."', '".$data['rumv']."', '".$data['rumvNum']."', '".$data['PPT']."', '".$data['PPTNum']."')"; 
            
            $result = array();
            $res = $instance->exec($sql); 
            if ($res['STATUS']=='OK' ) {
                
                $result['STATUS'] = 'OK';
                $result['ID'] = $res['ID'];
                $result['DATA']=$data;
                
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
     
    
    public function registrarSeguimientoPaciente($data){
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array(); 
        if(hash("SHA256",$data['key'])==$instance->key){
            //$result = array();
         
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("INSERT INTO `seguimientos`(`tipoid_pac`, `numid_pac`, `nota_seguimiento`, `inst`, `numid_registra`, `nombre_registra`) VALUES (:tipoid_pac, :numid_pac, :nota_seguimiento, :inst, :numid_registra, :nombre_registra)");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":tipoid_pac" => $data['tipoid_pac'],
                ":numid_pac" => $data['numid_pac'],
                ":nota_seguimiento" => $data['nota_seguimiento'],
                ":inst" => $data['inst'],
                ":numid_registra" => $data['numid_registra'],
                ":nombre_registra" => $data['nombre_registra'] 
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
    
    
    public function listarSeguimientoPaciente($data){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array();
        $result['DATA']=[];

        if(hash("SHA256",$data['key'])==$instance->key){
            //$result = array();
         
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT * FROM seguimientos WHERE tipoid_pac=:tipoid_pac AND numid_pac=:numid_pac");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array(
                ":tipoid_pac" => $data['tipoid_pac'],
                ":numid_pac" => $data['numid_pac'] 
            );
            try { 
                $stmt->execute($dataIn);
                if ($stmt){
                    $result['STATUS'] = "OK"; 
                    
                }
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

        /* 
        $sql = "SELECT * FROM seguimientos WHERE tipoid_pac='".$data['tipoid_pac']."' AND numid_pac='".$data['numid_pac']."'";
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['STATUS']=="OK" ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = $res['ERROR'];
        } */
        return $result;
        

    }
    
    public function listarSeguimientos($data){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array();
        $result['DATA']=[];

        if(hash("SHA256",$data['key'])==$instance->key){
            //$result = array();
         
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare("SELECT * FROM seguimientos");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            try { 
                $stmt->execute();
                if ($stmt){
                    $result['STATUS'] = "OK"; 
                    
                }
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

       /*  $sql = "SELECT * FROM seguimientos";
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['STATUS']=="OK" ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
            $result['ERROR'] = $res['ERROR'];
        } */
        return $result;
        

    }
   
   
}
