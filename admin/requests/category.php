<?php
if (POST('action') === 'create_category') {

    if (!validator(['title', 'description', 'parent'])) {

        $createCategory = createCategory(POST('parent'), POST('title'), POST('description'));

        if ($createCategory) {

            $_SESSION['message'] = [
                'title' => 'عملیات موفق',
                'type' => 'success',
                'text' => 'دسته بندی با موفقیت ثبت شد!',
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
}


if (POST('action') === 'update_category') {

    if (!validator(['title', 'description', 'parent'])) {

        $updateCategory = updateCategory(POST('id'), POST('parent'), POST('title'), POST('description'));

        if ($updateCategory) {

            responseJson([
                'status' => 200,
                'message' => [
                    'title' => 'عملیات موفق',
                    'text' => 'دسته با موفقیت ویرایش شد!',
                    'type' => 'success'
                ]
            ]);
        }

        responseJson([
            'status' => 201,
            'message' => [
                'title' => 'عملیات ناموفق',
                'text' => 'عملیات با خطا مواجه شد!',
                'type' => 'error'
            ]
        ]);
    }
}
