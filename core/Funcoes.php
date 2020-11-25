<?php
class Funcoes {

    public static function converterDataEUAParaBR($dataExplode,$retornarHorario = 0){
        $data1 = explode(" ",$dataExplode);
        $data2 = explode("-",$data1[0]);
        $dataBr = $data2[2]."/".$data2[1]."/".$data2[0];
        // SOMENTE SE DATA TIVER HORARIO
        if($retornarHorario == 1 && isset($data1[1]) ){
            return $dataBr." ".$data1[1];
        }
        return $dataBr;        
    }

    public static function converterDataBRParaEUA($dataExplode,$retornarHorario = 0){
        $data1 = explode(" ",$dataExplode);
        $data2 = explode("/",$data1[0]);
        $dataEUA = $data2[2]."-".$data2[1]."-".$data2[0];
        // SOMENTE SE DATA TIVER HORARIO
        if($retornarHorario == 1 && isset($data1[1]) ){
            return $dataEUA." ".$data1[1];
        }
        return $dataEUA;        
    }    
}

?>