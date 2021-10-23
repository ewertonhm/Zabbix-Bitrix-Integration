<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST['cadastrar'])){
    $key = new ApiKeys();
    $key->setApiKey(md5(generateRandomString()));
    $key->save();
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $key = ApiKeysQuery::create()->findOneById( $_GET['delete']);
    echo('Chave='.$key->getNome().', ID='.$key->getId().', Sucessful Deleted');
    $key->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de API keys';

$keys = ApiKeysQuery::create()->orderById()->find();

$counter = 0;
foreach ($keys as $key){
    $vars['keys'][$counter]['id'] = $key->getId();
    $vars['keys'][$counter]['key'] = $key->getApiKey();
    $counter++;
}


$template = $twig->load('cad-apikey.twig');

echo $template->render($vars);