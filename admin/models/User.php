<?php

function getUsers()
{
    global $cn;
    $sql = "SELECT * From users";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}
