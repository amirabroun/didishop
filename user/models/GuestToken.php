<?php

function createGuestToken($secret, $token) {
    global $cn;
    $sql = $cn->prepare("INSERT INTO guest_tokens (secret, token) VALUES (?,?)");
    $sql->bindValue(1, $secret);
    $sql->bindValue(2, $token);
    if ($sql->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function getGuestToken($secret, $token) {
    global $cn;
    $sql = $cn->prepare("SELECT * FROM guest_tokens gt where secret=? and token =?");
    $sql->bindValue(1, $secret);
    $sql->bindValue(2, $token);
    if ($sql->execute()) {
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    return false;
}