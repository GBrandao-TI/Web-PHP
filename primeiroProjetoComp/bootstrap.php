<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';  #retorna o que está depois do / do endereço na URL Ex: www.fatecpp.gov.br/calendario

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
});

$r->get('/olapessoa', function(){
    return "Olá pessoa";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá, '.$params[1];
});


#Exercício 1
$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $soma = $valor1 + $valor2;


    #exerc1

    $valor3 = $_POST['valor3'];

    if($valor3 > 0){
        echo "{$valor3} é maior que zero";
    } elseif($valor3 < 0){
        echo "{$valor3} é menor que zero";
    }
    elseif($valor3 === 0){
        echo "{$valor3} é igual a zero";
    }

    return "<br>A soma é: {$soma}";

});
###########

#Exercício 2 -- TERMINAR
$r->get('/exer2/formulario', function(){
    include("exer2.html");
});

#############


#ROTAS

$resultado = $r->handler();

#se der erro de rota, a aplicação é finalizada
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada";
    die();
}

#se existir a rota, executa essa função e passa os parâmetros respectivos
echo $resultado($r->getParams());




