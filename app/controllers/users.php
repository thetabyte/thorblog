<?php

// sessio_start();
// $_SESSION['id'] = 1;
// $_SESSION['username'] = 'mac';
#the above session function goes in the db.php because session is used severally by files that use db so start once in db then include

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$errors = array();
$username = '';
$email = '';
$password = '';
$passConf = '';
$table = 'users';

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Log in successful';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');           
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();
}


if (isset($_POST['register-btn'])) {
    $errors = userValidn($_POST);
    
    if (count($errors) === 0) {
        unset($_POST['passConf'], $_POST['register-btn']);
        $_POST['admin'] = 0;

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        
       // once acct is created (or there's a sign in) proceed to log user in using session
      loginUser($user);
        // created a reusable function [loginUser] that is called instead per refactoring

    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConf = $_POST['passConf'];
    }
}

if (isset($_POST['login-btn'])) {
    $errors = userLoginValidn($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            //at this point user is logged in and redirected
            loginUser($user);
        } else {
           array_push($errors, 'username or password is incorrect');
        }
        
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}