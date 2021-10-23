<?php

namespace controller;

require_once 'config.php';

use TaskQuery;
use ColaboradorQuery;
use TaskAccompliceQuery;
use TaskAuditorQuery;
use N3AccompliceQuery;
use controller\Bitrix;
use Carbon\Carbon;

class Integration
{
    public function createTask($params){
        $model = TaskQuery::create()->findOneById($params['model_id']);

        // TITLE //
        $title = $params['title'];
        
        // DESCRIPTION //
        $description_txt = $params['description'];

        $alarms = [];
        $counter = 0;
        while($counter < count($params['alarms_time'])){
            $alarms[$counter]['time'] = $params['alarms_time'][$counter];
            $alarms[$counter]['severity'] = $params['alarms_severity'][$counter];
            $alarms[$counter]['host'] = $params['alarms_host'][$counter];
            $alarms[$counter]['problem'] = $params['alarms_problem'][$counter];
            $counter++;
        }

        $description = $this->converAlarmsToTable($description_txt, $alarms);

        // DEADLINE //
        $deadline = Carbon::create()->today()->setTimezone('America/Sao_Paulo')->hour('18')->addWeekDay()->format("c");

        // GROUP_ID //
        $groupid = $model->getGroupId();

        // RESPONSIBLE_ID //
        $r = ColaboradorQuery::create()->findOneById($model->getResponsibleId());
        $responsible = $r->getBitrixId();

        // CREATED_BY //
        $creator = $params['creator_id'];
        
        // ACCOMPLICES (Participantes) //
        $participants = [];

        $accomplices = TaskAccompliceQuery::create()->findByTaskId($model->getId());

        $counter = 0;
        foreach($accomplices as $a){
            $c = ColaboradorQuery::create()->findOneById($a->getAccompliceId());
            $participants[$counter] = $c->getBitrixId();
            $counter++;
        }

        // AUDITORS (Observadores) //
        $observers = [];
        
        $auditors = TaskAuditorQuery::create()->findByTaskId($model->getId());

        $counter = 0;
        foreach($accomplices as $a){
            $c = ColaboradorQuery::create()->findOneById($a->getAccompliceId());
            $observers[$counter] = $c->getBitrixId();
            $counter++;
        }
        $monitoramento = N3AccompliceQuery::create()->find();
        foreach($monitoramento as $n3){
            $observers[$counter] = $n3->getBitrixId();
        }

        // TAGS (Opcional) //
        $tags = [];

        // CREATE_TASK //
        $id = Bitrix::create_task(
            $title,
            $description,
            $deadline,
            $groupid,
            $responsible,
            $creator,
            $observers,
            $participants,
            $tags
        );
        // RETURN_TASK_ID //
        return $id;
    }

    public function converAlarmsToTable($description,$alarms = []){
        $string = $description.'[TABLE]';
        foreach($alarms as $alarm){
            $string = $string.'[TR]';
            $string = $string.'[TD]'.$alarm['time'].'[/TD]';
            $string = $string.'[TD]'.$alarm['severity'].'[/TD]';
            $string = $string.'[TD]'.$alarm['host'].'[/TD]';
            $string = $string.'[TD]'.$alarm['problem'].'[/TD]';
            $string = $string.'[/TR]';
        }
        $string = $string.'[/TABLE]';
        return $string;
    }

    public static function getTaskModels(){
        $taskModel = [];
        $model = TaskQuery::create()->find();
        $counter = 0;
        foreach($model as $m){
            $taskModel[$counter]['id'] = $m->getId();
            $taskModel[$counter]['nome'] = $m->getTitle();
            $counter++;
        }
        return $taskModel;
    }
}
