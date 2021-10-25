<?php



include '../db/Database.php';



class consultasG_DAO {



    function __construct() {

        

    }


    public function listarConsultasId($id, $key){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();
            $instance = $db->getInstance();

        }
        
         $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$key)==$instance->key){
         
         
            
            $sql = "SELECT gr.* , pc.* FROM consultas_adulto gr, pacientes pc WHERE (pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac) AND id_consulta= :id";
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



    public function registerAdultConsultation($data){ 
        
        $instance = Database::getInstance();

        

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

        $result = array();

        if(hash("SHA256",$data['key'])==$instance->key){
            
            $data2=JSON_decode($data['data'], true);
           
    
            $sql="INSERT INTO `consultas_adulto`( `id_paciente`, `idJSON_consulta`, `fechaConsulta`, `horaConsulta`, `profAtiende`, `tipoConsulta`, `finalidadConsulta`, `causaExternaConsulta`, `motivoConsulta`, `enfermedadActualConsulta`, `infecciosos`, `infecciosos_Desc`, `patologicos`, `patologicos_Desc`, `quirurgicos`, `quirurgicos_Desc`, `alergicos`, `alergicos_Desc`, `traumas`, `traumas_Desc`, `psicologicos`, `psicologicos_Desc`, `otros_Desc`, `gestaciones`, `partos`, `cesareas`, `abortos`, `vivos`, `muertos`, `observacionesGine`, `fecUltimaCitologia`, `planifica`, `planificaMetodo`, `observacionesAnte`, `tempEA`, `pulsoEA`, `pesoEA`, `tallaEA`, `imcEA`, `frecuenciarEA`, `tensionaEA`, `pielyfaneras`, `pielyfaneras_Desc`, `organosSentidos`, `organosSentidos_Desc`, `cavidadBucal`, `cavidadBucal_Desc`, `neurosensorial`, `neurosensorial_Desc`, `locomotor`, `locomotor_Desc`, `cardiovascular`, `cardiovascular_Desc`, `respiratorio`, `respiratorio_Desc`, `gastrointestinal`, `gastrointestinal_Desc`, `genitorunario`, `genitorunario_Desc`, `endoctrino`, `endoctrino_Desc`, `examama`, `examama_Desc`, `piel`, `piel_Desc`, `cabeza`, `cabeza_Desc`, `organosSentidosEA`, `organosSentidosEA_Desc`, `agudezavisual`, `agudezavisual_Desc`, `cavidadoral`, `cavidadoral_Desc`, `torax`, `torax_Desc`, `abdomen`, `abdomen_Desc`, `genitourinaria`, `genitourinaria_Desc`, `extremidades`, `extremidades_Desc`, `neurologico`, `neurologico_Desc`, `osteomuscular`, `osteomuscular_Desc`, `obserConsuAdulto`, `listadoCIEPa`, `tipoDiagnosPrinc`, `medAsigCons`, `ordenMedCons`, `ordenMedConsRef`, `ordenMedConsRefPro`, `tipoSerRef`, `obseSerRef`, `tipoIDUserReg`, `numeroIDUserReg`, `tipoid_pac`, `numid_pac`, `IpsServicioReferir`, `IpsProcedeimientoReferir`) VALUES (:id_paciente,:idJSON_consulta,:fechaConsulta,:horaConsulta,:profAtiende,:tipoConsulta,:finalidadConsulta,:causaExternaConsulta,:motivoConsulta,:enfermedadActualConsulta,:infecciosos,:infecciosos_Desc,:patologicos,:patologicos_Desc,:quirurgicos,:quirurgicos_Desc,:alergicos,:alergicos_Desc,:traumas,:traumas_Desc,:psicologicos,:psicologicos_Desc,:otros_Desc,:gestaciones,:partos,:cesareas,:abortos,:vivos,:muertos,:observacionesGine,:fecUltimaCitologia,:planifica,:planificaMetodo,:observacionesAnte,:tempEA,:pulsoEA,:pesoEA,:tallaEA,:imcEA,:frecuenciarEA,:tensionaEA,:pielyfaneras,:pielyfaneras_Desc,:organosSentidos,:organosSentidos_Desc,:cavidadBucal,:cavidadBucal_Desc,:neurosensorial,:neurosensorial_Desc,:locomotor,:locomotor_Desc,:cardiovascular,:cardiovascular_Desc,:respiratorio,:respiratorio_Desc,:gastrointestinal,:gastrointestinal_Desc,:genitorunario,:genitorunario_Desc,:endoctrino,:endoctrino_Desc,:examama,:examama_Desc,:piel,:piel_Desc,:cabeza,:cabeza_Desc,:organosSentidosEA,:organosSentidosEA_Desc,:agudezavisual,:agudezavisual_Desc,:cavidadoral,:cavidadoral_Desc,:torax,:torax_Desc,:abdomen,:abdomen_Desc,:genitourinaria,:genitourinaria_Desc,:extremidades,:extremidades_Desc,:neurologico,:neurologico_Desc,:osteomuscular,:osteomuscular_Desc,:obserConsuAdulto,:listadoCIEPa,:tipoDiagnosPrinc,:medAsigCons,:ordenMedCons,:ordenMedConsRef,:ordenMedConsRefPro,:tipoSerRef,:obseSerRef,:tipoIDUserReg,:numeroIDUserReg,:tipoid_pac,:numid_pac,:IpsServicioReferir,:IpsProcedeimientoReferir)";
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":id_paciente" => $data2['id_paciente'],
                ":idJSON_consulta" => $data2['idJSON_consulta'],
                ":fechaConsulta" => $data2['fechaConsulta'],
                ":horaConsulta" => $data2['horaConsulta'],
                ":profAtiende" => $data2['profAtiende'],
                ":tipoConsulta" => $data2['tipoConsulta'],
                ":finalidadConsulta" => $data2['finalidadConsulta'],
                ":causaExternaConsulta" => $data2['causaExternaConsulta'],
                ":motivoConsulta" => $data2['motivoConsulta'],
                ":enfermedadActualConsulta" => $data2['enfermedadActualConsulta'],
                ":infecciosos" => $data2['infecciosos'],
                ":infecciosos_Desc" => $data2['infecciosos_Desc'],
                ":patologicos" => $data2['patologicos'],
                ":patologicos_Desc" => $data2['patologicos_Desc'],
                ":quirurgicos" => $data2['quirurgicos'],
                ":quirurgicos_Desc" => $data2['quirurgicos_Desc'],
                ":alergicos" => $data2['alergicos'],
                ":alergicos_Desc" => $data2['alergicos_Desc'],
                ":traumas" => $data2['traumas'],
                ":traumas_Desc" => $data2['traumas_Desc'],
                ":psicologicos" => $data2['psicologicos'],
                ":psicologicos_Desc" => $data2['psicologicos_Desc'],
                ":otros_Desc" => $data2['otros_Desc'],
                ":gestaciones" => $data2['gestaciones'],
                ":partos" => $data2['partos'],
                ":cesareas" => $data2['cesareas'],
                ":abortos" => $data2['abortos'],
                ":vivos" => $data2['vivos'],
                ":muertos" => $data2['muertos'],
                ":observacionesGine" => $data2['observacionesGine'],
                ":fecUltimaCitologia" => $data2['fecUltimaCitologia'],
                ":planifica" => $data2['planifica'],
                ":planificaMetodo" => $data2['planificaMetodo'],
                ":observacionesAnte" => $data2['observacionesAnte'],
                ":tempEA" => $data2['tempEA'],
                ":pulsoEA" => $data2['pulsoEA'],
                ":pesoEA" => $data2['pesoEA'],
                ":tallaEA" => $data2['tallaEA'],
                ":imcEA" => $data2['imcEA'],
                ":frecuenciarEA" => $data2['frecuenciarEA'],
                ":tensionaEA" => $data2['tensionaEA'],
                ":pielyfaneras" => $data2['pielyfaneras'],
                ":pielyfaneras_Desc" => $data2['pielyfaneras_Desc'],
                ":organosSentidos" => $data2['organosSentidos'],
                ":organosSentidos_Desc" => $data2['organosSentidos_Desc'],
                ":cavidadBucal" => $data2['cavidadBucal'],
                ":cavidadBucal_Desc" => $data2['cavidadBucal_Desc'],
                ":neurosensorial" => $data2['neurosensorial'],
                ":neurosensorial_Desc" => $data2['neurosensorial_Desc'],
                ":locomotor" => $data2['locomotor'],
                ":locomotor_Desc" => $data2['locomotor_Desc'],
                ":cardiovascular" => $data2['cardiovascular'],
                ":cardiovascular_Desc" => $data2['cardiovascular_Desc'],
                ":respiratorio" => $data2['respiratorio'],
                ":respiratorio_Desc" => $data2['respiratorio_Desc'],
                ":gastrointestinal" => $data2['gastrointestinal'],
                ":gastrointestinal_Desc" => $data2['gastrointestinal_Desc'],
                ":genitorunario" => $data2['genitorunario'],
                ":genitorunario_Desc" => $data2['genitorunario_Desc'],
                ":endoctrino" => $data2['endoctrino'],
                ":endoctrino_Desc" => $data2['endoctrino_Desc'],
                ":examama" => $data2['examama'],
                ":examama_Desc" => $data2['examama_Desc'],
                ":piel" => $data2['piel'],
                ":piel_Desc" => $data2['piel_Desc'],
                ":cabeza" => $data2['cabeza'],
                ":cabeza_Desc" => $data2['cabeza_Desc'],
                ":organosSentidosEA" => $data2['organosSentidosEA'],
                ":organosSentidosEA_Desc" => $data2['organosSentidosEA_Desc'],
                ":agudezavisual" => $data2['agudezavisual'],
                ":agudezavisual_Desc" => $data2['agudezavisual_Desc'],
                ":cavidadoral" => $data2['cavidadoral'],
                ":cavidadoral_Desc" => $data2['cavidadoral_Desc'],
                ":torax" => $data2['torax'],
                ":torax_Desc" => $data2['torax_Desc'],
                ":abdomen" => $data2['abdomen'],
                ":abdomen_Desc" => $data2['abdomen_Desc'],
                ":genitourinaria" => $data2['genitourinaria'],
                ":genitourinaria_Desc" => $data2['genitourinaria_Desc'],
                ":extremidades" => $data2['extremidades'],
                ":extremidades_Desc" => $data2['extremidades_Desc'],
                ":neurologico" => $data2['neurologico'],
                ":neurologico_Desc" => $data2['neurologico_Desc'],
                ":osteomuscular" => $data2['osteomuscular'],
                ":osteomuscular_Desc" => $data2['osteomuscular_Desc'],
                ":obserConsuAdulto" => $data2['obserConsuAdulto'],
                ":listadoCIEPa" => $data2['listadoCIEPa'],
                ":tipoDiagnosPrinc" => $data2['tipoDiagnosPrinc'],
                ":medAsigCons" => $data2['medAsigCons'],
                ":ordenMedCons" => $data2['ordenMedCons'],
                ":ordenMedConsRef" => $data2['ordenMedConsRef'], 
                ":ordenMedConsRefPro" => $data2['ordenMedConsRefPro'],
                ":tipoSerRef" => $data2['tipoSerRef'], 
                ":obseSerRef" => $data2['obseSerRef'],
                ":tipoIDUserReg" => $data2['tipoIDUserReg'],
                ":numeroIDUserReg" => $data2['numeroIDUserReg'],
                ":tipoid_pac" => $data2['tipoid_pac'],
                ":numid_pac" => $data2['numid_pac'],
                ":IpsServicioReferir" => $data2['IpsServicioReferir'],
                ":IpsProcedeimientoReferir" => $data2['IpsProcedeimientoReferir'] 
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
         
         
        
            $sql = "SELECT gr.* , pc.nombres, pc.papellido, pc.sapellido FROM consultas_adulto gr, pacientes pc WHERE pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac";
    
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
            

        
            $sql = "SELECT gr.* , usr.nombres AS nombreProfesional FROM consultas_adulto gr, usuarios usr WHERE (gr.tipoid_pac= :tipoid_pac AND gr.numid_pac= :numid_pac)  AND usr.numid=gr.numeroIDUserReg";
            
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

