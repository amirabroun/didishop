<?php
function createPhoto($name, $src)
{
    global $cn;
    $name = sanitise($name);
    $src = sanitise($src);
    $sql = "insert into photos (src, name) values (?,?);";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $src);
    $result->bindValue(2, $name);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}
