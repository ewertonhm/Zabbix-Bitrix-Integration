<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['senha']) and $_POST['senha'] != '' and $_POST['senha'] != NULL){
    $usuario = UsuarioQuery::create()->findOneById($_SESSION['id']);
    if(md5($_POST['senha']) == $usuario->getSenha()){
        $usuario->setSenha(md5($_POST['nova_senha']));
        $usuario->save();
        echo('Senha do usuário: '.$usuario->getEmail().' Alterada com sucesso.');
    } else {
        echo('Senha incorreta.');
    }

}

$usuario = UsuarioQuery::create()->findOneById($_SESSION['id']);
$vars['id'] = $usuario->getId();
$vars['email'] = $usuario->getEmail();


$template = $twig->load('edit-pass.twig');

echo $template->render($vars);