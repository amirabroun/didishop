<?php
function getBrands()
{
    global $cn;
    $sql = "SELECT * From brands where status = 'active'";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}
