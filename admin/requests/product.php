<?php

if ((POST('action') === 'create_product') && !validator(['title', 'price', 'brand'])) {
    $createProduct = createProduct(POST('title'), convertNumberToEnglish(POST('price')), convertNumberToEnglish(POST('price_discounted')), POST('stock'), POST('brand'), POST('description'));
    if ($createProduct) {
        foreach (POST('category') as $item) {
            createCategoryProduct($item, $createProduct);
        }
        $_SESSION['message'] = [
            'title' => 'عملیات موفق',
            'type' => 'success',
            'text' => 'محصول با موفقیت ایجاد شد!',
        ];
        back();
    } else {
        $_SESSION['message'] = [
            'title' => 'عملیات ناموفق',
            'type' => 'error',
            'text' => 'عملیات با خطا مواجه شد!!',
        ];
    }
}

if (POST('action') === 'upload_picture_product') {
    if (array_sum($_FILES['picture_product_file']['size']) === 0) {
        responseJson([
            'status' => 205,
            'message' => [
                'title' => 'عملیات ناموفق',
                'text' => 'حداقل یک فایل برای آپلود انتخاب کنید!',
                'type' => 'error',
            ],
        ]);
    }
    $files = [];
    $keys = array_keys($_FILES['picture_product_file']);
    $errors = [];
    foreach ($keys as $item) {
        foreach ($_FILES['picture_product_file'][$item] as $key => $file) {
            if (isset($files[$key])) {
                $files[$key] = array_merge([$item => $file], $files[$key]);
                continue;
            }

            $files[$key] = [$item => $file];
        }
    }


    foreach ($files as $key => $file) {
        if (empty($file['size'])) {
            continue;
        }
        $original_name = $file['name'];
        $suffix = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_name = md5($original_name . microtime()) . '.' . $suffix;
        $path = '/images/products/';
        $full_path = rtrim(PUBLIC_DOMAIN_ROOT, '/') . $path . $new_name;
        if (@move_uploaded_file($file['tmp_name'], $full_path)) {
            $createPhoto = createPhoto($new_name, $path);
            if ($createPhoto) {
                deletePhotoProduct($_POST['product_id'], $key + 1);
                $createPhotoProduct = createPhotoProduct($createPhoto, $_POST['product_id'], $key + 1);
                if ($createPhotoProduct) {
                    continue;
                }
            }
        }
        $errors[] = ['file_name' => $original_name];
    }

    responseJson([
        'status' => (!empty($errors) ? 201 : 200),
        'errors' => $errors,
        'message' => [
            'title' => (!empty($errors) ? 'عملیات ناموفق' : 'عملیات موفق'),
            'text' => (!empty($errors) ? 'عملیات با خطا مواجه شد!' : 'تصاویر با موفقیت آپلود شد!'),
            'type' => (!empty($errors) ? 'error' : 'success'),
        ],
    ]);
}

if (POST('action') === 'update_product') {
    if (!validator(['id', 'title'])) {
        $updateProduct = updateProduct(POST('id'), POST('brand_id'), POST('title'), POST('description'));
        if ($updateProduct) {
            responseJson([
                'status' => 200,
                'message' => [
                    'title' => 'عملیات موفق',
                    'text' => 'محصول با موفقیت ویرایش شد!',
                    'type' => 'success',
                ],
            ]);
        }
        responseJson([
            'status' => 201,
            'message' => [
                'title' => 'عملیات ناموفق',
                'text' => 'عملیات با خطا مواجه شد!',
                'type' => 'error',
            ],
        ]);
    }
}
