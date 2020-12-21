<?php 

session_start();
require('connect.php');

function dd($value) //used to see what occurs at exe
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values); 
    $stmt->execute(); 
    return $stmt;
    
}

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql =  $sql . " WHERE $key=?";
            } else {
                $sql =  $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql =  $sql . " WHERE $key=?";
        } else {
            $sql =  $sql . " AND $key=?";
        }
        $i++;
    }
    
    //$sql = "SELECT * FROM users WHERE admin=0 AND username=sassy LIMIT 1"
    //limit 1 stops the query from goig through entire db after the result is found
    
    $sql = $sql . " LIMIT 1";
    
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
    
}


//Create fctn

function create($table, $data)
{
    global $conn;
    //$sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
    //$ql = "INSERT INTO users (username, admin, email, password) VALUES (?, ?, ?, ?)"
    $sql = "INSERT INTO $table SET";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql =  $sql . " $key=?";
        } else {
            $sql =  $sql . ", $key=?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}


function update($table, $id, $data)
{
    global $conn;
    //$sql = "UPDATE $table SET username=?, admin=?, email=?, password=? WHERE id=?"
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql =  $sql . " $key=?";
        } else {
            $sql =  $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

// $data = [
//     'username' => 'Sasha fierce',
//     'admin' => 1,
//     'email' => 'fierce@sas.com',
//     'password' => 'ff'
// ];

