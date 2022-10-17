<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$xml = simplexml_load_file('signos.xml');

$data = $_POST['data'];
$convert = strtotime($data);
$dataConv = date('d-m', $convert);
$dia = date('d', $convert);
$mes = date('m', $convert);


$ano = date('Y');


foreach($xml->signo as $retorno){
    $dataInicio = (string)$retorno->dataInicio;
    $dataFim = (string)$retorno->dataFim;
    $dataInicio = str_replace('/', '-', $dataInicio);
    $dataFim = str_replace('/', '-', $dataFim);
    $dataInicio = $dataInicio . '-' .$ano;
    $dataFim = $dataFim . '-' .$ano;

    $dataInicioConvert = strtotime($dataInicio);
    $dataFimConvert = strtotime($dataFim);
    
    $diaSignoInicio = date('d', $dataInicioConvert);
    $diaSignoFim = date('d', $dataFimConvert);
    //var_dump($diaSignoInicio,$diaSignoFim);
    $mesSignoInicio = date('m', $dataInicioConvert);
    $mesSignoFim = date('m', $dataFimConvert);
    //var_dump($mesSignoInicio,$mesSignoInicio);
    $signoNome = $retorno->signoNome;
    $descricao = $retorno->descricao;

    if(($dia >= $diaSignoInicio && $mes == $mesSignoInicio) || ($dia <= $diaSignoFim && $mes == $mesSignoFim)){
            echo "Seu Signo: $signoNome";
            echo "<br>";
            echo "Descrição: $descricao";        
    }
}

?>
    <form action="index.html">
            <input type="submit" value="Voltar">
    </form>
</body>
</html>