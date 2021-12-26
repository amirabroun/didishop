<?php
function getProducts()
{
    global $cn;
    $sql = "SELECT products.*, brands.title as brand_title From `products`
                left join brands on products.brand_id = brands.id";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

function getProduct($product)
{
    global $cn;
    if (validateProductCode($product)) {
        $where = 'products.tracking_code = ?';
    } else {
        $where = 'products.id = ?';
        $product = (int)$product;
    }
    $sql = "SELECT * From `products` where $where";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $product);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_OBJ);
    }
    return false;
}

function getLatestProduct($limit = 500)
{
    global $cn;
    $sql = "SELECT p.*,
        (SELECT JSON_ARRAYAGG(JSON_OBJECT('photo_src', p2.src, 'photo_name', p2.name, 'photo_sort', pp.sort)) from photo_product pp left join photos p2 on pp.photo_id = p2.id where p.id = pp.product_id order by pp.sort DESC) as photos,
        (SELECT JSON_ARRAYAGG(JSON_OBJECT('category_title', c.title, 'category_slug', c.slug, 'parent_title', c2.title)) from category_product cp 
            left join categories c on cp.category_id = c.id
            left join categories c2 on c.parent_id = c2.id
        where p.id = cp.product_id and c.status = 'active') as categories
        From products p order by p.created_at DESC";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
}

function getProductDetails($slug)
{
    global $cn;
    $slug = sanitise($slug);
    $sql = "SELECT p.*,
        (SELECT JSON_ARRAYAGG(JSON_OBJECT('photo_src', p2.src, 'photo_name', p2.name, 'photo_sort', pp.sort)) from photo_product pp left join photos p2 on pp.photo_id = p2.id where p.id = pp.product_id order by pp.sort DESC) as photos,
        (SELECT JSON_ARRAYAGG(JSON_OBJECT('category_title', c.title, 'category_slug', c.slug, 'parent_title', c2.title)) from category_product cp 
            left join categories c on cp.category_id = c.id
            left join categories c2 on c.parent_id = c2.id
        where p.id = cp.product_id and c.status = 'active') as categories
        From products p where p.slug = ? limit 1";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $slug);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch(PDO::FETCH_OBJ);
    }
    return false;
}
