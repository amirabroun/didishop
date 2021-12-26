<?php

function getBrands()
{
    global $cn;
    $sql = "SELECT * From brands";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

function createBrand($title, $description): bool
{
    global $cn;
    $title = sanitise($title);
    $description = sanitise($description);
    $sql = "insert into brands(title, description) values (?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $description);
    if ($result->execute()) {
        return true;
    }
    return false;
}

function updateBrand($id, $title, $description): bool
{
    global $cn;
    $title = sanitise($title);
    $description = sanitise($description);
    $id = (int)$id;
    $sql = "update brands set title=?, description=? where id=$id";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $description);
    if ($result->execute()) {
        return true;
    }
    return false;
}
