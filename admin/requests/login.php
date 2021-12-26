<?php

if (POST('action') === 'admin_login' && isset($_POST['username'], $_POST['password'])) {

    $admin_login = doLogin(POST('username'), POST('password'));

    if ($admin_login) {

        if (recaptchaVerify(SECRET_KEY, POST('grecaptcha'))) {

            $_SESSION['_admin_log_'] = [
                'id' => $admin_login->id,
                'first_name' => $admin_login,
                'last_name' => $admin_login->last_name,
                'full_name' => "{$admin_login->first_name} {$admin_login->last_name}",
            ];

            responseJson([
                'data' => '',
                'status' => 200,
                'message' => [
                    'title' => $_SESSION['_admin_log_']['full_name'] . ' عزیز',
                    'text' => 'شما با موفقیت وارد شدید!',
                    'type' => 'success'
                ]
            ]);
        }

        responseJson([
            'data' => '',
            'status' => 201,
            'message' => [
                'title' => 'ورود ناموفق',
                'text' => 'لطفا ثابت کنید که ربات نیستید!',
                'type' => 'error'
            ]
        ]);
    }

    responseJson([
        'data' => '',
        'status' => 201,
        'message' => [
            'title' => 'ورود ناموفق',
            'text' => 'اطلاعات وارد شده نامعتبر است!',
            'type' => 'error'
        ]
    ]);
}
