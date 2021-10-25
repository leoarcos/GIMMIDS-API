<?php



include '../db/Database.php';



class referencias_DAO {



    function __construct() {


    }

    public function listarReferencias($key){

        $instance = Database::getInstance();


        if ($instance == NULL) {
 
            $db = new Database();

            $instance = $db->getInstance(); 

        }
        $result = array(); 
         
        if(hash("SHA256",$key)==$instance->key){
        
            
            $sql = "SELECT * FROM referencias";

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



    



    public function registerReference($data){ 

        $instance = Database::getInstance();
        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();



        }
        $result = array();
        

        $sql="INSERT INTO `referencias`(`idJSON`, `nombre_prestador`, `nit_prestador`, `codigo_prestador`, `direccion_prestador`, `munp_prestador`, `indTel_prestador`, `telefono_prestador`, `nombre_paciente`, `tipoid_paciente`, `numid_paciente`, `fechnac_paciente`, `direccion_paciente`, `dpto_paciente`, `mnpo_paciente`, `telefono_paciente`, `nombre_profesional`, `indTel_profesional`, `Tel_profesional`, `celular_profesional`, `sersolicita_profesional`, `serReferencia_profesional`, `anamnesis`, `ta`, `fc`, `fr`, `tem`, `peso`, `examen_fisico`, `exaAux`, `tipoexamen`, `hallazgos`, `fecahex`, `listadoCIEPa`, `complicaciones`, `tto_aplicados`, `motivo`, `estado`) VALUES (:idJSON, :nombre_prestador, :nit_prestador, :codigo_prestador, :direccion_prestador, :munp_prestador, :indTel_prestador, :telefono_prestador, :nombre_paciente, :tipoid_paciente, :numid_paciente, :fechnac_paciente, :direccion_paciente, :dpto_paciente, :mnpo_paciente, :telefono_paciente, :nombre_profesional, :indTel_profesional, :Tel_profesional, :celular_profesional, :sersolicita_profesional, :serReferencia_profesional, :anamnesis, :ta, :fc, :fr, :tem, :peso, :examen_fisico, :exaAux, :tipoexamen, :hallazgos, :fecahex, :listadoCIEPa, :complicaciones, :tto_aplicados, :motivo, :estado)";


        if(hash("SHA256",$data['key'])==$instance->key){
        
            
            $sql = "SELECT * FROM referencias";

            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":idJSON" => $data['idJSON'],
                ":nombre_prestador" => $data['nombre_prestador'],
                ":nit_prestador" => $data['nit_prestador'],
                ":codigo_prestador" => $data['codigo_prestador'],
                ":direccion_prestador" => $data['direccion_prestador'],
                ":munp_prestador" => $data['munp_prestador'],
                ":indTel_prestador" => $data['indTel_prestador'],
                ":telefono_prestador" => $data['telefono_prestador'],
                ":nombre_paciente" => $data['nombre_paciente'],
                ":tipoid_paciente" => $data['tipoid_paciente'],
                ":numid_paciente" => $data['numid_paciente'],
                ":fechnac_paciente" => $data['fechnac_paciente'],
                ":direccion_paciente" => $data['direccion_paciente'],
                ":dpto_paciente" => $data['dpto_paciente'],
                ":mnpo_paciente" => $data['mnpo_paciente'],
                ":telefono_paciente" => $data['telefono_paciente'],
                ":nombre_profesional" => $data['nombre_profesional'],
                ":indTel_profesional" => $data['indTel_profesional'],
                ":Tel_profesional" => $data['Tel_profesional'],
                ":celular_profesional" => $data['celular_profesional'],
                ":sersolicita_profesional" => $data['sersolicita_profesional'],
                ":serReferencia_profesional" => $data['serReferencia_profesional'],
                ":anamnesis" => $data['anamnesis'],
                ":ta" => $data['ta'],
                ":fc" => $data['fc'],
                ":fr" => $data['fr'],
                ":tem" => $data['tem'],
                ":peso" => $data['peso'],
                ":examen_fisico" => $data['examen_fisico'],
                ":exaAux" => $data['exaAux'],
                ":tipoexamen" => $data['tipoexamen'],
                ":hallazgos" => $data['hallazgos'],
                ":fecahex" => $data['fecahex'],
                ":listadoCIEPa" => $data['listadoCIEPa'],
                ":complicaciones" => $data['complicaciones'],
                ":tto_aplicados" => $data['tto_aplicados'],
                ":motivo" => $data['motivo'],
                ":estado" => $data['estado'] 
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

}