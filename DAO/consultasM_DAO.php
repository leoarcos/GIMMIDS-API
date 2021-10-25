<?php



include '../db/Database.php';



class consultasM_DAO {



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
         
         
        
            $sql = "SELECT gr.* , pc.* FROM consultas_menor gr, pacientes pc WHERE (pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac) AND id_consulta= :id";
            
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
    public function registerMenorConsultation($data){ 
        
        $instance = Database::getInstance();

        

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }
        $result = array();
        if(hash("SHA256",$data['key'])==$instance->key){
         
            $data2=JSON_decode($data['data'], true);
           
    
    
            $sql="INSERT INTO `consultas_menor`(`idJSON_consulta`, `id_paciente`, `idJSON_paciente`, `tipoIDUserReg`, `numeroIDUserReg`, `institucion`, `id_registra`, `tipoid_registra`, `fechaConsulta`,  `profAtiende`, `MenornombreAcompana`, `MenorAcompanaTelefono`, `MenorparentezcoAcompana`, `Menornombremadre`, `Menornombrepadre`, `MenortipoConsulta`, `MenorfinalidadConsulta`, `MenorcausaExternaConsulta`, `MenormotivoConsulta`, `MenorenfermedadActualConsulta`,   `Menorembarazodesado`, `MenoredadGestacional`, `Menorpatologiasembarazo`, `MenorPesonacer`, `Menortallanacer`, `MenorApgar1min`, `MenorApgar5min`, `MenorpatologiaReciennacido`, `MenorpartoIns`, `MenorProductoUnico`, `MenorTipoParto`, `MenorEdadMadreNacer`, `MenorAlimentacion`, `MenorOtrasleches`, `MenorComplementaria`, `MenorNumhermanos`, `MenorNumhermanosvivos`, `MenorNumhermanosMuertos`, `MenorPatologiasfamiliares`, `MenortempEA`, `MenorpulsoEA`, `MenorpesoEA`, `MenortallaEA`, `MenorimcEA`, `MenorfrecuenciarEA`, `MenorPerimetroCefalico`, `Menorcabeza`, `Menorcabeza_Desc`, `MenorOjos`, `MenorOjos_Desc`, `MenorNariz`, `MenorNariz_Desc`, `MenorOidos`, `MenorOidos_Desc`, `MenorBoca`, `MenorBoca_Desc`, `Menorcuello`, `Menorcuello_Desc`, `MenorcardioRespirat`, `MenorcardioRespirat_Desc`, `Menorabdomen`, `Menorabdomen_Desc`, `Menorgenitourinario`, `Menorgenitourinario_Desc`, `MenorAno`, `MenorAno_Desc`, `MenorExtremidades`, `MenorExtremidades_Desc`, `Menorpiel`, `Menorpiel_Desc`, `Menorsistemanervioso`, `Menorsistemanervioso_Desc`, `MenordolorMascar`, `MenortraumaBoca`, `MenorLimpiamanana`, `MenorLimpiamedioDia`, `MenorLimpiaNoche`, `MenorLimpiaDientesSolo`, `MenorusaCepillo`, `MenorusaCrema`, `MenorusaSeda`, `MenorusaChupoB`, `MenorfechaUConsOdo`, `Menorpesoedad02`, `Menorpesoedad25`, `Menortallaedad018`, `Menorpesotalla018`, `Menorimc05`, `Menorimc518`, `MenorperimetroCefalicoEV`, `MenorTendenciaPeso`, `MenorHemoclasificacion`, `MenorSerologia`, `MenorHipotiroidismo`, `listadoCIEPa`, `tipoDiagnosPrinc`, `medAsigCons`, `ordenMedCons`, `ordenMedConsRef`, `ordenMedConsRefPro`, `tipoSerRef`, `obseSerRef`, `tipoid_pac`, `numid_pac`, `IpsServicioReferir`, `IpsProcedeimientoReferir`) VALUES (:idJSON_consulta,:id_paciente,:idJSON_paciente,:tipoIDUserReg,:numeroIDUserReg,:institucion,:id_registra,:tipoid_registra,:fechaConsulta,:profAtiende,:MenornombreAcompana,:MenorAcompanaTelefono,:MenorparentezcoAcompana,:Menornombremadre,:Menornombrepadre,:MenortipoConsulta,:MenorfinalidadConsulta,:MenorcausaExternaConsulta,:MenormotivoConsulta,:MenorenfermedadActualConsulta,:Menorembarazodesado,:MenoredadGestacional,:Menorpatologiasembarazo,:MenorPesonacer,:Menortallanacer,:MenorApgar1min,:MenorApgar5min,:MenorpatologiaReciennacido,:MenorpartoIns,:MenorProductoUnico,:MenorTipoParto,:MenorEdadMadreNacer,:MenorAlimentacion,:MenorOtrasleches,:MenorComplementaria,:MenorNumhermanos,:MenorNumhermanosvivos,:MenorNumhermanosMuertos,:MenorPatologiasfamiliares,:MenortempEA,:MenorpulsoEA,:MenorpesoEA,:MenortallaEA,:MenorimcEA,:MenorfrecuenciarEA,:MenorPerimetroCefalico,:Menorcabeza,:Menorcabeza_Desc,:MenorOjos,:MenorOjos_Desc,:MenorNariz,:MenorNariz_Desc,:MenorOidos,:MenorOidos_Desc,:MenorBoca,:MenorBoca_Desc,:Menorcuello,:Menorcuello_Desc,:MenorcardioRespirat,:MenorcardioRespirat_Desc,:Menorabdomen,:Menorabdomen_Desc,:Menorgenitourinario,:Menorgenitourinario_Desc,:MenorAno,:MenorAno_Desc,:MenorExtremidades,:MenorExtremidades_Desc,:Menorpiel,:Menorpiel_Desc,:Menorsistemanervioso,:Menorsistemanervioso_Desc,:MenordolorMascar,:MenortraumaBoca,:MenorLimpiamanana,:MenorLimpiamedioDia,:MenorLimpiaNoche,:MenorLimpiaDientesSolo,:MenorusaCepillo,:MenorusaCrema,:MenorusaSeda,:MenorusaChupoB,:MenorfechaUConsOdo,:Menorpesoedad02,:Menorpesoedad25,:Menortallaedad018,:Menorpesotalla018,:Menorimc05,:Menorimc518,:MenorperimetroCefalicoEV,:MenorTendenciaPeso,:MenorHemoclasificacion,:MenorSerologia,:MenorHipotiroidismo,:listadoCIEPa,:tipoDiagnosPrinc,:medAsigCons,:ordenMedCons,:ordenMedConsRef,:ordenMedConsRefPro,:tipoSerRef,:obseSerRef,:tipoid_pac,:numid_pac,:IpsServicioReferir,:IpsProcedeimientoReferir)";
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":idJSON_consulta" => $data2['idJSON_consulta'],
                ":id_paciente" => $data2['id_paciente'],
                ":idJSON_paciente" => $data2['idJSON_paciente'],
                ":tipoIDUserReg" => $data2['tipoIDUserReg'],
                ":numeroIDUserReg" => $data2['numeroIDUserReg'],
                ":institucion" => $data2['institucion'],
                ":id_registra" => $data2['id_registra'],
                ":tipoid_registra" => $data2['tipoid_registra'],
                ":fechaConsulta" => $data2['fechaConsulta'],
                ":profAtiende" => $data2['profAtiende'],
                ":MenornombreAcompana" => $data2['MenornombreAcompana'],
                ":MenorAcompanaTelefono" => $data2['MenorAcompanaTelefono'],
                ":MenorparentezcoAcompana" => $data2['MenorparentezcoAcompana'],
                ":Menornombremadre" => $data2['Menornombremadre'],
                ":Menornombrepadre" => $data2['Menornombrepadre'],
                ":MenortipoConsulta" => $data2['MenortipoConsulta'],
                ":MenorfinalidadConsulta" => $data2['MenorfinalidadConsulta'],
                ":MenorcausaExternaConsulta" => $data2['MenorcausaExternaConsulta'],
                ":MenormotivoConsulta" => $data2['MenormotivoConsulta'],
                ":MenorenfermedadActualConsulta" => $data2['MenorenfermedadActualConsulta'],
                ":Menorembarazodesado" => $data2['Menorembarazodesado'],
                ":MenoredadGestacional" => $data2['MenoredadGestacional'],
                ":Menorpatologiasembarazo" => $data2['Menorpatologiasembarazo'],
                ":MenorPesonacer" => $data2['MenorPesonacer'],
                ":Menortallanacer" => $data2['Menortallanacer'],
                ":MenorApgar1min" => $data2['MenorApgar1min'],
                ":MenorApgar5min" => $data2['MenorApgar5min'],
                ":MenorpatologiaReciennacido" => $data2['MenorpatologiaReciennacido'],
                ":MenorpartoIns" => $data2['MenorpartoIns'],
                ":MenorProductoUnico" => $data2['MenorProductoUnico'],
                ":MenorTipoParto" => $data2['MenorTipoParto'],
                ":MenorEdadMadreNacer" => $data2['MenorEdadMadreNacer'],
                ":MenorAlimentacion" => $data2['MenorAlimentacion'],
                ":MenorOtrasleches" => $data2['MenorOtrasleches'],
                ":MenorComplementaria" => $data2['MenorComplementaria'],
                ":MenorNumhermanos" => $data2['MenorNumhermanos'],
                ":MenorNumhermanosvivos" => $data2['MenorNumhermanosvivos'],
                ":MenorNumhermanosMuertos" => $data2['MenorNumhermanosMuertos'],
                ":MenorPatologiasfamiliares" => $data2['MenorPatologiasfamiliares'],
                ":MenortempEA" => $data2['MenortempEA'],
                ":MenorpulsoEA" => $data2['MenorpulsoEA'],
                ":MenorpesoEA" => $data2['MenorpesoEA'],
                ":MenortallaEA" => $data2['MenortallaEA'],
                ":MenorimcEA" => $data2['MenorimcEA'],
                ":MenorfrecuenciarEA" => $data2['MenorfrecuenciarEA'],
                ":MenorPerimetroCefalico" => $data2['MenorPerimetroCefalico'],
                ":Menorcabeza" => $data2['Menorcabeza'],
                ":Menorcabeza_Desc" => $data2['Menorcabeza_Desc'],
                ":MenorOjos" => $data2['MenorOjos'],
                ":MenorOjos_Desc" => $data2['MenorOjos_Desc'],
                ":MenorNariz" => $data2['MenorNariz'],
                ":MenorNariz_Desc" => $data2['MenorNariz_Desc'],
                ":MenorOidos" => $data2['MenorOidos'],
                ":MenorOidos_Desc" => $data2['MenorOidos_Desc'],
                ":MenorBoca" => $data2['MenorBoca'],
                ":MenorBoca_Desc" => $data2['MenorBoca_Desc'],
                ":Menorcuello" => $data2['Menorcuello'],
                ":Menorcuello_Desc" => $data2['Menorcuello_Desc'],
                ":MenorcardioRespirat" => $data2['MenorcardioRespirat'],
                ":MenorcardioRespirat_Desc" => $data2['MenorcardioRespirat_Desc'],
                ":Menorabdomen" => $data2['Menorabdomen'],
                ":Menorabdomen_Desc" => $data2['Menorabdomen_Desc'],
                ":Menorgenitourinario" => $data2['Menorgenitourinario'],
                ":Menorgenitourinario_Desc" => $data2['Menorgenitourinario_Desc'],
                ":MenorAno" => $data2['MenorAno'],
                ":MenorAno_Desc" => $data2['MenorAno_Desc'],
                ":MenorExtremidades" => $data2['MenorExtremidades'],
                ":MenorExtremidades_Desc" => $data2['MenorExtremidades_Desc'],
                ":Menorpiel" => $data2['Menorpiel'],
                ":Menorpiel_Desc" => $data2['Menorpiel_Desc'],
                ":Menorsistemanervioso" => $data2['Menorsistemanervioso'],
                ":Menorsistemanervioso_Desc" => $data2['Menorsistemanervioso_Desc'],
                ":MenordolorMascar" => $data2['MenordolorMascar'],
                ":MenortraumaBoca" => $data2['MenortraumaBoca'],
                ":MenorLimpiamanana" => $data2['MenorLimpiamanana'],
                ":MenorLimpiamedioDia" => $data2['MenorLimpiamedioDia'],
                ":MenorLimpiaNoche" => $data2['MenorLimpiaNoche'],
                ":MenorLimpiaDientesSolo" => $data2['MenorLimpiaDientesSolo'],
                ":MenorusaCepillo" => $data2['MenorusaCepillo'],
                ":MenorusaCrema" => $data2['MenorusaCrema'],
                ":MenorusaSeda" => $data2['MenorusaSeda'],
                ":MenorusaChupoB" => $data2['MenorusaChupoB'],
                ":MenorfechaUConsOdo" => $data2['MenorfechaUConsOdo'],
                ":Menorpesoedad02" => $data2['Menorpesoedad02'],
                ":Menorpesoedad25" => $data2['Menorpesoedad25'],
                ":Menortallaedad018" => $data2['Menortallaedad018'],
                ":Menorpesotalla018" => $data2['Menorpesotalla018'],
                ":Menorimc05" => $data2['Menorimc05'],
                ":Menorimc518" => $data2['Menorimc518'],
                ":MenorperimetroCefalicoEV" => $data2['MenorperimetroCefalicoEV'],
                ":MenorTendenciaPeso" => $data2['MenorTendenciaPeso'],
                ":MenorHemoclasificacion" => $data2['MenorHemoclasificacion'],
                ":MenorSerologia" => $data2['MenorSerologia'],
                ":MenorHipotiroidismo" => $data2['MenorHipotiroidismo'],
                ":listadoCIEPa" => $data2['listadoCIEPa'],
                ":tipoDiagnosPrinc" => $data2['tipoDiagnosPrinc'],
                ":medAsigCons" => $data2['medAsigCons'],
                ":ordenMedCons" => $data2['ordenMedCons'],
                ":ordenMedConsRef" => $data2['ordenMedConsRef'],
                ":ordenMedConsRefPro" => $data2['ordenMedConsRefPro'],
                ":tipoSerRef" => $data2['tipoSerRef'],
                ":obseSerRef" => $data2['obseSerRef'],
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
         
         
            $sql = "SELECT gr.* , pc.nombres, pc.papellido, pc.sapellido FROM consultas_menor gr, pacientes pc WHERE pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac";
    
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
    public function listarConsultasPaciente($datos ){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

        $result = array();
        $result['DATA']=[];
        if(hash("SHA256",$datos['key'])==$instance->key){
        
            $sql = "SELECT gr.* , usr.nombres AS nombreProfesional FROM consultas_menor gr, usuarios usr WHERE (gr.tipoid_pac= :tipoid_pac AND gr.numid_pac= :numid_pac)  AND usr.numid=gr.numeroIDUserReg";
            
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

