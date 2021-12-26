<?php

function getCategoryParents() {
    global $cn;
    $sql = "SELECT * From categories where parent_id IS NULL and status = 'active'";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

function getCategoryChilderen($child_id) {
    global $cn;
    $child_id = (int)$child_id;
    $sql = "SELECT * From categories where parent_id =?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $child_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

/*function getCategories() {
    global $cn;
    $sql = "SELECT * From categories where status = 'active'";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}*/
