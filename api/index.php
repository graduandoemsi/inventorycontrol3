<?php

require 'vendor/autoload.php';
require_once ('../dao/conexaoBanco.php');

require_once ('../Services/ProdutoService.php');
require_once ('../dao/StatusProdutoDAO.php');
require_once ('../Services/SaidaProdutoService.php');
require_once '../dao/EntradaProdutoDAO.php';
require_once ('../Services/CategoriaProdutoServices.php');
require_once ('../Services/UsuarioServices.php');
require_once ('../Services/EstoqueServices.php');
require_once ('../Services/EntradaProdutoService.php');
require_once ('../Services/RelatorioServices.php');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$app = new \Slim\Slim();

$app->get('/products', function () use($app) {
    $app->response()->header('Content-Type', 'application/json');
    $response = ProdutoService::getActiveProducts();
    echo $response;
});
$app->get('/products/category/:categoryId', function ($categoryId) use($app) {
    $app->response()->header('Content-Type', 'application/json');
    $response = ProdutoService::getProductsByCategory($categoryId);
    echo $response;
});

$app->post('/products/', function () use($app) {
    //Recuperando o valor do post
    $request = json_decode($app->request->getBody(), true);
    $produtoService = new ProdutoService();
    $response = $produtoService->insertProduto($request);
    echo $response;
});

//Cadastro de categorias de produtos
$app->post('/category/', function () use($app) {
    //Recuperando o valor do post
    $categoriesProducts = json_decode($app->request->getBody(), true);
    //atribuição do valor para o objeto que vai ser persistido no banco.
    $response = CategoriaProdutoServices::InsertCategory($categoriesProducts);
    echo $response;
});

$app->get('/categories', function () use($app) {
    //Retorna categorias
    $app->response()->header('Content-Type', 'application/json');
    $response = CategoriaProdutoServices::getCategories();
    echo $response;
});
$app->get('/categories/user', function () use($app) {

    $app->response()->header('Content-Type', 'application/json');
    $response = UsuarioServices::getCategoryUser();
    echo $response;
});


$app->get('/statusProducts', function() use($app) {
    //Retorna a lista de status de produtos
    $app->response()->header('Content-Type', 'application/json');
    $statusProdutoDAO = new StatusProdutoDAO();
    $status = $statusProdutoDAO->getAll();
    echo json_encode($status);
});

$app->post('/outPutProducts/', function() use($app) {
    $app->response()->header('Content-Type', 'application/json');
    $outProducts = json_decode($app->request->getBody(), true);
    $response = SaidaProdutoService::InsertOut($outProducts);
    echo $response;
});

$app->post('/inputProducts/', function() use($app) {
    $app->response()->header('Content-Type', 'application/json');
    $inputProducts = json_decode($app->request->getBody(), true);
    $entradaProdutoService = new EntradaProdutoService();
    $response = $entradaProdutoService->insert($inputProducts);

    echo $response;
});



$app->post('/users/register/', function () use($app) {
    //Recuperando o valor do post
    $response = json_decode($app->request->getBody(), true);
    $jsonResponse = UsuarioServices::register($response);
    $app->response()->header('Content-Type', 'application/json');
   
    echo $jsonResponse;
});


//estoque

$app->get('/inventories', function () use($app) {

    $app->response()->header('Content-Type', 'application/json');
    $estoqueServices = new EstoqueServices();
    $estoque = $estoqueServices->getEstoque();

    echo $estoque;
});

//relatorios

$app->get('/report/minimuminventory', function () use($app) {

    $app->response()->header('Content-Type', 'application/json');
    $relatorioServices = new RelatorioServices();
    $relatorio = $relatorioServices->get();

    echo $relatorio;
});

$app->delete('/users/remove/:id', function ($id) use($app) {

    $app->response()->header('Content-Type', 'application/text'); 
    
    
    if (UsuarioServices::remove($id)>0) {
       echo "Usuário removido com sucesso!";
       
    } else {
         $app->response->setStatus('404');
       echo "Não foi possível concluir esta ação!";
    }
});

$app->get('/users', function () use($app) {
    //Retorna categorias
    $app->response()->header('Content-Type', 'application/json');
    $response = UsuarioServices::getUsers();
    echo $response;
});

$app->post('/users/login/', function () use($app) {
    //Recuperando o valor do post
    $response = json_decode($app->request->getBody(), true);
    $jsonResponse = UsuarioServices::login($response);
    $app->response()->header('Content-Type', 'application/json');

    echo $jsonResponse;
});

$app->run();
