<?php

if (POST('action') === 'sign-up') {

    $validator = validator([
        'first_name' => 'required',
        'last_name' => 'required',
        'cellphone' => 'required|mobile',
        'password' => 'password',
        'password_confirmation' => 'password_confirm',
        'term' => 'term',
    ]);

    if ($validator['status']) {

        if (!checkThereIsUser(POST('cellphone'))) {

            $verify_code = generateDigit(6);

            // برای کاربر $verify_code ارسال 

            $smsMessage = "{$verify_code}:کد ثبت نام شما در دیدی شاپ";

            $smsRawSender = smsRawSender(POST('cellphone'), $smsMessage);

            $_SESSION['signUp_otp'] = [
                'first_name' => POST('first_name'),
                'last_name' => POST('last_name'),
                'cellphone' => POST('cellphone'),
                'password' => POST('password'),
                'gender' => POST('gender'),
                'verify_code' => $verify_code,
                'token' => sha1($verify_code . POST('cellphone')),
                'expire_time' => time(),
            ];

            redirect('/sign-up.php?type=by_otp&token=' . $_SESSION['signUp_otp']['token']);
        } else {

            $_SESSION['message'] = [
                'title' => 'این شماره قبلا ثبت نام کرده است!',
                'text'  => 'شما به صفحه ورود هدایت شدید!',
                'type'  => 'info',
            ];

            redirect('sign-in.php');
        }
    }

    $_SESSION['message'] = [
        'title' => 'خطا در درخواست',
        'text'  => 'مشکلی در اطلاعات وارد شده وجود دارد.لطفا آنها را برطرف کنید.',
        'type'  => 'error',
    ];

    redirect('sign-up.php');
}

if (POST('action') === 'sign-up-otp') {

    $validator = validator([
        'verify_code' => 'required|number',
    ]);

    if ($validator['status']) {

        $expire_time = $_SESSION['signUp_otp']['expire_time'] + 600;

        if ($expire_time <= time()) {

            unset($_SESSION['registerOtp']);

            $_SESSION['message'] = [
                'title' => 'انقضا کد',
                'text' => 'کد ارسالی منقضی شده است لطفا دوباره سعی کنید!',
                'type' => 'error',
            ];

            redirect('/sign-up.php');
        }

        if (!isset($_SESSION['signUp_otp'])) {

            $_SESSION['message'] = [
                'title' => 'عملیات منقضی شده',
                'text'  => 'زمان ورود با رمز یکبار مصرف منقضی شده لطفا دوباره تلاش کنید.',
                'type'  => 'warning',
            ];

            redirect('/sign-up.php');
        }

        if (POST('verify_code') === (string)$_SESSION['signUp_otp']['verify_code']) {

            $createUser = createUser($_SESSION['signUp_otp']['first_name'], $_SESSION['signUp_otp']['last_name'], $_SESSION['signUp_otp']['cellphone'], $_SESSION['signUp_otp']['password'], $_SESSION['signUp_otp']['gender']);

            if ($createUser) {

                $_SESSION['_user_log_'] = $_SESSION['signUp_otp']['cellphone'];

                $_SESSION['message'] = [
                    'title' => $_SESSION['signUp_otp']['first_name'] . ' عزیز',
                    'text'  => 'با موفقیت حساب کاربری شما ساخته شد!',
                    'type'  => 'success',
                ];

                redirect('/');
            }
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
        'text'  => 'مشکلی در کد وارد شده وجود دارد.',
        'type'  => 'error',
    ];

    back();
}
