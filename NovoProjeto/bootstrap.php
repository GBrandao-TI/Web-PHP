<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';  //retorna o que está depois do / do endereço na URL Ex: www.fatecpp.gov.br/calendario

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

//ROTAS

$r->get('/olamundo', 'Php\Primeiroprojeto\Controllers\HomeController@olaMundo');

$r->get('/olapessoa', function(){
    return "Olá pessoa";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá, '.$params[1];
});

// Nomear as rotas

// Categoria

// Chamando o formulário para inserir categoria
$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

// Enviando os dados para serem armazenados no banco de dados
$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');


// Rota Aluno
$r->get('/aluno/inserir', 'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo', 'Php\Primeiroprojeto\Controllers\AlunoController@novo');

//Rota Instrutor
$r->get('/instrutor/inserir', 'Php\Primeiroprojeto\Controllers\InstrutorController@inserir');

$r->post('/instrutor/novo', 'Php\Primeiroprojeto\Controllers\InstrutorController@novo');

//Rota Veículo

//Rota Depesas
$r->get('/despesa/inserir','Php\Primeiroprojeto\Controllers\DespesaController@inserir');

$r->post('/despesa/novo', 'Php\Primeiroprojeto\Controllers\DespesaController@novo');


//ROTAS

$resultado = $r->handler();

//se der erro de rota, a aplicação é finalizada
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada";
    die();
}

if($resultado instanceof Closure) { 
    //Se a rota existir, chama a func e passa o param
    echo $resultado($r->getParams());
}
elseif(is_string($resultado)){
    $resultado = explode("@", $resultado); // separa a variavel do nome do método
    $controller = new $resultado[0]; // instanciando o controller
    $resultado = $resultado[1]; 
    // acessando o método
    echo $controller->$resultado($r->getParams());
}




