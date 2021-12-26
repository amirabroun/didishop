<?php
function getUsers()
{
    global $cn;
    $sql = "SELECT * From users";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

function doLogin($mobile, $password)
{
    global $cn;
    $mobile = sanitise($mobile);
    $sql = "SELECT * From users where mobile=? LIMIT 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $mobile);
    $result->execute();
    if ($result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_OBJ);
        if (bcrypt($password, $user->password)) {
            return $user;
        }
        return false;
    }
    return false;
}

function doLoginWithOtp($mobile)
{
    global $cn;
    $mobile = sanitise($mobile);
    $sql = "SELECT * From users where mobile=? LIMIT 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $mobile);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_OBJ);
    }
    return false;
}

function createUser($first_name, $last_name, $cellphone, $password, $gender)
{
    global $cn;
    $first_name = sanitise($first_name);
    $last_name = sanitise($last_name);
    $cellphone = sanitise($cellphone);
    $password = sanitise($password);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = $cn->prepare("INSERT INTO users (first_name, last_name, mobile, password) VALUES (? ,?, ?, ?)");
    $sql->bindValue(1, $first_name);
    $sql->bindValue(2, $last_name);
    $sql->bindValue(3, $cellphone);
    $sql->bindValue(4, $password);
    if ($sql->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function checkThereIsUser($mobile)
{
    global $cn;
    $sql = "SELECT * FROM users WHERE mobile = ?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $mobile);
    $result->execute();
    if ($result->rowCount() > 0) {
        return true;
    }
    return false;
}
