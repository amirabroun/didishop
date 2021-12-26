<?php
if (!empty($getCart)) { ?>
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2 px-0">
                    <nav class="tab-cart-page">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">سبد خرید<span class="count-cart"><?php echo count($getCart); ?></span></a>
                        </div>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-12 px-0">
                                    <div class="table-responsive checkout-content dt-sl">
                                        <div class="checkout-header checkout-header--express">
                                            <span class="checkout-header-title">ارسال عادی</span>
                                            <span class="checkout-header-extra-info">(<?php echo count($getCart); ?> کالا)</span>
                                        </div>
                                        <table class="table table-cart">
                                            <tbody>
                                                <?php
                                                foreach ($getCart as $item) {
                                                    $photo = json_decode($item->photo_product, true);
                                                ?>
                                                    <tr class="checkout-item">
                                                        <td>
                                                            <img width="150px" height="150px" src="<?php echo publicBaseUrl(@$photo[0]['photo_src'] . '/' . @$photo[0]['photo_name']); ?>" alt="">
                                                            <button class="checkout-btn-remove">&times;</button>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#">
                                                                <h3 class="checkout-title">
                                                                    گوشی موبایل سامسونگ مدل Galaxy A70 SM-A705FN/DS دو
                                                                    سیم‌کارت ظرفیت 128 گیگابایت
                                                                </h3>
                                                            </a>
                                                            <p class="checkout-dealer">
                                                                فروشنده: ایرانیان قائم همراه(کاوش تیم)
                                                            </p>
                                                            <p class="checkout-guarantee">گارانتی 18 ماهه کاوش تیم</p>
                                                            <div class="checkout-variant checkout-variant--color">
                                                                <span class="checkout-variant-title">رنگ :</span>
                                                                <span class="checkout-variant-value">
                                                                    مشکی
                                                                    <div class="checkout-variant-shape" style="background-color:#212121"></div>
                                                                </span>
                                                            </div>
                                                            <a class="checkout-save-for-later">انتقال به لیست خرید
                                                                بعدی</a>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">تعداد</p>
                                                            <div class="number-input">
                                                                <button type="button" class="btn-quantity" data-item="<?php echo $item->cart_id ?>" data-action="decrement"></button>
                                                                <input class="quantity" min="1" name="quantity" value="<?php echo $item->quantitty ?>" type="number" style="user-select: none; ">
                                                                <button type="button" class="btn-quantity plus" data-item="<?php echo $item->cart_id ?>" data-action="increment"></button>
                                                            </div>
                                                        </td>
                                                        <td><strong>۴,۴۹۷,۰۰۰ تومان</strong></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                    <div class="dt-sn mb-2">
                                        <ul class="checkout-summary-summary">
                                            <li>
                                                <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                                            </li>
                                            <li class="checkout-summary-discount">
                                                <span>سود شما از خرید</span><span><span>(۱٪)</span>۲۰۰,۰۰۰
                                                    تومان</span>
                                            </li>
                                            <li>
                                                <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span>وابسته به آدرس</span>
                                            </li>
                                            <li class="checkout-club-container">
                                                <span>دیدیکلاب<span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                            </li>
                                        </ul>
                                        <div class="checkout-summary-devider">
                                            <div></div>
                                        </div>
                                        <div class="checkout-summary-content">
                                            <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                            <div class="checkout-summary-price-value">
                                                <span class="checkout-summary-price-value-amount">۱۶,۶۹۷,۰۰۰</span>
                                                تومان
                                            </div>
                                            <a href="<?php echo url('shipping.php'); ?>" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                    ادامه ثبت سفارش
                                                </button>
                                            </a>
                                            <div>
                                                <span>کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارشمراحل بعدی را تکمیل کنید.</span>
                                                <span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dt-sn checkout-feature-aside pt-4">
                                        <ul>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/return-policy.svg" alt="">
                                                هفت روز ضمانت تعویض
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/payment-terms.svg" alt="">
                                                پرداخت در محل با کارت بانکی
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/delivery.svg" alt="">
                                                تحویل اکسپرس
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
} else {
?>
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="col-12">
                    <div class="dt sl dt-sn pt-3 pb-5">
                        <div class="cart-page cart-empty">
                            <div class="circle-box-icon">
                                <i class="mdi mdi-cart-remove"></i>
                            </div>
                            <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                            <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                            <div class="cart-empty-links mb-5">
                                <a href="#" class="border-bottom-dt">لیست مورد علاقه من</a>
                                <a href="#" class="border-bottom-dt">محصولات شگفت‌انگیز</a>
                                <a href="#" class="border-bottom-dt">محصولات پرفروش روز</a>
                            </div>
                            <a href="#" class="btn-primary-cm">ادامه خرید در دیدیکالا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
}
?>