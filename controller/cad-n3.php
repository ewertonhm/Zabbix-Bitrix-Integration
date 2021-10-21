<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $n3 = new N3Accomplice();
    $n3->setNome($_POST['nome']);
    $n3->setBitrixId($_POST['bitrix']);
    $n3->save();
}
if(isset($_POST['editar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $n3 = N3AccompliceQuery::create()->findOneById($_POST['id']);
    $n3->setNome($_POST['nome']);
    $n3->setBitrixId($_POST['bitrix']);
    $n3->save();
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $n3 = N3AccompliceQuery::create()->findOneById( $_GET['delete']);
    echo('Colaborador='.$n3->getNome().', ID='.$n3->getId().', Sucessful Deleted');
    $n3->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de Colaboradores N3';

if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $n3 = N3AccompliceQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['nome'] = $n3->getNome();
    $vars['editar']['bitrix'] = $n3->getBitrixId();
    $vars['editar']['id'] = $n3->getId();
}

$colaboradores = N3AccompliceQuery::create()->orderById()->find();

$counter = 0;
foreach ($colaboradores as $n3){
    $vars['n3'][$counter]['id'] = $n3->getId();
    $vars['n3'][$counter]['nome'] = $n3->getNome();
    $vars['n3'][$counter]['bitrix'] = $n3->getBitrixId();
    $counter++;
}


$template = $twig->load('cad-n3.twig');

echo $template->render($vars);