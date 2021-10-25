<?php



include '../db/Database.php';



class consultasGes_DAO {



    function __construct() {

        

    }


    public function listarConsultasId($id, $key){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();
            $instance = $db->getInstance();

        }
        
       //$sql = "SELECT * FROM consultasEnfermeria";
 
        $result = array();
        $result['DATA']=[];
        
        if(hash("SHA256",$key)==$instance->key){
         
         
            $sql = "SELECT gr.* , pc.* FROM consultas_prenatales gr, pacientes pc WHERE (pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac) AND id_consulta= :id";
         
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":id" => intVal($id)
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


    public function registerPregnantConsultation($data,$key){
        $instance = Database::getInstance();

        

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }
        $result = array();
            
        if(hash("SHA256",$key)==$instance->key){
         
 
            if(isset($data['ObserVExFisico'])){
                $data['ObserVExFisico']=$data['ObserVExFisico'];
            }else{
                $data['ObserVExFisico']='';
            }
            
            
            if(isset($data['GestanteAntMovilidadDientes'])){
                $data['GestanteAntMovilidadDientes']=$data['GestanteAntMovilidadDientes'];
            }else{
                $data['GestanteAntMovilidadDientes']='';
            }
            
            if(isset($data['causaCesareasAnt'])){
                $data['causaCesareasAnt']=$data['causaCesareasAnt'];
            }else{
                $data['causaCesareasAnt']='';
            }
            
            if(isset($data['GestanteAntTranstornosMentales'])){
                $data['GestanteAntTranstornosMentales']=$data['GestanteAntTranstornosMentales'];
            }else{
                $data['GestanteAntTranstornosMentales']='';
            }
            
            $sql="INSERT INTO `consultas_prenatales`(`idJSON_consulta`, `numid_pac`, `tipoid_pac`, `id_registra`, `tipoid_registra`, `insitucion`, `fechaConsulta`, `horaConsulta`, `tipoConsulta`, `finalidadConsulta`, `causaExternaConsulta`, `motivoConsulta`, `enfermedadActualConsulta`, `embraActuaPlanea`, `embraActuaDesead`, `deseaInterrumEmbara`, `GestanteAntDiabetes`, `GestanteAntHipertensionArterial`, `GestanteAntCirugiaPelvica`, `GestanteAntOtrasCirugias`, `GestanteAntPreeclamsia`, `GestanteAntEclamsia`, `GestanteAntFactorRH`, `GestanteAntTransfusiones`, `GestanteAntAltTiroideas`, `GestanteAntNutiPrevDefic`, `GestanteAntEnfRenalCronica`, `GestanteAntTtoInfertilidad`, `GestanteAntDifLactancia`, `GestanteAntAlergias`, `GestanteAntAlergiassCuales`, `GestanteAntTraumaticos`, `GestanteAntOtrasTBC`, `GestanteAntPsicofarm`, `GestanteAntOtrasCigarrilloAlcohol`, `GestanteAnIrradiacion`, `GestanteVIHSIDA`, `GestanteAntExpoToxicos`, `GestanteAntExpoToxicosCuales`, `GestanteAntMedicamentos`, `GestanteAntMedicamentosCuales`, `GestanteAntUsaCepillo`, `GestanteAntUsaCrema`, `GestanteAntUsaSeda`, `GestanteAntVecesCepilla`, `GestanteAntSangranEncias`, `GestanteAntDolorRuidosATM`, `GestanteAntMovilidadDientes`, `GestanteAntLimitacionAbrirBoca`, `GestanteAntFechaUConsO`, `GestanteAntEdadMenarquia`, `GestanteSexarquia`, `GestanteAntFechaFum`, `GestanteAntConfiableFUM`, `GestanteAntCiclosIrregulares`, `GestanteAntPatronCicloI`, `GestanteAntPatronCicloII`, `GestanteAntFEchaUltParto`, `GestanteAntFechaFPP`, `GestanteAntparejasSexuales`, `GestanteAntVihRprueba`, `GestanteAntTtoInfertilidadG`, `GestanteAntTtoInfertilidadGTipo`, `GestanteAntMetodoPlanifica`, `GestanteAntFechaSusMetodoPlan`, `GestanteAntEmbarazos`, `GestanteAntAbortoHabitu`, `GestanteAntGineG`, `GestanteAntGineP`, `GestanteAntGineC`, `GestanteAntGineA`, `GestanteAntGineE`, `GestanteAntGineV`, `GestanteAntGineM`, `GestanteAntObservaObst`, `GestanteAntLeucorreas`, `GestanteAntLeucorreasDescr`, `GestanteAntETS`, `GestanteAntFechaCITOLOGIAUtl`, `GestanteAntCOLPOSCOPIA`, `GestanteAntPerioINTERGENESICO`, `GestanteAntPerioINTERGENESICOUME`, `GestanteAntRCIU`, `GestanteAntAmenaPartoPrematuro`, `GestanteAntPartoPREMATURO`, `GestanteAntEmbaraMultiple`, `GestanteAntEmbaraMultipleDesc`, `GestanteAntMALFORMACIONES`, `GestanteAntMOLAS`, `GestanteAntPLACPREVIA`, `GestanteAntABRUPTIO`, `GestanteAntRetePlacenta`, `GestanteAntRupturaPreMembra`, `GestanteAntOLIGOHIDRAMNIOS`, `GestanteAntOLIGOAMNIOS`, `GestanteHemorraObst`, `GestanteTransfucciones`, `GestanteAntEmbProlongado`, `GestanteAntGineOtros`, `GestanteAntGineOtrosCuales`, `GestanteAntAmenazaAborto`, `GestanteAntInfeccPostParto`, `GestanteAntMacromsiaFetal`, `GestanteAntMuertePerinatal`, `GestanteAntMuertePerinatalCausa`, `GestanteAntPsicosisPostParto`, `causaCesareasAnt`, `GestanteAntDiabetesfamiliar`, `GestanteAntHtaFamiliar`, `GestanteAntPreeclamsiaFamiliares`, `GestanteAntEclamsiaFamiliares`, `GestanteAntGemelaresFamiliares`, `GestanteAntCardiopatiaFamiliares`, `GestanteAntEnfTROMBOFILIAS`, `GestanteAntTBCFamiliares`, `GestanteAntTranstornosMentales`, `GestanteAntEpilepsia`, `GestanteAntAutoinmune`, `GestanteAntNeoplasias`, `GestanteAntDiscapacidadFamiliares`, `GestanteAntOtrosFamiliares`, `GestanteAntOtrosFamiliaresCuales`, `GestanteAntBiopssicuno`, `GestanteAntBiopssicdos`, `GestanteAntBiopssictres`, `BiopEdad`, `BioPari`, `abprhabinfer`, `retencPlacent`, `pesobebemayor`, `pesobebemenor`, `htaIndEmbara`, `EmbaGemelarCesara`, `mortinatoMuerto`, `TPProlongada`, `OXgineolgica`, `EnferReanlCronic`, `diabetGesta`, `diabetesMellitus`, `EnfermCardiaca`, `EnfermedadInfeccios`, `enfeAutoInmunes`, `anemiaHB10gl`, `hemorragia20ms`, `vaginal2oss`, `Epronlogadoante`, `htaantecdepr`, `anteRpm`, `polidraminiosAntEmbaActual`, `RCIUAntecente`, `embMultipleatne`, `MalaPresenta`, `isoirh`, `GestanteAntBiopssiccuator`, `GestanteAntBiopssiccinco`, `GestanteAntBiopssicseis`, `ControPrenaacieLis`, `GestanteVacu1ra`, `GestanteVacu2ra`, `GestanteVacu1`, `GestanteVacu2`, `GestanteVacu3`, `GestanteAnaRieMa1`, `GestanteAnaRieNi1`, `GestanteAnaRieMa2`, `GestanteAnaRieNi2`, `GestanteAnaRieMa3`, `GestanteAnaRieNi3`, `gestanteEntrPreTem1`, `gestanteEntrPreTem2`, `gestanteEntrPreTem3`, `gestanteEntrPreTem4`, `gestanteEntrPreTem5`, `gestanteEntrPreFec1`, `gestanteEntrPreFec2`, `gestanteEntrPreFec3`, `gestanteEntrPreFec4`, `gestanteEntrPreFec5`, `GestanteFactProct`, `GestanteEstimFetal`, `GestanteLactMater`, `GestanteVincuAfec`, `GestantePreveAutom`, `GestanteConTaba`, `GestanteSignAlar`, `gestanteOtroEduInd`, `GestnteGrupoSa`, `GestanteclasRh`, `examHemogesta`, `echoasgesta`, `GestanteCitolVag`, `GestanteFechaultCito`, `GestanteNormSatis`, `GestanteCamBeni`, `GestanteAnorPlant`, `GestanteColscopPl`, `listadoCIEPa`, `tipoDiagnosPrinc`, `medAsigCons`, `notasEvolucion`, `recomNotas`, `ordenMedCons`, `ordenMedConsRef`, `ordenMedConsRefPro`, `tipoSerRef`, `obseSerRef`, `IpsServicioReferir`, `IpsProcedeimientoReferir`,`ObserVExFisico`) VALUES (:idJSON_consulta, :numid_pac, :tipoid_pac, :id_registra, :tipoid_registra, :insitucion, :fechaConsulta, :horaConsulta, :tipoConsulta, :finalidadConsulta, :causaExternaConsulta, :motivoConsulta, :enfermedadActualConsulta, :embraActuaPlanea, :embraActuaDesead, :deseaInterrumEmbara, :GestanteAntDiabetes, :GestanteAntHipertensionArterial, :GestanteAntCirugiaPelvica, :GestanteAntOtrasCirugias, :GestanteAntPreeclamsia, :GestanteAntEclamsia, :GestanteAntFactorRH, :GestanteAntTransfusiones, :GestanteAntAltTiroideas, :GestanteAntNutiPrevDefic, :GestanteAntEnfRenalCronica, :GestanteAntTtoInfertilidad, :GestanteAntDifLactancia, :GestanteAntAlergias, :GestanteAntAlergiassCuales, :GestanteAntTraumaticos, :GestanteAntOtrasTBC, :GestanteAntPsicofarm, :GestanteAntOtrasCigarrilloAlcohol, :GestanteAnIrradiacion, :GestanteVIHSIDA, :GestanteAntExpoToxicos, :GestanteAntExpoToxicosCuales, :GestanteAntMedicamentos, :GestanteAntMedicamentosCuales, :GestanteAntUsaCepillo, :GestanteAntUsaCrema, :GestanteAntUsaSeda, :GestanteAntVecesCepilla, :GestanteAntSangranEncias, :GestanteAntDolorRuidosATM, :GestanteAntMovilidadDientes, :GestanteAntLimitacionAbrirBoca, :GestanteAntFechaUConsO, :GestanteAntEdadMenarquia, :GestanteSexarquia, :GestanteAntFechaFum, :GestanteAntConfiableFUM, :GestanteAntCiclosIrregulares, :GestanteAntPatronCicloI, :GestanteAntPatronCicloII, :GestanteAntFEchaUltParto, :GestanteAntFechaFPP, :GestanteAntparejasSexuales, :GestanteAntVihRprueba, :GestanteAntTtoInfertilidadG, :GestanteAntTtoInfertilidadGTipo, :GestanteAntMetodoPlanifica, :GestanteAntFechaSusMetodoPlan, :GestanteAntEmbarazos, :GestanteAntAbortoHabitu, :GestanteAntGineG, :GestanteAntGineP, :GestanteAntGineC, :GestanteAntGineA, :GestanteAntGineE, :GestanteAntGineV, :GestanteAntGineM, :GestanteAntObservaObst, :GestanteAntLeucorreas, :GestanteAntLeucorreasDescr, :GestanteAntETS, :GestanteAntFechaCITOLOGIAUtl, :GestanteAntCOLPOSCOPIA, :GestanteAntPerioINTERGENESICO, :GestanteAntPerioINTERGENESICOUME, :GestanteAntRCIU, :GestanteAntAmenaPartoPrematuro, :GestanteAntPartoPREMATURO, :GestanteAntEmbaraMultiple, :GestanteAntEmbaraMultipleDesc, :GestanteAntMALFORMACIONES, :GestanteAntMOLAS, :GestanteAntPLACPREVIA, :GestanteAntABRUPTIO, :GestanteAntRetePlacenta, :GestanteAntRupturaPreMembra, :GestanteAntOLIGOHIDRAMNIOS, :GestanteAntOLIGOAMNIOS, :GestanteHemorraObst, :GestanteTransfucciones, :GestanteAntEmbProlongado, :GestanteAntGineOtros, :GestanteAntGineOtrosCuales, :GestanteAntAmenazaAborto, :GestanteAntInfeccPostParto, :GestanteAntMacromsiaFetal, :GestanteAntMuertePerinatal, :GestanteAntMuertePerinatalCausa, :GestanteAntPsicosisPostParto, :causaCesareasAnt, :GestanteAntDiabetesfamiliar, :GestanteAntHtaFamiliar, :GestanteAntPreeclamsiaFamiliares, :GestanteAntEclamsiaFamiliares, :GestanteAntGemelaresFamiliares, :GestanteAntCardiopatiaFamiliares, :GestanteAntEnfTROMBOFILIAS, :GestanteAntTBCFamiliares, :GestanteAntTranstornosMentales, :GestanteAntEpilepsia, :GestanteAntAutoinmune, :GestanteAntNeoplasias, :GestanteAntDiscapacidadFamiliares, :GestanteAntOtrosFamiliares, :GestanteAntOtrosFamiliaresCuales, :GestanteAntBiopssicuno, :GestanteAntBiopssicdos, :GestanteAntBiopssictres, :BiopEdad, :BioPari, :abprhabinfer, :retencPlacent, :pesobebemayor, :pesobebemenor, :htaIndEmbara, :EmbaGemelarCesara, :mortinatoMuerto, :TPProlongada, :OXgineolgica, :EnferReanlCronic, :diabetGesta, :diabetesMellitus, :EnfermCardiaca, :EnfermedadInfeccios, :enfeAutoInmunes, :anemiaHB10gl, :hemorragia20ms, :vaginal2oss, :Epronlogadoante, :htaantecdepr, :anteRpm, :polidraminiosAntEmbaActual, :RCIUAntecente, :embMultipleatne, :MalaPresenta, :isoirh, :GestanteAntBiopssiccuator, :GestanteAntBiopssiccinco, :GestanteAntBiopssicseis, :ControPrenaacieLis, :GestanteVacu1ra, :GestanteVacu2ra, :GestanteVacu1, :GestanteVacu2, :GestanteVacu3, :GestanteAnaRieMa1, :GestanteAnaRieNi1, :GestanteAnaRieMa2, :GestanteAnaRieNi2, :GestanteAnaRieMa3, :GestanteAnaRieNi3, :gestanteEntrPreTem1, :gestanteEntrPreTem2, :gestanteEntrPreTem3, :gestanteEntrPreTem4, :gestanteEntrPreTem5, :gestanteEntrPreFec1, :gestanteEntrPreFec2, :gestanteEntrPreFec3, :gestanteEntrPreFec4, :gestanteEntrPreFec5, :GestanteFactProct, :GestanteEstimFetal, :GestanteLactMater, :GestanteVincuAfec, :GestantePreveAutom, :GestanteConTaba, :GestanteSignAlar, :gestanteOtroEduInd, :GestnteGrupoSa, :GestanteclasRh, :examHemogesta, :echoasgesta, :GestanteCitolVag, :GestanteFechaultCito, :GestanteNormSatis, :GestanteCamBeni, :GestanteAnorPlant, :GestanteColscopPl, :listadoCIEPa, :tipoDiagnosPrinc, :medAsigCons, :notasEvolucion, :recomNotas, :ordenMedCons, :ordenMedConsRef, :ordenMedConsRefPro, :tipoSerRef, :obseSerRef, :IpsServicioReferir, :IpsProcedeimientoReferir, :ObserVExFisico)";
            
            
            $dbh=$instance->__connection;

            $stmt = $dbh->prepare($sql);
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dataIn=array( 
                ":idJSON_consulta" => $data['idJSON_consulta'],
                ":numid_pac" => $data['numid_pac'],
                ":tipoid_pac" => $data['tipoid_pac'],
                ":id_registra" => $data['id_registra'],
                ":tipoid_registra" => $data['tipoid_registra'],
                ":insitucion" => $data['insitucion'],
                ":fechaConsulta" => $data['fechaConsulta'],
                ":horaConsulta" => $data['horaConsulta'],
                ":tipoConsulta" => $data['tipoConsulta'],
                ":finalidadConsulta" => $data['finalidadConsulta'],
                ":causaExternaConsulta" => $data['causaExternaConsulta'],
                ":motivoConsulta" => $data['motivoConsulta'],
                ":enfermedadActualConsulta" => $data['enfermedadActualConsulta'],
                ":embraActuaPlanea" => $data['embraActuaPlanea'],
                ":embraActuaDesead" => $data['embraActuaDesead'],
                ":deseaInterrumEmbara" => $data['deseaInterrumEmbara'],
                ":GestanteAntDiabetes" => $data['GestanteAntDiabetes'],
                ":GestanteAntHipertensionArterial" => $data['GestanteAntHipertensionArterial'],
                ":GestanteAntCirugiaPelvica" => $data['GestanteAntCirugiaPelvica'],
                ":GestanteAntOtrasCirugias" => $data['GestanteAntOtrasCirugias'],
                ":GestanteAntPreeclamsia" => $data['GestanteAntPreeclamsia'],
                ":GestanteAntEclamsia" => $data['GestanteAntEclamsia'],
                ":GestanteAntFactorRH" => $data['GestanteAntFactorRH'],
                ":GestanteAntTransfusiones" => $data['GestanteAntTransfusiones'],
                ":GestanteAntAltTiroideas" => $data['GestanteAntAltTiroideas'],
                ":GestanteAntNutiPrevDefic" => $data['GestanteAntNutiPrevDefic'],
                ":GestanteAntEnfRenalCronica" => $data['GestanteAntEnfRenalCronica'],
                ":GestanteAntTtoInfertilidad" => $data['GestanteAntTtoInfertilidad'],
                ":GestanteAntDifLactancia" => $data['GestanteAntDifLactancia'],
                ":GestanteAntAlergias" => $data['GestanteAntAlergias'],
                ":GestanteAntAlergiassCuales" => $data['GestanteAntAlergiassCuales'],
                ":GestanteAntTraumaticos" => $data['GestanteAntTraumaticos'],
                ":GestanteAntOtrasTBC" => $data['GestanteAntOtrasTBC'],
                ":GestanteAntPsicofarm" => $data['GestanteAntPsicofarm'],
                ":GestanteAntOtrasCigarrilloAlcohol" => $data['GestanteAntOtrasCigarrilloAlcohol'],
                ":GestanteAnIrradiacion" => $data['GestanteAnIrradiacion'],
                ":GestanteVIHSIDA" => $data['GestanteVIHSIDA'],
                ":GestanteAntExpoToxicos" => $data['GestanteAntExpoToxicos'],
                ":GestanteAntExpoToxicosCuales" => $data['GestanteAntExpoToxicosCuales'],
                ":GestanteAntMedicamentos" => $data['GestanteAntMedicamentos'],
                ":GestanteAntMedicamentosCuales" => $data['GestanteAntMedicamentosCuales'],
                ":GestanteAntUsaCepillo" => $data['GestanteAntUsaCepillo'],
                ":GestanteAntUsaCrema" => $data['GestanteAntUsaCrema'],
                ":GestanteAntUsaSeda" => $data['GestanteAntUsaSeda'],
                ":GestanteAntVecesCepilla" => $data['GestanteAntVecesCepilla'],
                ":GestanteAntSangranEncias" => $data['GestanteAntSangranEncias'],
                ":GestanteAntDolorRuidosATM" => $data['GestanteAntDolorRuidosATM'],
                ":GestanteAntMovilidadDientes" => $data['GestanteAntMovilidadDientes'],
                ":GestanteAntLimitacionAbrirBoca" => $data['GestanteAntLimitacionAbrirBoca'],
                ":GestanteAntFechaUConsO" => $data['GestanteAntFechaUConsO'],
                ":GestanteAntEdadMenarquia" => $data['GestanteAntEdadMenarquia'],
                ":GestanteSexarquia" => $data['GestanteSexarquia'],
                ":GestanteAntFechaFum" => $data['GestanteAntFechaFum'],
                ":GestanteAntConfiableFUM" => $data['GestanteAntConfiableFUM'],
                ":GestanteAntCiclosIrregulares" => $data['GestanteAntCiclosIrregulares'],
                ":GestanteAntPatronCicloI" => $data['GestanteAntPatronCicloI'],
                ":GestanteAntPatronCicloII" => $data['GestanteAntPatronCicloII'],
                ":GestanteAntFEchaUltParto" => $data['GestanteAntFEchaUltParto'],
                ":GestanteAntFechaFPP" => $data['GestanteAntFechaFPP'],
                ":GestanteAntparejasSexuales" => $data['GestanteAntparejasSexuales'],
                ":GestanteAntVihRprueba" => $data['GestanteAntVihRprueba'],
                ":GestanteAntTtoInfertilidadG" => $data['GestanteAntTtoInfertilidadG'],
                ":GestanteAntTtoInfertilidadGTipo" => $data['GestanteAntTtoInfertilidadGTipo'],
                ":GestanteAntMetodoPlanifica" => $data['GestanteAntMetodoPlanifica'],
                ":GestanteAntFechaSusMetodoPlan" => $data['GestanteAntFechaSusMetodoPlan'],
                ":GestanteAntEmbarazos" => $data['GestanteAntEmbarazos'],
                ":GestanteAntAbortoHabitu" => $data['GestanteAntAbortoHabitu'],
                ":GestanteAntGineG" => $data['GestanteAntGineG'],
                ":GestanteAntGineP" => $data['GestanteAntGineP'],
                ":GestanteAntGineC" => $data['GestanteAntGineC'],
                ":GestanteAntGineA" => $data['GestanteAntGineA'],
                ":GestanteAntGineE" => $data['GestanteAntGineE'],
                ":GestanteAntGineV" => $data['GestanteAntGineV'],
                ":GestanteAntGineM" => $data['GestanteAntGineM'],
                ":GestanteAntObservaObst" => $data['GestanteAntObservaObst'],
                ":GestanteAntLeucorreas" => $data['GestanteAntLeucorreas'],
                ":GestanteAntLeucorreasDescr" => $data['GestanteAntLeucorreasDescr'],
                ":GestanteAntETS" => $data['GestanteAntETS'],
                ":GestanteAntFechaCITOLOGIAUtl" => $data['GestanteAntFechaCITOLOGIAUtl'],
                ":GestanteAntCOLPOSCOPIA" => $data['GestanteAntCOLPOSCOPIA'],
                ":GestanteAntPerioINTERGENESICO" => $data['GestanteAntPerioINTERGENESICO'],
                ":GestanteAntPerioINTERGENESICOUME" => $data['GestanteAntPerioINTERGENESICOUME'],
                ":GestanteAntRCIU" => $data['GestanteAntRCIU'],
                ":GestanteAntAmenaPartoPrematuro" => $data['GestanteAntAmenaPartoPrematuro'],
                ":GestanteAntPartoPREMATURO" => $data['GestanteAntPartoPREMATURO'],
                ":GestanteAntEmbaraMultiple" => $data['GestanteAntEmbaraMultiple'],
                ":GestanteAntEmbaraMultipleDesc" => $data['GestanteAntEmbaraMultipleDesc'],
                ":GestanteAntMALFORMACIONES" => $data['GestanteAntMALFORMACIONES'],
                ":GestanteAntMOLAS" => $data['GestanteAntMOLAS'],
                ":GestanteAntPLACPREVIA" => $data['GestanteAntPLACPREVIA'],
                ":GestanteAntABRUPTIO" => $data['GestanteAntABRUPTIO'],
                ":GestanteAntRetePlacenta" => $data['GestanteAntRetePlacenta'],
                ":GestanteAntRupturaPreMembra" => $data['GestanteAntRupturaPreMembra'],
                ":GestanteAntOLIGOHIDRAMNIOS" => $data['GestanteAntOLIGOHIDRAMNIOS'],
                ":GestanteAntOLIGOAMNIOS" => $data['GestanteAntOLIGOAMNIOS'],
                ":GestanteHemorraObst" => $data['GestanteHemorraObst'],
                ":GestanteTransfucciones" => $data['GestanteTransfucciones'],
                ":GestanteAntEmbProlongado" => $data['GestanteAntEmbProlongado'],
                ":GestanteAntGineOtros" => $data['GestanteAntGineOtros'],
                ":GestanteAntGineOtrosCuales" => $data['GestanteAntGineOtrosCuales'],
                ":GestanteAntAmenazaAborto" => $data['GestanteAntAmenazaAborto'],
                ":GestanteAntInfeccPostParto" => $data['GestanteAntInfeccPostParto'],
                ":GestanteAntMacromsiaFetal" => $data['GestanteAntMacromsiaFetal'],
                ":GestanteAntMuertePerinatal" => $data['GestanteAntMuertePerinatal'],
                ":GestanteAntMuertePerinatalCausa" => $data['GestanteAntMuertePerinatalCausa'],
                ":GestanteAntPsicosisPostParto" => $data['GestanteAntPsicosisPostParto'],
                ":causaCesareasAnt" => $data['causaCesareasAnt'],
                ":GestanteAntDiabetesfamiliar" => $data['GestanteAntDiabetesfamiliar'],
                ":GestanteAntHtaFamiliar" => $data['GestanteAntHtaFamiliar'],
                ":GestanteAntPreeclamsiaFamiliares" => $data['GestanteAntPreeclamsiaFamiliares'],
                ":GestanteAntEclamsiaFamiliares" => $data['GestanteAntEclamsiaFamiliares'],
                ":GestanteAntGemelaresFamiliares" => $data['GestanteAntGemelaresFamiliares'],
                ":GestanteAntCardiopatiaFamiliares" => $data['GestanteAntCardiopatiaFamiliares'],
                ":GestanteAntEnfTROMBOFILIAS" => $data['GestanteAntEnfTROMBOFILIAS'],
                ":GestanteAntTBCFamiliares" => $data['GestanteAntTBCFamiliares'],
                ":GestanteAntTranstornosMentales" => $data['GestanteAntTranstornosMentales'],
                ":GestanteAntEpilepsia" => $data['GestanteAntEpilepsia'],
                ":GestanteAntAutoinmune" => $data['GestanteAntAutoinmune'],
                ":GestanteAntNeoplasias" => $data['GestanteAntNeoplasias'],
                ":GestanteAntDiscapacidadFamiliares" => $data['GestanteAntDiscapacidadFamiliares'],
                ":GestanteAntOtrosFamiliares" => $data['GestanteAntOtrosFamiliares'],
                ":GestanteAntOtrosFamiliaresCuales" => $data['GestanteAntOtrosFamiliaresCuales'],
                ":GestanteAntBiopssicuno" => $data['GestanteAntBiopssicuno'],
                ":GestanteAntBiopssicdos" => $data['GestanteAntBiopssicdos'],
                ":GestanteAntBiopssictres" => $data['GestanteAntBiopssictres'],
                ":BiopEdad" => $data['BiopEdad'],
                ":BioPari" => $data['BioPari'],
                ":abprhabinfer" => $data['abprhabinfer'],
                ":retencPlacent" => $data['retencPlacent'],
                ":pesobebemayor" => $data['pesobebemayor'],
                ":pesobebemenor" => $data['pesobebemenor'],
                ":htaIndEmbara" => $data['htaIndEmbara'],
                ":EmbaGemelarCesara" => $data['EmbaGemelarCesara'],
                ":mortinatoMuerto" => $data['mortinatoMuerto'],
                ":TPProlongada" => $data['TPProlongada'],
                ":OXgineolgica" => $data['OXgineolgica'],
                ":EnferReanlCronic" => $data['EnferReanlCronic'],
                ":diabetGesta" => $data['diabetGesta'],
                ":diabetesMellitus" => $data['diabetesMellitus'],
                ":EnfermCardiaca" => $data['EnfermCardiaca'],
                ":EnfermedadInfeccios" => $data['EnfermedadInfeccios'],
                ":enfeAutoInmunes" => $data['enfeAutoInmunes'],
                ":anemiaHB10gl" => $data['anemiaHB10gl'],
                ":hemorragia20ms" => $data['hemorragia20ms'],
                ":vaginal2oss" => $data['vaginal2oss'],
                ":Epronlogadoante" => $data['Epronlogadoante'],
                ":htaantecdepr" => $data['htaantecdepr'],
                ":anteRpm" => $data['anteRpm'],
                ":polidraminiosAntEmbaActual" => $data['polidraminiosAntEmbaActual'],
                ":RCIUAntecente" => $data['RCIUAntecente'],
                ":embMultipleatne" => $data['embMultipleatne'],
                ":MalaPresenta" => $data['MalaPresenta'],
                ":isoirh" => $data['isoirh'],
                ":GestanteAntBiopssiccuator" => $data['GestanteAntBiopssiccuator'],
                ":GestanteAntBiopssiccinco" => $data['GestanteAntBiopssiccinco'],
                ":GestanteAntBiopssicseis" => $data['GestanteAntBiopssicseis'],
                ":ControPrenaacieLis" => $data['ControPrenaacieLis'],
                ":GestanteVacu1ra" => $data['GestanteVacu1ra'],
                ":GestanteVacu2ra" => $data['GestanteVacu2ra'],
                ":GestanteVacu1" => $data['GestanteVacu1'],
                ":GestanteVacu2" => $data['GestanteVacu2'],
                ":GestanteVacu3" => $data['GestanteVacu3'],
                ":GestanteAnaRieMa1" => $data['GestanteAnaRieMa1'],
                ":GestanteAnaRieNi1" => $data['GestanteAnaRieNi1'],
                ":GestanteAnaRieMa2" => $data['GestanteAnaRieMa2'],
                ":GestanteAnaRieNi2" => $data['GestanteAnaRieNi2'],
                ":GestanteAnaRieMa3" => $data['GestanteAnaRieMa3'],
                ":GestanteAnaRieNi3" => $data['GestanteAnaRieNi3'],
                ":gestanteEntrPreTem1" => $data['gestanteEntrPreTem1'],
                ":gestanteEntrPreTem2" => $data['gestanteEntrPreTem2'],
                ":gestanteEntrPreTem3" => $data['gestanteEntrPreTem3'],
                ":gestanteEntrPreTem4" => $data['gestanteEntrPreTem4'],
                ":gestanteEntrPreTem5" => $data['gestanteEntrPreTem5'],
                ":gestanteEntrPreFec1" => $data['gestanteEntrPreFec1'],
                ":gestanteEntrPreFec2" => $data['gestanteEntrPreFec2'],
                ":gestanteEntrPreFec3" => $data['gestanteEntrPreFec3'],
                ":gestanteEntrPreFec4" => $data['gestanteEntrPreFec4'],
                ":gestanteEntrPreFec5" => $data['gestanteEntrPreFec5'],
                ":GestanteFactProct" => $data['GestanteFactProct'],
                ":GestanteEstimFetal" => $data['GestanteEstimFetal'],
                ":GestanteLactMater" => $data['GestanteLactMater'],
                ":GestanteVincuAfec" => $data['GestanteVincuAfec'],
                ":GestantePreveAutom" => $data['GestantePreveAutom'],
                ":GestanteConTaba" => $data['GestanteConTaba'],
                ":GestanteSignAlar" => $data['GestanteSignAlar'],
                ":gestanteOtroEduInd" => $data['gestanteOtroEduInd'],
                ":GestnteGrupoSa" => $data['GestnteGrupoSa'],
                ":GestanteclasRh" => $data['GestanteclasRh'],
                ":examHemogesta" => $data['examHemogesta'],
                ":echoasgesta" => $data['echoasgesta'],
                ":GestanteCitolVag" => $data['GestanteCitolVag'],
                ":GestanteFechaultCito" => $data['GestanteFechaultCito'],
                ":GestanteNormSatis" => $data['GestanteNormSatis'],
                ":GestanteCamBeni" => $data['GestanteCamBeni'],
                ":GestanteAnorPlant" => $data['GestanteAnorPlant'],
                ":GestanteColscopPl" => $data['GestanteColscopPl'],
                ":listadoCIEPa" => $data['listadoCIEPa'],
                ":tipoDiagnosPrinc" => $data['tipoDiagnosPrinc'],
                ":medAsigCons" => $data['medAsigCons'],
                ":notasEvolucion" => $data['notasEvolucion'],
                ":recomNotas" => $data['recomNotas'],
                ":ordenMedCons" => $data['ordenMedCons'],
                ":ordenMedConsRef" => $data['ordenMedConsRef'],
                ":ordenMedConsRefPro" => $data['ordenMedConsRefPro'],
                ":tipoSerRef" => $data['tipoSerRef'],
                ":obseSerRef" => $data['obseSerRef'],
                ":IpsServicioReferir" => $data['IpsServicioReferir'],
                ":IpsProcedeimientoReferir" => $data['IpsProcedeimientoReferir'],
                ":ObserVExFisico" => $data['ObserVExFisico'] 
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
         
         
            $sql = "SELECT gr.* , pc.nombres, pc.papellido, pc.sapellido FROM consultas_prenatales gr, pacientes pc WHERE pc.idRegPac=gr.numid_pac AND pc.tipoidRegPac=gr.tipoid_pac";
    
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
         
            $sql = "SELECT gr.*, usr.nombres AS nombreProfesional FROM consultas_prenatales gr, usuarios usr WHERE (gr.tipoid_pac=:tipoid_pac AND gr.numid_pac=:numid_pac)  AND usr.numid=gr.id_registra";
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

