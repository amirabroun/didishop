<?php
if (POST('action') === 'sign-in') {

    $validator = validator([
        'cellphone' => 'required|mobile',
        'password' => 'required|password',
    ]);

    if ($validator['status']) {

        if (doLogin(POST('cellphone'), POST('password'))) {

            $_SESSION['_user_log_'] = $login->id;

            $_SESSION['message'] = [
                'title' => 'اعتبارسنجی موفق',
                'text'  => 'با موفقیت وارد حساب کاربری شدید!',
                'type'  => 'success',
            ];

            redirect('/');
        }

        $_SESSION['message'] = [
            'title' => 'خطا اعتبارسنجی',
            'text'  => 'حساب کاربری با اطلاعات وارد شده وجود ندارد.',
            'type'  => 'error',
        ];

        back();
    }

    $_SESSION['message'] = [
        'title' => 'خطا در درخواست',
        'text'  => 'مشکلی در اطلاعات وارد شده وجود دارد.لطفا آنها را برطرف کنید.',
        'type'  => 'error',
    ];

    back();
}

if (POST('action') === 'sign-in-with-otp') {

    $validator = validator([
        'cellphone' => 'required|mobile',
    ]);

    if ($validator['status']) {

        if (doLoginWithOtp(POST('cellphone'))) {

            $verify_code = generateDigit(6);

            // ارسال کد برای کاربر
            smsSender($login->mobile, $verify_code, null, null, 'auth');

            $_SESSION['signIn_otp'] = [
                'cellphone' => $login->mobile,
                'user_id' => $login->id,
                'verify_code' => $verify_code,
                'token' => sha1($verify_code . $login->mobile),
                'expire_time' => time(),
            ];

            $_SESSION['message'] = [
                'title' => 'اعتبارسنجی موفق',
                'text'  => 'کد تایید ارسال شده به شماره تلفن وارد را وارد نمایید.',
                'type'  => 'success',
            ];

            redirect('/sign-in.php?type=by_otp&token=' . $_SESSION['signIn_otp']['token']);
        }

        $_SESSION['message'] = [
            'title' => 'خطا اعتبارسنجی',
            'text'  => 'حساب کاربری با اطلاعات وارد شده وجود ندارد.',
            'type'  => 'error',
        ];

        back();
    }

    $_SESSION['message'] = [
        'title' => 'خطا در درخواست',
        'text'  => 'مشکلی در اطلاعات وارد شده وجود دارد.لطفا آنها را برطرف کنید.',
        'type'  => 'error',
    ];

    back();
}


if (POST('action') === 'confirmation-otp') {

    $validator = validator([
        'verify_code' => 'required|number',
    ]);

    if ($validator['status']) {

        if (!isset($_SESSION['signIn_otp'])) {

            $_SESSION['message'] = [
                'title' => 'عملیات منقضی شده',
                'text'  => 'زمان ورود با رمز یکبار مصرف منقضی شده لطفا دوباره تلاش کنید.',
                'type'  => 'warning',
            ];

            redirect('/sign-in.php?type=by_otp');
        }

        if (POST('verify_code') === (string)$_SESSION['signIn_otp']['verify_code']) {

            $_SESSION['_user_log_'] = $_SESSION['signIn_otp']['user_id'];

            $_SESSION['message'] = [
                'title' => 'اعتبارسنجی موفق',
                'text'  => 'با موفقیت وارد حساب کاربری شدید!',
                'type'  => 'success',
            ];

            redirect('/');
        }

        $_SESSION['message'] = [
            'title' => 'خطا اعتبارسنجی',
            'text'  => 'کد تایید وارد شده نا معتبر است.',
            'type'  => 'error',
        ];

        back();
    }

    $_SESSION['message'] = [
        'title' => 'خطا در درخواست',
        'text'  => 'مشکلی در اطلاعات وارد شده وجود دارد.لطفا آنها را برطرف کنید.',
        'type'  => 'error',
    ];

    back();
}

if (pageName() === 'sign-in' && GET('type') === 'by_otp' && !empty(GET('token')) && !isset($_SESSION['signIn_otp'])) {

    $_SESSION['message'] = [
        'title' => 'عملیات منقضی شده',
        'text'  => 'زمان ورود با رمز یکبار مصرف منقضی شده لطفا دوباره تلاش کنید.',
        'type'  => 'warning',
    ];

    redirect('/sign-in.php?type=by_otp');
}
