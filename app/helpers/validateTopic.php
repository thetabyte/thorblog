<?php

function topicValidn($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Please specify topic name');
    }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic){
        array_push($errors, 'Topic already exists');
    }

    return $errors;
}
// cant update a record because error is returned and i have to change the entire record to update when i want to capitalize just a character for the same record.