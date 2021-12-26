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
