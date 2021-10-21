<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

// CADASTRAR
if(isset($_POST['cadastrar']) and $_POST['title'] != '' and $_POST['title'] != NULL){
    $task = new Task();
    $task->setTitle($_POST['title']);
    $task->setResponsibleId($_POST['responsible']);
    $task->setUnidadeId($_POST['unidade']);
    $task->setGroupId('523');
    $task->save();

    if(isset($_POST['auditor']) and count($_POST['auditor']) > 0){
        foreach($_POST['auditor'] as $auditor){
            if($auditor != '' and $auditor != 0){
                $a = new TaskAuditor();
                $a->setTaskId($task->getId());
                $a->setAuditorId($auditor);
                $a->save();
            }
        }
    
    }
    if(isset($_POST['accomplice']) and count($_POST['accomplice']) > 0){
        foreach($_POST['accomplice'] as $accomplice){
            if($accomplice != '' and $accomplice != 0){
                $a = new TaskAccomplice();
                $a->setTaskId($task->getId());
                $a->setAccompliceId($accomplice);
                $a->save();
            }
        }
    }
}
// EDITAR 
if(isset($_POST['editar']) and $_POST['title'] != '' and $_POST['title'] != NULL){
    dump($_POST);
    $task = TaskQuery::create()->findOneById($_POST['id']);

    $taskAuditors = TaskAuditorQuery::create()->findByTaskId($task->getId());
    foreach($taskAuditors as $t){
        $t->delete();
    }
    $taskAccomplices = TaskAccompliceQuery::create()->findByTaskId($task->getId());
    foreach($taskAccomplices as $t){
        $t->delete();
    }

    $task->setTitle($_POST['title']);
    $task->setResponsibleId($_POST['responsible']);
    $task->setUnidadeId($_POST['unidade']);
    $task->save();

    if(isset($_POST['auditor']) and count($_POST['auditor']) > 0){
        foreach($_POST['auditor'] as $auditor){
            if($auditor != '' and $auditor != 0){
                $a = new TaskAuditor();
                $a->setTaskId($task->getId());
                $a->setAuditorId($auditor);
                $a->save();
            }
        }
    
    }
    if(isset($_POST['accomplice']) and count($_POST['accomplice']) > 0){
        foreach($_POST['accomplice'] as $accomplice){
            if($accomplice != '' and $accomplice != 0){
                $a = new TaskAccomplice();
                $a->setTaskId($task->getId());
                $a->setAccompliceId($accomplice);
                $a->save();
            }
        }
    }
}

// DELETAR
if(isset($_GET['delete']) and $_GET['delete'] != '' and $_GET['delete'] != NULL){
    $task = TaskQuery::create()->findOneById($_GET['delete']);
    $taskAuditors = TaskAuditorQuery::create()->findByTaskId($task->getId());
    $taskAccomplices = TaskAccompliceQuery::create()->findByTaskId($task->getId());

    foreach($taskAuditors as $t){
        $t->delete();
    }
    foreach($taskAccomplices as $t){
        $t->delete();
    }
    echo('Task='.$task->getTitle().', ID='.$task->getId().', Sucessful Deleted');
    $task->delete();
}

$vars = [];
$vars['page_name'] = 'Cadastro de Modelos de Task';


// DADOS EXIBIÇÃO EDITAR
if(isset($_GET['edite']) and $_GET['edite'] != '' and $_GET['edite'] != NULL){
    $task = TaskQuery::create()->findOneById($_GET['edite']);
    $vars['editar']['id'] = $task->getId();
    $vars['editar']['task']['nome'] = $task->getTitle();
    $vars['editar']['task']['responsible'] = $task->getResponsibleId();

    $accomplices = TaskAccompliceQuery::create()->findByTaskId($task->getId());
    foreach ($accomplices as $accomplice){
        $vars['editar']['accomplices'][$accomplice->getId()]['id'] = $accomplice->getAccompliceId();
    }


    $auditors = TaskAuditorQuery::create()->findByTaskId($task->getId());
    foreach ($auditors as $auditor){
        $vars['editar']['auditors'][$auditor->getId()]['id'] = $auditor->getAuditorId();
    }

    $unidade = ColaboradorUnidadeQuery::create()->findOneByColaboradorId($task->getResponsibleId());
    $vars['editar']['unidade']['id'] = $unidade->getUnidadeId();
}

// DADOS EXIBIÇÃO CADASTRAR
$colaboradores = ColaboradorQuery::create()->find();
foreach($colaboradores as $c){
    $vars['colaboradores'][$c->getId()]['nome'] = $c->getNome();
    $vars['colaboradores'][$c->getId()]['id'] = $c->getId();

    $unidade = ColaboradorUnidadeQuery::create()->findOneByColaboradorId($c->getId());
    $vars['colaboradores'][$c->getId()]['unidade'] = $unidade->getUnidadeId();
}

$tasks = TaskQuery::create()->find();
foreach($tasks as $t){
    $vars['tasks'][$t->getId()]['title'] = $t->getTitle();
    $vars['tasks'][$t->getId()]['id'] = $t->getId();

    $responsible = ColaboradorQuery::create()->findOneById($t->getResponsibleId());

    $vars['tasks'][$t->getId()]['responsible'] = $responsible->getNome();
}

$unidades = UnidadeQuery::create()->find();
foreach($unidades as $u){
    $vars['unidades'][$u->getId()]['id'] = $u->getId();
    $vars['unidades'][$u->getId()]['nome'] = $u->getNome();
    $vars['unidades'][$u->getId()]['sigla'] = $u->getSigla();
}


$template = $twig->load('cad-task.twig');

echo $template->render($vars);