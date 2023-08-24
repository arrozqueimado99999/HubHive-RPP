<?php

/**
* Funcao para pegar um valor de um array de forma segura
* sem dar erro caso nao exista
* $arr $key
*/
function _v($arr,$val){
	if (isset($arr[$val])){
		return $arr[$val];	
	} else {
		return "";	
	}
}

/*function now() {
    // Obtém o timestamp atual
    $timestamp = time();

    // Obtém a data no formato 'Ano-Mês-Dia'
    $date = date('Y-m-d', $timestamp);

    // Obtém a hora no formato 'Hora:Minuto'
    $horaMinuto = date('H:i', $timestamp);

    // Concatena a data e hora no formato desejado
    $dataHoraAtual = $date . ' ás ' . $horaMinuto;

    return $dataHoraAtual;
}*/


function dd($arr){
    print "<pre>";
    print_r($arr);
    print "</pre>";
    die();
}

/**
* AmericanDate to PtBrDate
*/
function dateToBr($date = ""){
    if ($date == ""){
        return "";
    }
    
    $date = date_create_from_format('Y-m-d',$date);
    return date_format($date, 'd/m/Y');
}

/**
* AmericanDate to PtBrDate
*/
function dateToEUA($date = ""){
    if ($date == ""){
        return "";
    }
    
    $date = date_create_from_format('d/m/Y', $date);
    return date_format($date, 'Y/m/d');
}