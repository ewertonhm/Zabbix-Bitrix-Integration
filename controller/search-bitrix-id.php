<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

$vars = [];

if(isset($_GET['nome']) and $_GET['nome'] != '' and $_GET['nome'] != NULL){
    $results = \controller\Bitrix::user_search($_GET['nome'])['result'];
    foreach($results as $r){
        $vars['resultados'][$r['ID']]['id'] = $r['ID'];
        $vars['resultados'][$r['ID']]['nome'] = $r['NAME'];
        $vars['resultados'][$r['ID']]['segundo_nome'] = $r['SECOND_NAME'];
        $vars['resultados'][$r['ID']]['sobre_nome'] = $r['LAST_NAME'];
        $vars['resultados'][$r['ID']]['email'] = $r['EMAIL'];
        $vars['resultados'][$r['ID']]['cargo'] = $r['WORK_POSITION'];
    }
}



$template = $twig->load('search-bitrix-id.twig');

echo $template->render($vars);