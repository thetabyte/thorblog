<?php

function postValidn($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'A title is required');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Please put your thoughts in the body');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Please select a topic');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost){
        array_push($errors, 'A post with that title already exists');
    }

    return $errors;
}