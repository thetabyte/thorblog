<?php

function topicValidn($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Please specify topic name');
    }

    // $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    // if ($existingTopic){
    //     array_push($errors, 'Topic already exists');
    // }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic){
        if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'A topic with that name already exists');        
        }
        
        if (isset($topic['add-topic'])) {
            array_push($errors, 'A topic with that name already exists');
        }
    }

    return $errors;
}
// cant update a record because error is returned and i have to change the entire record to update when i want to capitalize just a character for the same record.
//resolved