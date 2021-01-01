<?php

function userValidn($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    if ($user['passConf'] !== $user['password']) {
        array_push($errors, 'Password mismatch');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser){
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser){
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'A user with that email already exists');        
        }
        
        if (isset($user['add-user'])) {
            array_push($errors, 'A user with that email already exists');
        }
    }

    return $errors;
}

function userLoginValidn($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    return $errors;
}