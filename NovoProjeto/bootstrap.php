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

// // Chamando o formulário para inserir categoria
// $r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

// // Enviando os dados para serem armazenados no banco de dados
// $r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');


// Rota Aluno
$r->get('/aluno/inserir', 'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo', 'Php\Primeiroprojeto\Controllers\AlunoController@novo');

        //rota para o select
$r->get('/aluno', 'Php\Primeiroprojeto\Controllers\AlunoController@index');
        //se tiver inserido, alterado ou excluído
$r->get('/aluno/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\AlunoController@index');

$r->get('/aluno/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\AlunoController@alterar');

$r->post('/aluno/editar', "Php\Primeiroprojeto\Controllers\AlunoController@editar");

$r->post('/aluno/deletar', "Php\Primeiroprojeto\Controllers\AlunoController@deletar");

$r->get('/aluno/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\AlunoController@excluir');

//Rota Instrutor
$r->get('/instrutor/inserir', 'Php\Primeiroprojeto\Controllers\InstrutorController@inserir');

$r->post('/instrutor/novo', 'Php\Primeiroprojeto\Controllers\InstrutorController@novo');

$r->get('/instrutor', 'Php\Primeiroprojeto\Controllers\InstrutorController@index');

$r->get('/instrutor/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\InstrutorController@index');

$r->get('/instrutor/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\InstrutorController@alterar');

$r->post('/instrutor/editar', "Php\Primeiroprojeto\Controllers\InstrutorController@editar");

$r->post('/instrutor/deletar', "Php\Primeiroprojeto\Controllers\InstrutorController@deletar");

$r->get('/instrutor/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\InstrutorController@excluir');



// Rota Veiculo
$r->get('/veiculo/inserir', 'Php\Primeiroprojeto\Controllers\VeiculoController@inserir');

$r->post('/veiculo/novo', 'Php\Primeiroprojeto\Controllers\VeiculoController@novo');

$r->get('/veiculo', 'Php\Primeiroprojeto\Controllers\VeiculoController@index');

$r->get('/veiculo/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\VeiculoController@index');

$r->get('/veiculo/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\VeiculoController@alterar');

$r->post('/veiculo/editar', 'Php\Primeiroprojeto\Controllers\VeiculoController@editar');

$r->post('/veiculo/deletar', 'Php\Primeiroprojeto\Controllers\VeiculoController@deletar');

$r->get('/veiculo/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\VeiculoController@excluir');



//Rota Depesas
$r->get('/despesa/inserir', 'Php\Primeiroprojeto\Controllers\DespesaController@inserir');

$r->post('/despesa/novo', 'Php\Primeiroprojeto\Controllers\DespesaController@novo');

$r->get('/despesa', 'Php\Primeiroprojeto\Controllers\DespesaController@index');

$r->get('/despesa/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\DespesaController@index');

$r->get('/despesa/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\DespesaController@alterar');

$r->post('/despesa/editar', "Php\Primeiroprojeto\Controllers\DespesaController@editar");

$r->post('/despesa/deletar', "Php\Primeiroprojeto\Controllers\DespesaController@deletar");

$r->get('/despesa/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\DespesaController@excluir');




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




