<?php

if (pageName() == 'single-product') {

    $getProductDetails = getProductDetails(GET('product'));

    if (!$getProductDetails) {

        http_response_code(404);

        exit();
    }

    $categories = json_decode($getProductDetails->categories);

    $photos = sortingArray(json_decode($getProductDetails->photos, true) ?? [], 'photo_sort', 'ASC');
}
