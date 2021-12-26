<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                <div class="profile-sidebar dt-sl">
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-sidebar-header dt-sl">
                            <div class="profile-avatar float-right">
                                <img src="./assets/img/theme/avatar.png" alt="">
                            </div>
                            <div class="profile-header-content mr-3 mt-2 float-right">
                                <span class="d-block profile-username">جلال بهرامی راد</span>
                                <span class="d-block profile-phone">09030813742</span>
                            </div>
                            <div class="profile-link mt-2 dt-sl">
                                <div class="text-center d-flex justify-content-center align-items-center">
                                    <!--<div class="col-6 text-center">
                                        <a href="#">
                                            <i class="mdi mdi-lock-reset"></i>
                                            <span class="d-block">تغییر رمز</span>
                                        </a>
                                    </div>-->
                                    <a href="<?php echo url('logout.php'); ?>">
                                        <i class="mdi mdi-logout-variant"></i>
                                        <span class="d-block"> خروج از حساب </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include './views/partials/profile/aside.php'; ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>آدرس ها</h2>
                        </div>
                        <div class="dt-sl">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address text-center px-4">
                                        <button class="checkout-address-location" data-toggle="modal" data-target="#modal-location">
                                            <strong>ایجاد آدرس جدید</strong>
                                            <i class="mdi mdi-map-marker-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address">
                                        <div class="card-horizontal-address-desc">
                                            <h4 class="card-horizontal-address-full-name">جلال بهرامی راد</h4>
                                            <p>
                                                خراسان شمالی، بجنورد، خراسان شمالی-بجنورد
                                            </p>
                                        </div>
                                        <div class="card-horizontal-address-data">
                                            <ul class="card-horizontal-address-methods float-right">
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-email-outline"></i>
                                                    کدپستی : <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                </li>
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-cellphone-iphone"></i>
                                                    تلفن همراه : <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                </li>
                                            </ul>
                                            <div class="card-horizontal-address-actions">
                                                <button class="btn-note" data-toggle="modal" data-target="#modal-location-edit">ویرایش</button>
                                                <button class="btn-note" data-toggle="modal" data-target="#remove-location">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address">
                                        <div class="card-horizontal-address-desc">
                                            <h4 class="card-horizontal-address-full-name">جلال بهرامی راد</h4>
                                            <p>
                                                خراسان شمالی، بجنورد، خراسان شمالی-بجنورد
                                            </p>
                                        </div>
                                        <div class="card-horizontal-address-data">
                                            <ul class="card-horizontal-address-methods float-right">
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-email-outline"></i>
                                                    کدپستی : <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                </li>
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-cellphone-iphone"></i>
                                                    تلفن همراه : <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                </li>
                                            </ul>
                                            <div class="card-horizontal-address-actions">
                                                <button class="btn-note" data-toggle="modal" data-target="#modal-location-edit">ویرایش</button>
                                                <button class="btn-note" data-toggle="modal" data-target="#remove-location">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    افزودن آدرس جدید
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" action="" style="max-width: unset" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>نام و نام خانوادگی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" type="text" placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>شماره موبایل
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" type="text" placeholder="09xxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                استان
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="custom-select-ui">
                                                <select class="right">
                                                    <option value="khrasan-north">
                                                        خراسان شمالی
                                                    </option>
                                                    <option value="tehran">
                                                        تهران
                                                    </option>
                                                    <option value="esfahan">
                                                        اصفهان
                                                    </option>
                                                    <option value="shiraz">
                                                        شیراز
                                                    </option>
                                                    <option value="tabriz">
                                                        تبریز
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>شهر</h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="custom-select-ui">
                                                <select class="right">
                                                    <option value="bojnourd">
                                                        بجنورد
                                                    </option>
                                                    <option value="garme">
                                                        گرمه
                                                    </option>
                                                    <option value="shirvan">
                                                        شیروان
                                                    </option>
                                                    <option value="mane">
                                                        مانه و سملقان
                                                    </option>
                                                    <option value="esfarayen">
                                                        اسفراین
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>آدرس پستی</h4>
                                        </div>
                                        <div class="form-row">
                                            <textarea class="input-ui pr-2 text-right" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="form-row-title">
                                            <h4>کد پستی</h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left placeholder-right" type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4 mt-4">
                                        <button type="submit" class="btn btn-sm btn-primary btn-submit-form">ثبت و ارسال به این آدرس</button>
                                        <button type="button" data-dismiss="modal" class="btn-link-border float-left mt-2">انصراف و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که این آدرس حذف شود؟</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel" data-dismiss="modal">خیر</button>
                <button type="button" class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
            </div>
        </div>
    </div>
</div>