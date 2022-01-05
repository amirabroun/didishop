<?php

function doLogin($username, $password)
{
    global $cn;
    $sql = "SELECT * From admins where username = ? LIMIT 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $username);
    $result->execute();
    if ($result->rowCount() > 0) {
        $admin = $result->fetch(PDO::FETCH_OBJ);
        if (bcrypt($password, $admin->password)) {
            return $admin;
        }
        return false;
    }
    return false;
}


function getAdmin($id)
{
    global $cn;
    $sql = "SELECT * From admins where id = ? LIMIT 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_OBJ);
    }
    return false;

}

