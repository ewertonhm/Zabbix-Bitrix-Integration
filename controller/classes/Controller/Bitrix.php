<?php

namespace controller;

class Bitrix
{
    public static function user_search($user_name)
    {
        $url = 'https://tarefas.redeunifique.com.br/rest/2831/3tdyou4ntffbl66s/user.search.json';
        $data = array('FIND' => $user_name);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        $result = json_decode($result,TRUE);

        return $result;
    }
    public static function get_user_id($user_name)
    {
        $array = Bitrix::user_search($user_name);
        $id = $array['result'][0]['ID'];
        return $id;
    }
    public static function create_task(
                                    $title,
                                    $description,
                                    $deadline,
                                    $groupid,
                                    $responsible,
                                    $creator,
                                    $observers = [],
                                    $participants = [],
                                    $tags = [])
    {
        $url = 'https://tarefas.redeunifique.com.br/rest/2831/m4wfoosvgw9srhzd/task.item.add.json';
        $data = array(
            'TITLE' => $title,
            'DESCRIPTION' => $description,
            'DEADLINE' => $deadline,
            'GROUP_ID' => $groupid,
            'RESPONSIBLE_ID' => $responsible,
            'CREATED_BY' => $creator,
            'ACCOMPLICES' => $participants,
            'AUDITORS' => $observers,
            'TAGS' => $tags
        );

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query([$data])
            )
        );
        $context  = stream_context_create($options);

        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        $result = json_decode($result,TRUE);

        // #task id
        return $result['result'];
    }
    // não está funcionando
    public static function delete_task($task_id)
    {
        $url = 'https://tarefas.redeunifique.com.br/rest/2831/e3fcja2c5y9n2bg0/task.item.delete.json';
        $data = array('taskId' => $task_id);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        $result = json_decode($result,TRUE);

        return $result;
    }
}