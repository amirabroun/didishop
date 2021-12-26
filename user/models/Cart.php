<?php

function createCart($user_id, $type, $product_id, $price, $price_discounted) {
    try {
        global $cn;
        $sql = $cn->prepare("INSERT INTO carts (user_id, type, product_id, price, price_discounted) VALUES (?,?,?,?,?)");
        $sql->bindValue(1, $user_id);
        $sql->bindValue(2, $type);
        $sql->bindValue(3, $product_id);
        $sql->bindValue(4, $price);
        $sql->bindValue(5, $price_discounted);
        if ($sql->execute()) {
            return $cn->lastInsertId();
        }
        return false;
    } catch (Throwable $exception) {
        return false;
    }
}

function getCart($user_id, $type) {
    try {
        global $cn;
        $sql = $cn->prepare("SELECT carts.id cart_id, user_id, type, quantitty, carts.price cart_price, carts.price_discounted cart_price_discounted, p.* , 
       (SELECT JSON_ARRAYAGG(JSON_OBJECT('photo_src', p2.src, 'photo_name', p2.name, 'photo_sort', pp.sort)) from photo_product pp left join photos p2 on pp.photo_id = p2.id where p.id = pp.product_id and sort = 1) photo_product FROM carts 
        left join products p on carts.product_id = p.id
        where user_id=? and type =?");
        $sql->bindValue(1, $user_id);
        $sql->bindValue(2, $type);
        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    } catch (Throwable $exception) {
        return false;
    }
}

function changeQuantity($cart_id, $type) {
    try {
        $where = 'carts.quantitty + 1';
        $type_sql = 'increment';
        $set_decrement = '';
        if ($type === 'decrement') {
            $where = 'carts.quantitty - 1';
            $type_sql = 'decrement';
            $set_decrement = 'and carts.quantitty > 1';
        }
        global $cn;
        $sql = $cn->prepare("SET @type = '$type_sql';
                update carts
                set carts.quantitty = $where
                where carts.id =? $set_decrement and carts.product_id in 
                (IF((@type = 'increment'), (SELECT p.id FROM products p where p.id = carts.product_id and p.stock >= carts.quantitty + 1), carts.product_id));");
        $sql->bindValue(1, $cart_id);
        return $sql->execute();
    } catch (Throwable $exception) {
        return false;
    }
}