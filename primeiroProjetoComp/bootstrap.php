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

$r->post('/exer2/resposta', function(){
    $vet = [];

    #for de inserção
    for($i = 1; $i <= 7; $i++){
        if(isset($_POST['valor'.$i])) {
            $vet[$i] = $_POST['valor'.$i];
        }
    }
    $menor = 0;
    $pos = 0;
    #for de maior
    for($i = 1; $i <= 7; $i++){
        if($i == 1){
            if(isset($vet[$i])) {
                $menor = $vet[$i];
                $pos = $i;
            }
        }
        else{
            if(isset($vet[$i]) && $vet[$i] < $menor){
                $menor = $vet[$i];
                $pos = $i;
            }
        }
    }
    echo "O menor valor é: ".$menor.". Está na posição: ".$pos. " da ordem de entrada<br>";
    
    echo implode(",", $vet);
});



#############

# Exercício 3 

$r->get('/exer3/formulario', function(){
    include('exer3.html');
});

$r->post('/exer3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = 0;

    if($valor1 == $valor2){
        $soma = ($valor1 + $valor2) * 3;
        return "A soma é: ".$soma."<br> pois os números são iguais: multiplicou a soma por três";
    } 
    else{
        $soma = $valor1 + $valor2;
        return "A soma é: ".$soma;
    }

    
});

####################

#Exercício 3

$r->get("/exer4/formulario", function(){
    include('exer4.html');
});

$r->post("/exer4/resposta", function(){
    $num = $_POST['num'];

    for($i = 0; $i <= 10; $i++){
        echo $num.'x'. $i . ' = '. $num * $i. '<br>';
    }
});

##################

#Exercício 5
$r->get('/exer5/formulario', function(){
    include('exer5.html');
});

$r->post('/exer5/resposta', function(){
    $num = $_POST['num'];
    $fatorial = 1;
    #fatorial
    if($num == 0){
        return "O fatorial de 0 é 1";
    }
    elseif($num == 1){
        return "O fatorial de 1 é 1";
    }
    else{
        for($i = $num; $i > 1; $i--){
            $fatorial *= $i;
        }
        return "O fatorial de ".$num. " é: ".$fatorial;
    }

});

##############

#Exercício 6
$r->get("/exer6/formulario", function(){
    include("exer6.html");
});

$r->post("/exer6/resposta", function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if($valor1 == $valor2){
        return "Valores iguais: ".$valor1;
    }
    else{
        if($valor1 < $valor2){
            return $valor1." ".$valor2;
        }
        elseif($valor1 > $valor2){
            return $valor2." ".$valor1;
        }
    }
});




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




