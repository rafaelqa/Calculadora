<?php

function __autoload($classname) {
    $classname = str_replace('\\', '/', $classname);
    $filename = "./". $classname .".php";
    include_once($filename); 
}
//if($argc >= 4){
//	$calcula = new Matematica\Calcula();
//	$operacao = $argv[1];
//	$quantidadeNum = ($argc-3);
//	unset( $argv[0],$argv[1] );
//	$argv = array_values($argv);
//	$imprime = $calcula->operacaoMatematica($argv, $quantidadeNum, $operacao);
//	echo $imprime."\n";
//} else{
//	echo "comandos não adequados ao padrão exigido \n";
//}
unset( $argv[0],$argv[1] );
$argv = array_values($argv);
$O = new \Math\Operation();
echo $s = call_user_func_array(array($O, 'sum'), $argv);
echo "\n";
