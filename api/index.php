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
    $produtoDAO = new ProdutoDAO();
    $products = $produtoDAO->getActive();
    echo json_encode($products);
});
$app->get('/products/category/:categoryId', function ($categoryId) use($app) {
    $app->response()->header('Content-Type', 'application/json');
    $produtoDAO = new ProdutoDAO();
    //Listando produtos por categoria
    $products = $produtoDAO->getProductByCategory($categoryId);
    echo json_encode($products);
});

$app->post('/products/', function () use($app) {
    //Recuperando o valor do post
    $request = json_decode($app->request->getBody(), true);          
    $produtoService = new ProdutoService();
    $response =$produtoService->insertProduto($request);
    echo $response;
});

//Cadastro de categorias de produtos
$app->post('/category/', function () use($app) {
    //Recuperando o valor do post
    $categoriesProducts = json_decode($app->request->getBody(), true);
    //atribuição do valor para o objeto que vai ser persistido no banco.
    $response= CategoriaProdutoServices::InsertCategory($categoriesProducts);
    echo $response;
   
});

$app->get('/categories', function () use($app) {

    $app->response()->header('Content-Type', 'application/json');
    $categoriaProdutoDAO = new CategoriaProdutoDAO();
    $categories = $categoriaProdutoDAO->getAll();
    echo json_encode($categories);
});

$app->get('/statusProducts', function() use($app) {
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

$app->post('/users/login', function () use($app) {
    //Recuperando o valor do post
    $response = json_decode($app->request->getBody(), true);
    $jsonResponse = UsuarioServices::login($response);
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


$app->run();
