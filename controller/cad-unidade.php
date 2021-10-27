<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $unidade = new Unidade();
    $unidade->setNome($_POST['nome']);
    $unidade->setSigla($_POST['sigla']);
    $unidade->save();
}

if(isset($_POST['editar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $unidade = UnidadeQuery::create()->findOneById($_POST['id']);
    $unidade->setNome($_POST['nome']);
    $unidade->setSigla($_POST['sigla']);
    $unidade->save();
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $unidade = UnidadeQuery::create()->findOneById( $_GET['delete']);
    echo('Unidade='.$unidade->getNome().', ID='.$unidade->getId().', Sucessful Deleted');
    $unidade->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de Unidades';


if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $unidade = UnidadeQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['nome'] = $unidade->getNome();
    $vars['editar']['sigla'] = $unidade->getSigla();
    $vars['editar']['id'] = $unidade->getId();
}

$unidades = UnidadeQuery::create()->orderByNome()->find();

$counter = 0;
foreach ($unidades as $unidade){
    $vars['unidades'][$counter]['id'] = $unidade->getId();
    $vars['unidades'][$counter]['nome'] = $unidade->getNome();
    $vars['unidades'][$counter]['sigla'] = $unidade->getSigla();
    $counter++;
}


$template = $twig->load('cad-unidade.twig');

echo $template->render($vars);