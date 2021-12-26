<?php

function getCategoryParents()
{
    global $cn;
    $sql = "SELECT * From categories where parent_id IS NULL  and status = 'active'";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}


function createCategory($parent_id, $title, $description)
{
    global $cn;
    $title = sanitise($title);
    $description = sanitise($description);
    $parent_id = (!(int)$parent_id) ? null : (int)$parent_id;
    $slug = sluggable($title);
    $sql = "insert into categories (parent_id, title, slug, description) values (?,?,?,?);";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $parent_id);
    $result->bindValue(2, $title);
    $result->bindValue(3, $slug);
    $result->bindValue(4, $description);
    if ($result->execute()) {
        return true;
    }
    return false;
}

function getCategories()
{
    global $cn;
    $sql = "SELECT * From categories";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

function updateCategory($id, $parent_id, $title, $description): bool
{
    global $cn;
    $title = sanitise($title);
    $description = sanitise($description);
    $parent_id = (!(int)$parent_id) ? null : (int)$parent_id;
    $id = (int)$id;
    $slug = sluggable($title);
    $sql = "update categories set title = ?, description = ?, slug = ?, parent_id = ? where id = ?;";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $title);
    $result->bindValue(2, $description);
    $result->bindValue(3, $slug);
    $result->bindValue(4, $parent_id);
    $result->bindValue(5, $id);
    if ($result->execute()) {
        return true;
    }
    return false;
}
