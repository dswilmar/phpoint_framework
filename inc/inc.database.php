<?php

/**
 * Arquivo de funções de banco de dados
 *
 * @package phpoint_framework
 * @author  Wilmar dos Santos
 **/

function conn() {
	
    $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    try {
        $conexao = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, $opcoes);  
    } catch (Exception $ex) {
        echo '<h2>Erro ao abrir conexão com o Banco de Dados: '.$ex->getMessage().'</h2>';
        exit();
    }
    
    return $conexao;
}

function query($sql, $parametros = null) {

	$itens = array();
        
    $obj = conn()->prepare($sql);
    
    if ($parametros != null) {
            if (count($parametros) > 0) {
            foreach ($parametros as $key => $value) {
                $obj->bindValue($key, $value);
            }
        }
    }
    
    $obj->execute();        
    
    while ($lista = $obj->fetch(PDO::FETCH_ASSOC)) {
        array_push($itens, $lista);
    }
    
    return $itens;
}

function exec_sql($sql, $parametros = null) {

	$obj = conn()->prepare($sql);
	if (count($parametros) > 0) {
        foreach ($parametros as $key => $value) {
            $obj->bindValue($key, $value);
        }
    }
    $obj->execute();
}