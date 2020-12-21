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

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser){
        array_push($errors, 'Email already exists');
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