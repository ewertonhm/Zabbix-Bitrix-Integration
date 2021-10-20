<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['title'] != '' and $_POST['title'] != NULL){
    $task = new Task();
    $task->setUsuarioId('1');
    $task->setTitle($_POST['title']);
    $task->setDescript('');
    $task->setDeadline('1d');
    $task->setResponsibleId($_POST['responsible']);
    $task->setGroupId('523');
    $task->save();


}
if(isset($_POST['editar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){

}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){

}

$vars = [];

if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){

}

$colaboradores = ColaboradorQuery::create()->find();
foreach($colaboradores as $c){
    $vars['colaboradores'][$c->getId()]['nome'] = $c->getNome();
    $vars['colaboradores'][$c->getId()]['id'] = $c->getId();
}

$tasks = TaskQuery::create()->find();
foreach($tasks as $t){
    $vars['tasks'][$t->getId()]['title'] = $t->getTitle();
    $vars['tasks'][$t->getId()]['id'] = $t->getId();

    $responsible = ColaboradorQuery::create()->findOneById($t->getResponsibleId());

    $vars['tasks'][$t->getId()]['responsible'] = $responsible->getNome();
}


$template = $twig->load('cad-task.twig');

echo $template->render($vars);