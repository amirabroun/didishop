<?php
//check the description brands request
if (POST('action') === 'create_brands') {
    if (!validator(['title', 'description'])) {
        $create_brands = createBrand(POST('title'), POST('description'));
        if ($create_brands ) {
            $session = $_SESSION['message'] = [
                'title' => 'عملیات موفق',
                'type' => 'success',
                'text' => 'سطر جدید درج شد!!',
            ];
            back();
        } else {
            $session = $_SESSION['message'] = [
                'title' => 'عملیات ناموفق',
                'type' => 'error',
                'text' => 'عملیات با خطا مواجه شد!!',
            ];
        }
    }
}
//check the update brands request
if (POST('action') === 'edit-brand') {
    if (!validator(['title_brand', 'description_brand'])) {
        $update_brand = updateBrand(POST('id_brand'), POST('title_brand'), POST('description_brand'));
        if ($update_brand) {
            responseJson([
                'status' => 200,
                'message' => [
                    'title' => 'عملیات موفق',
                    'text' => 'برند ویرایش گردید!',
                    'type' => 'success'
                ]
            ]);
            back();
        } else {
            responseJson([
                'status' => 201,
                'message' => [
                    'title' => 'عملیات ناموفق',
                    'text' => 'عملیات ویرایش ناموفق بود!',
                    'type' => 'danger'
                ]
            ]);
        }
    }
}
