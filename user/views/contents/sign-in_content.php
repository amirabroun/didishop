<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <?php echo initErrors() ?>
                    <?php

                    if (GET('type') === 'by_otp' && !empty(GET('token')) && GET('token') === @$_SESSION['signIn_otp']['token']) { ?>
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">تایید تلفن همراه</h2>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="confirmation-otp">
                            <div class="form-row-title">
                                <h3>کد تایید:</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="verify_code" placeholder="کد تایید ارسال شده را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>
                            <div class="form-row mt-3">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-login-variant"></i>
                                    تایید کد
                                </button>
                            </div>
                            <div class="form-footer text-right mt-3">
                                <a href="<?php echo url('sign-in.php'); ?>" class="d-inline-block mt-2 mb-2">ورود با کلمه عبور</a>
                                <span class="d-block font-weight-bold">کاربر جدید هستید؟</span>
                                <a href="<?php echo url('sign-up.php'); ?>" class="d-inline-block mr-3 mt-2">ثبت نام در <?php echo APP_NAME; ?></a>
                            </div>
                        </form>
                    <?php
                    } elseif (GET('type') === 'by_otp') {
                    ?>
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ورود با رمز یکبار مصرف</h2>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="sign-in-with-otp">
                            <div class="form-row-title">
                                <h3>شماره موبایل:</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="cellphone" placeholder="شماره موبایل خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>
                            <div class="form-row mt-3">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-login-variant"></i>
                                    تایید کد
                                </button>
                            </div>
                            <div class="form-footer text-right mt-3">
                                <a href="<?php echo url('sign-in.php'); ?>" class="d-inline-block mt-2 mb-2">ورود با کلمه عبور</a>
                                <span class="d-block font-weight-bold">کاربر جدید هستید؟</span>
                                <a href="<?php echo url('sign-up.php'); ?>" class="d-inline-block mr-3 mt-2">ثبت نام در <?php echo APP_NAME; ?></a>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ورود به <?php echo APP_NAME; ?></h2>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="sign-in">
                            <div class="form-row-title">
                                <h3>شماره موبایل:</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="cellphone" placeholder="شماره موبایل خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>
                            <div class="form-row-title">
                                <h3>رمز عبور:</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="password" name="password" class="input-ui pr-2" placeholder="رمز عبور خود را وارد نمایید">
                                <i class="mdi mdi-lock-open-variant-outline"></i>
                            </div>
                            <div class="form-row mt-2">
                                <div class="custom-control custom-checkbox float-right mt-2">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">
                                        مرا به خاطر بسپار
                                    </label>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-login-variant"></i>
                                    ورود به <?php echo APP_NAME; ?>
                                </button>
                            </div>
                            <div class="form-footer text-right mt-3">
                                <a href="<?php echo url('sign-in.php?type=by_otp'); ?>" class="d-inline-block mt-2 mb-2">ورود با رمز یکبار مصرف</a>
                                <span class="d-block font-weight-bold">کاربر جدید هستید؟</span>
                                <a href="<?php echo url('sign-up.php'); ?>" class="d-inline-block mr-3 mt-2">ثبت نام در <?php echo APP_NAME; ?></a>
                            </div>
                        </form>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>