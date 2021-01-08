<?php

// sessio_start();
// $_SESSION['id'] = 1;
// $_SESSION['username'] = 'mac';
#the above session function goes in the db.php because session is used severally by files that use db so start once in db then include

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$table = 'users';
$admin_users = selectAll($table); //['admin' => 1]);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passConf = '';

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

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    $errors = userValidn($_POST);
    
    if (count($errors) === 0) {
        unset($_POST['passConf'], $_POST['register-btn'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if (isset($_POST['admin'])) {  //checkbox = admin
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin user created successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();           
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);               
            $user = selectOne($table, ['id' => $user_id]);
            // once acct is created (or there's a sign in) proceed to log user in using session
            loginUser($user);
            // created a reusable function [loginUser] that is called instead per refactoring
        }        

    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConf = $_POST['passConf'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = userValidn($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Admin user updated successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();           
        
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConf = $_POST['passConf'];
    }
}


if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin']; //== 1 ? 1 : 0; i choose to leave this out but it is the same thing
    //if admin prop. is 1 we give it 1 otherwise it's 0 so box is left unchecked instead.
    $email = $user['email'];
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

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Admin user deleted";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}