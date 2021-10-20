<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['cadastrar'] != '' and $_POST['cadastrar'] != NULL){
    $tecnologia = new Tecnologia();
    $tecnologia->setTecnologia($_POST['cadastrar']);
    $tecnologia->save();
}
if(isset($_POST['editar']) and $_POST['editar'] != '' and $_POST['editar'] != NULL){
    $tecnologia = TecnologiaQuery::create()->findOneById($_POST['id']);
    $tecnologia->setTecnologia($_POST['editar']);
    $tecnologia->save();
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $tecnologia = TecnologiaQuery::create()->findOneById($_GET['delete']);
    echo('Tecnologia='.$tecnologia->getTecnologia().', ID='.$tecnologia->getId().', Sucessful Deleted');
    $tecnologia->delete();
}

$vars = [];

if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $tecnologia = TecnologiaQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['tecnologia'] = $tecnologia->getTecnologia();
    $vars['editar']['id'] = $tecnologia->getId();
}

$tecnologias = TecnologiaQuery::create()->orderById()->find();

$counter = 0;
foreach ($tecnologias as $tecnologia){
    $vars['tecnologias'][$counter]['id'] = $tecnologia->getId();
    $vars['tecnologias'][$counter]['tecnologia'] = $tecnologia->getTecnologia();
    $counter++;
}


$template = $twig->load('cad-tecnologia.twig');

echo $template->render($vars);