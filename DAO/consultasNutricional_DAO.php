<?php



include '../db/Database.php';



class consultasNutricional_DAO {



    function __construct() {

        

    }



  


    public function listarConsultasId($id,$key){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();
            $instance = $db->getInstance();

        }
        
        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$key)==$instance->key){
         
         
            
            $sql = "SELECT gr.* , pc.* FROM consultas_nutricional gr, pacientes pc WHERE (pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac) AND id_consulta= :id";
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":id" => intval($id)
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


    public function registerNutriConsultation($data){ 
        
        $instance = Database::getInstance();

        

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }



        $result = array(); 
        if(hash("SHA256",$data['key'])==$instance->key){
            

            $data2=JSON_decode($data['data'], true);
           
            
             $sql="INSERT INTO `consultas_nutricional`( `idJSON_consulta`, `id_paciente`, `idJSON_paciente`, `numid_pac`, `tipoid_pac`, `tipoIDUserReg`, `numeroIDUserReg`, `institucion`, `id_registra`, `tipoid_registra`, `fechaConsulta`, `horaConsulta`, `profAtiende`, `tipoConsulta`, `finalidadConsulta`, `causaExternaConsulta`, `motivoConsulta`, `enfermedadActualConsulta`, `antecedentesConsulta`, `tempEA`, `pulsoEA`, `pesoEA`, `tallaEA`, `imcEA`, `frecuenciarEA`, `tensionaEA`, `obserConsuAdulto`, `listadoCIEPa`, `tipoDiagnosPrinc`, `medAsigCons`, `ordenMedCons`, `ordenMedConsRef`, `ordenMedConsRefPro`, `tipoSerRef`, `obseSerRef`, `notasEvolucion`, `recomNotas`, `IpsServicioReferir`, `IpsProcedeimientoReferir`, `estado`) VALUES (:idJSON_consulta,:id_paciente,:idJSON_paciente,:numid_pac,:tipoid_pac,:tipoIDUserReg,:numeroIDUserReg,:institucion,:id_registra,:tipoid_registra,:fechaConsulta,:horaConsulta,:profAtiende,:tipoConsulta,:finalidadConsulta,:causaExternaConsulta,:motivoConsulta,:enfermedadActualConsulta,:antecedentesConsulta,:tempEA,:pulsoEA,:pesoEA,:tallaEA,:imcEA,:frecuenciarEA,:tensionaEA,:obserConsuAdulto,:listadoCIEPa,:tipoDiagnosPrinc,:medAsigCons,:ordenMedCons,:ordenMedConsRef,:ordenMedConsRefPro,:tipoSerRef,:obseSerRef,:notasEvolucion,:recomNotas,:IpsServicioReferir,:IpsProcedeimientoReferir,:estado)";
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":idJSON_consulta" => $data2['idJSON_consulta'],
                ":id_paciente" => $data2['id_paciente'],
                ":idJSON_paciente" => $data2['idJSON_paciente'],
                ":numid_pac" => $data2['numid_pac'],
                ":tipoid_pac" => $data2['tipoid_pac'],
                ":tipoIDUserReg" => $data2['tipoIDUserReg'],
                ":numeroIDUserReg" => $data2['numeroIDUserReg'],
                ":institucion" => $data2['institucion'],
                ":id_registra" => $data2['id_registra'],
                ":tipoid_registra" => $data2['tipoid_registra'],
                ":fechaConsulta" => $data2['fechaConsulta'],
                ":horaConsulta" => $data2['horaConsulta'],
                ":profAtiende" => $data2['profAtiende'],
                ":tipoConsulta" => $data2['tipoConsulta'],
                ":finalidadConsulta" => $data2['finalidadConsulta'],
                ":causaExternaConsulta" => $data2['causaExternaConsulta'],
                ":motivoConsulta" => $data2['motivoConsulta'],
                ":enfermedadActualConsulta" => $data2['enfermedadActualConsulta'],
                ":antecedentesConsulta" => $data2['antecedentesConsulta'],
                ":tempEA" => $data2['tempEA'],
                ":pulsoEA" => $data2['pulsoEA'],
                ":pesoEA" => $data2['pesoEA'],
                ":tallaEA" => $data2['tallaEA'],
                ":imcEA" => $data2['imcEA'],
                ":frecuenciarEA" => $data2['frecuenciarEA'],
                ":tensionaEA" => $data2['tensionaEA'],
                ":obserConsuAdulto" => $data2['obserConsuAdulto'],
                ":listadoCIEPa" => $data2['listadoCIEPa'],
                ":tipoDiagnosPrinc" => $data2['tipoDiagnosPrinc'],
                ":medAsigCons" => $data2['medAsigCons'],
                ":ordenMedCons" => $data2['ordenMedCons'],
                ":ordenMedConsRef" => $data2['ordenMedConsRef'],
                ":ordenMedConsRefPro" => $data2['ordenMedConsRefPro'],
                ":tipoSerRef" => $data2['tipoSerRef'],
                ":obseSerRef" => $data2['obseSerRef'],
                ":notasEvolucion" => $data2['notasEvolucion'],
                ":recomNotas" => $data2['recomNotas'],
                ":IpsServicioReferir" => $data2['IpsServicioReferir'],
                ":IpsProcedeimientoReferir" => $data2['IpsProcedeimientoReferir'],
                ":estado" => $data2['estado'] 
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
    
    public function listarConsultas($key){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();
            $instance = $db->getInstance();

        }
        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$key)==$instance->key){
         
         
            $sql = "SELECT gr.* , pc.nombres, pc.papellido, pc.sapellido FROM consultas_nutricional gr, pacientes pc WHERE pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac";
            //$sql = "SELECT * FROM consultasNutricional";
    
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

    public function listarConsultasPaciente($datos){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();
            $instance = $db->getInstance();

        }
        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$datos['key'])==$instance->key){
         
            $sql = "SELECT gr.* , usr.nombres AS nombreProfesional FROM consultas_nutricional gr, usuarios usr WHERE (gr.tipoid_pac= :tipoid_pac  AND gr.numid_pac=:numid_pac)  AND usr.numid=gr.id_registra";
            
            $dbh=$instance->__connection;

             $stmt = $dbh->prepare($sql);
             // Especificamos el fetch mode antes de llamar a fetch()
             $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $dataIn=array(
                 ":tipoid_pac" => $datos['tipoid_pac'],
                 ":numid_pac"=>$datos['numid_pac']
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

