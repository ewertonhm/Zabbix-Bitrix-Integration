<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

if(isset($_POST['cadastrar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $colaborador = new Colaborador();
    $colaborador->setNome($_POST['nome']);
    $colaborador->setBitrixId($_POST['bitrix']);
    $colaborador->save();

    if(isset($_POST['unidade']) and $_POST['unidade'] != ''){
        foreach($_POST['unidade'] as $unidade_id){
            $unidade = UnidadeQuery::create()->findOneById($unidade_id);
    
            $colaborador_unidade = new ColaboradorUnidade();
            $colaborador_unidade->setColaboradorId($colaborador->getId());
            $colaborador_unidade->setUnidadeId($unidade->getId());
    
            $colaborador_unidade->save();
        }
    }

    if(isset($_POST['tecnologia']) and $_POST['tecnologia'] != ''){
        foreach($_POST['tecnologia'] as $tecnologia_id){
            $tecnologia = TecnologiaQuery::create()->findOneById($tecnologia_id);

            $colaborador_tecnologia = new ColaboradorTecnologia();
            $colaborador_tecnologia->setColaboradorId($colaborador->getId());
            $colaborador_tecnologia->setTecnologiaId($tecnologia->getId());
            
            $colaborador_tecnologia->save();
        }
    }
    
}
if(isset($_POST['editar']) and $_POST['nome'] != '' and $_POST['nome'] != NULL){
    $colaborador = ColaboradorQuery::create()->findOneById($_POST['id']);
    $colaborador->setNome($_POST['nome']);
    $colaborador->setBitrixId($_POST['bitrix']);
    $colaborador->save();

    $colaborador_unidades = ColaboradorUnidadeQuery::create()->findByColaboradorId($colaborador->getId());
    foreach($colaborador_unidades as $c){
        $c->delete();
    }
    $colaborador_tecnologia = ColaboradorTecnologiaQuery::create()->findByColaboradorId($colaborador->getId());
    foreach($colaborador_tecnologia as $c){
        $c->delete();
    }
    if(isset($_POST['unidade']) and $_POST['unidade'] != ''){
        foreach($_POST['unidade'] as $unidade_id){
            $unidade = UnidadeQuery::create()->findOneById($unidade_id);
    
            $colaborador_unidade = new ColaboradorUnidade();
            $colaborador_unidade->setColaboradorId($colaborador->getId());
            $colaborador_unidade->setUnidadeId($unidade->getId());
    
            $colaborador_unidade->save();
        }
    }

    if(isset($_POST['tecnologia']) and $_POST['tecnologia'] != ''){
        foreach($_POST['tecnologia'] as $tecnologia_id){
            $tecnologia = TecnologiaQuery::create()->findOneById($tecnologia_id);

            $colaborador_tecnologia = new ColaboradorTecnologia();
            $colaborador_tecnologia->setColaboradorId($colaborador->getId());
            $colaborador_tecnologia->setTecnologiaId($tecnologia->getId());
            
            $colaborador_tecnologia->save();
        }
    }
}

if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $colaborador = ColaboradorQuery::create()->findOneById( $_GET['delete']);

    $colaborador_unidades = ColaboradorUnidadeQuery::create()->findByColaboradorId($colaborador->getId());
    foreach($colaborador_unidades as $c){
        $c->delete();
    }
    $colaborador_tecnologia = ColaboradorTecnologiaQuery::create()->findByColaboradorId($colaborador->getId());
    foreach($colaborador_tecnologia as $c){
        $c->delete();
    }

    echo('Colaborador='.$colaborador->getNome().', ID='.$colaborador->getId().', Sucessful Deleted');
    $colaborador->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de Responsáveis e Participantes';

if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $colaborador = ColaboradorQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['nome'] = $colaborador->getNome();
    $vars['editar']['bitrix'] = $colaborador->getBitrixId();
    $vars['editar']['id'] = $colaborador->getId();

    $unidades = ColaboradorUnidadeQuery::create()->findByColaboradorId($colaborador->getId());
    $tecnologias = ColaboradorTecnologiaQuery::create()->findByColaboradorId($colaborador->getId());

    foreach($unidades as $u){
        $unidade = UnidadeQuery::create()->findOneById($u->getUnidadeId());

        $vars['editar']['unidades'][$unidade->getId()]['id'] = $unidade->getId();
        $vars['editar']['unidades'][$unidade->getId()]['nome'] = $unidade->getNome();
        $vars['editar']['unidades'][$unidade->getId()]['sigla'] = $unidade->getSigla();
    }

    foreach($tecnologias as $t){
        $tecnologia = TecnologiaQuery::create()->findOneById($t->getTecnologiaId());

        $vars['editar']['tecnologias'][$tecnologia->getId()]['id'] = $tecnologia->getId();
        $vars['editar']['tecnologias'][$tecnologia->getId()]['tecnologia'] = $tecnologia->getTecnologia();
    }
}

$colaboradores = ColaboradorQuery::create()->orderByNome()->find();
$unidades = UnidadeQuery::create()->orderByNome()->find();
$tecnologias = TecnologiaQuery::create()->orderById()->find();

$counter = 0;
foreach ($colaboradores as $colaborador){
    $vars['colaboradores'][$counter]['id'] = $colaborador->getId();
    $vars['colaboradores'][$counter]['nome'] = $colaborador->getNome();
    $vars['colaboradores'][$counter]['bitrix'] = $colaborador->getBitrixId();

    $counter++;
}
$counter = 0;
foreach ($unidades as $unidade){
    $vars['unidades'][$counter]['id'] = $unidade->getId();
    $vars['unidades'][$counter]['nome'] = $unidade->getNome();
    $vars['unidades'][$counter]['sigla'] = $unidade->getSigla();
    $counter++;
}
$counter = 0;
foreach ($tecnologias as $tecnologia){
    $vars['tecnologias'][$counter]['id'] = $tecnologia->getId();
    $vars['tecnologias'][$counter]['tecnologia'] = $tecnologia->getTecnologia();
    $counter++;
}


$template = $twig->load('cad-colaborador.twig');

echo $template->render($vars);