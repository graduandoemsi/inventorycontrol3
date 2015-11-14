<?php
require 'vendor/autoload.php';
require_once ('..\dao\conexaoBanco.php');
require_once '..\dao\CategoriaProdutoDAO.php';
require_once '..\dao\ProdutoDAO.php';
require_once '..\dao\StatusProdutoDAO.php';
require_once '..\dao\SaidaProdutoDAO.php';
require_once '..\dao\EntradaProdutoDAO.php';
require_once ('..\services\usuarioservices.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$app = new \Slim\Slim();

$app->get('/products',  function () use($app){
     $app->response()->header('Content-Type', 'application/json');
     $produtoDAO = new ProdutoDAO();
     $products = $produtoDAO->getActive();
     echo json_encode($products);

});
$app->get('/products/category/:categoryId',  function ($categoryId) use($app){
     $app->response()->header('Content-Type', 'application/json');
     $produtoDAO = new ProdutoDAO();
     //Listando produtos por categoria
     $products = $produtoDAO->getProductByCategory($categoryId);
     echo json_encode($products);

});

$app->post('/products/',  function () use($app){
  //Recuperando o valor do post
 $products =json_decode($app->request->getBody(), true);
 //atribuição do valor para o objeto que vai ser persistido no banco.
 
});

//Cadastro de categorias de produtos
$app->post('/category/',  function () use($app){
  //Recuperando o valor do post
 $categoriesProducts =json_decode($app->request->getBody(), true);
 //atribuição do valor para o objeto que vai ser persistido no banco.
 $categoriaProduto = new CategoriaProduto();
 $categoriaProduto->setDescricao($categoriesProducts["descricao"]);
 $categoriaProdutoDAO = new CategoriaProdutoDAO();
 $categoriaProdutoDAO->insert($categoriaProduto);

});

$app->get('/categories',  function () use($app){
    
    $app->response()->header('Content-Type', 'application/json');
    $categoriaProdutoDAO = new CategoriaProdutoDAO();
    $categories = $categoriaProdutoDAO->getAll();
    echo json_encode($categories);

});

$app->get('/statusProducts',  function() use($app){
    $app->response()->header('Content-Type', 'application/json');
    $statusProdutoDAO = new StatusProdutoDAO();
    $status = $statusProdutoDAO->getAll();
    echo json_encode($status);
    
});

$app->post('/outPutProducts/', function() use($app){
    $app->response()->header('Content-Type', 'application/json');
    $outProducts =json_decode($app->request->getBody(), true);
    $saidaProduto = new SaidaProduto();
    $saidaProduto->setId_produto($outProducts["idProduto"]);
    $saidaProduto->setQuantidade($outProducts["quantidade"]);
    $saidaProduto->setData($outProducts["data"]);
    $saidaProdutoDAO = new SaidaProdutoDAO();
    $saidaProdutoDAO->insert($saidaProduto);
    
});

$app->post('/inputProducts/', function() use($app){
    $app->response()->header('Content-Type', 'application/json');
    $inputProducts =json_decode($app->request->getBody(), true);
    $entradaProduto = new EntradaProduto();
    $entradaProduto->setId_produto($inputProducts["idProduto"]);
    $entradaProduto->setQuantidade($inputProducts["quantidade"]);
    $entradaProduto->setData($inputProducts["data"]);
    $entradaProdutoDAO = new EntradaProdutoDAO();
    $entradaProdutoDAO->insert($entradaProduto);
    
});

$app->post('/users/',  function () use($app){
  //Recuperando o valor do post
 $response =json_decode($app->request->getBody(), true);
 $jsonResponse =UsuarioServices::login($response);
 $app->response()->header('Content-Type', 'application/json');
 echo $jsonResponse;
 
 
});



//categorias


$app->run();