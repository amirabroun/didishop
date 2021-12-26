<?php

if (POST('action') == 'change_quantity') {
    
    $validator = validator([
        'type' => 'require'
    ]);
    
    if (!isAjaxRequest()) {
        redirect('/');
    }
    
    if (empty($getCart)) {
        responseJson([
            'status' => 201,
        ]);
    }
    
    if (changeQuantity($_POST['item'], $_POST['type'])) {
        responseJson([
            'status' => 200,
        ]);
    }
}
