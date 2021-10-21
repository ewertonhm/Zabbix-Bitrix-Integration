<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha(md5($_POST['senha']));
    $usuario->setAdmin('1');
    $usuario->save();
}
if(isset($_POST['editar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $usuario = UsuarioQuery::create()->findOneById($_POST['id']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->save();
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $usuario = UsuarioQuery::create()->findOneById( $_GET['delete']);
    echo('Usuario='.$usuario->getNome().', ID='.$usuario->getId().', Sucessful Deleted');
    $usuario->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de Usuários';


if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $usuario = UsuarioQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['nome'] = $usuario->getNome();
    $vars['editar']['email'] = $usuario->getEmail();
    $vars['editar']['id'] = $usuario->getId();
}

$usuarios = UsuarioQuery::create()->orderById()->find();

$counter = 0;
foreach ($usuarios as $usuario){
    $vars['usuarios'][$counter]['id'] = $usuario->getId();
    $vars['usuarios'][$counter]['nome'] = $usuario->getNome();
    $vars['usuarios'][$counter]['email'] = $usuario->getEmail();

    $counter++;
}


$template = $twig->load('cad-usuario.twig');

echo $template->render($vars);