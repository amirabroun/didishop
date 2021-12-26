<main class="main-content dt-sl mt-4 mb-1">
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-3">
                    <?php echo initErrors();

                    if (GET('type') === 'by_otp' && GET('token') === @$_SESSION['signUp_otp']['token']) { ?>
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">تایید شماره موبایل</h2>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="sign-up-otp">
                            <div class="form-row-title">
                                <h3>تایید کد:</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="verify_code" placeholder="کد ارسال شده را وارد نمایید.">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>
                            <div class="form-row mt-4">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-login-variant"></i>
                                    تایید
                                </button>
                            </div>
                            <div class="form-footer text-right mt-4">
                                <span class="d-block font-weight-bold">
                                    شماره اشتباه است؟
                                    <a href="<?php echo url('sign-up.php'); ?>" class="d-inline-block mr-1 mt-2">اصلاح شماره موبایل</a>
                                </span>
                            </div>
                        </form>
                    <?php
                    } else { ?>
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ثبت نام در <?php echo APP_NAME; ?></h2>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="sign-up">
                            <div class="form-row-title">
                                <div class="form-row-title">
                                    <h3>نام:</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input type="text" class="input-ui pr-2" name="first_name" placeholder="نام خود را وارد نمایید!">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>نام خانوادگی:</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input type="text" class="input-ui pr-2" name="last_name" placeholder="نام خانوادگی خود را وارد نمایید!">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>شماره موبایل:</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input type="text" class="input-ui pr-2" name="cellphone" placeholder="شماره موبایل خود را وارد نمایید">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>رمز عبور</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input type="password" name="password" class="input-ui pr-2" placeholder="رمز عبور خود را وارد نمایید">
                                    <i class="mdi mdi-lock-open-variant-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>تایید رمز عبور:</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <input type="password" name="password_confirmation" class="input-ui pr-2" placeholder="تایید رمز عبور خود را وارد نمایید">
                                    <i class="mdi mdi-lock-open-variant-outline"></i>
                                </div>
                                <div class="form-row-title">
                                    <h3>جنسیت:</h3>
                                </div>
                                <div class="form-row with-icon">
                                    <ul class="variants">
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="other" name="gender" class="variant-selector" checked>
                                                <span class="ui-variant--check">نامشخص</span>
                                            </label>
                                        </li>
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="male" name="gender" class="variant-selector">
                                                <span class="ui-variant--check">مرد</span>
                                            </label>
                                        </li>
                                        <li class="ui-variant">
                                            <label class="ui-variant">
                                                <input type="radio" value="female" name="gender" class="variant-selector">
                                                <span class="ui-variant--check">زن</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" name="term" class="custom-control-input" id="term">
                                        <label class="custom-control-label text-justify" for="term">
                                            <a href="#">حریم خصوصی</a> و <a href="#">شرایط و قوانین</a> استفاده از سرویس های سایت دیدیکالا را مطالعه نموده و با کلیه موارد آن موافقم.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        ثبت نام در <?php echo APP_NAME; ?>
                                    </button>
                                </div>
                                <div class="form-footer text-right mt-2">
                                    <span class="d-block font-weight-bold">
                                        قبلا ثبت نام کرده اید؟
                                        <a href="<?php echo url('sign-in.php'); ?>" class="d-inline-block mr-1 mt-2">وارد شوید</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>