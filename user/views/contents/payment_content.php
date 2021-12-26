<header class="header-shopping dt-sl">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="header-shopping-logo dt-sl">
                    <a href="<?php echo url('/'); ?>">
                        <img src="./assets/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 text-center">
                <ul class="checkout-steps">
                    <li>
                        <a href="javascript:(0);" class="active">
                            <span>اطلاعات ارسال</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:(0);" class="active">
                            <span>پرداخت</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:(0);">
                            <span>اتمام خرید و ارسال</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <section class="page-content dt-sl">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب شیوه پرداخت</h2>
                    </div>
                    <form method="post" id="shipping-data-form" class="dt-sn pt-3 pb-3 mb-4">
                        <div class="checkout-pack">
                            <div class="row">
                                <div class="checkout-time-table checkout-time-table-time">
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz" id="1" value="1" checked>
                                            <label for="1" class="custom-control-label">
                                                <i class="mdi mdi-credit-card-outline checkout-additional-options-checkbox-image"></i>
                                                <div class="content-box">
                                                    <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اینترنتی هوشمند دیجی‌کالا
                                                        <span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با پرداخت اینترنتی، سفارش شما با اولویت بیشتری نسبت به پرداخت در محل پردازش و ارسال می شود. در صورت پرداخت ناموفق هزینه کسر شده حداکثر طی ۷۲ ساعت به حساب شما بازگردانده می‌شود.</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span>
                                                    </div>
                                                    <ul class="checkout-time-table-subtitle-bar">
                                                        <li>
                                                            آنلاین با تمامی کارت‌های بانکی
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz" id="2" value="2">
                                            <label for="2" class="custom-control-label">
                                                <i class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                                                <div class="content-box">
                                                    <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اعتباری دیجی‌پی
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>خلاصه سفارش</h2>
                    </div>
                    <div class="dt-sn pt-3 pb-5">
                        <div class="checkout-order-summary">
                            <div class="accordion checkout-order-summary-item" id="accordionExample">
                                <div class="card pt-sl-res">
                                    <div class="card-header checkout-order-summary-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="checkout-order-summary-row">
                                                    <div class="checkout-order-summary-col checkout-order-summary-col-post-time">
                                                        مرسوله ۱
                                                        از ۱
                                                        <span class="fs-sm">(۲ کالا)</span>
                                                    </div>
                                                    <div class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                        <span class="dl-none-sm">نحوه ارسال</span>
                                                        <span class="dl-none-sm">
                                                            پست پیشتاز با ظرفیت اختصاصی برای دیجی کالا
                                                        </span>
                                                    </div>
                                                    <div class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                        <span>ارسال از</span>
                                                        <span class="fs-sm">
                                                            2 روز کاری
                                                        </span>
                                                    </div>
                                                    <div class="checkout-order-summary-col checkout-order-summary-col-shipping-cost">
                                                        <span>هزینه ارسال</span>
                                                        <span class="fs-sm">
                                                            رایگان
                                                        </span>
                                                    </div>
                                                </div>
                                                <i class="mdi mdi-chevron-down icon-down"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="box">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="product-box-container">
                                                            <div class="product-box product-box-compact">
                                                                <a class="product-box-img">
                                                                    <img src="./assets/img/cart/01.jpg">
                                                                </a>
                                                                <div class="product-box-title">
                                                                    تیشرت مردانه
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="product-box-container">
                                                            <div class="product-box product-box-compact">
                                                                <a class="product-box-img">
                                                                    <img src="./assets/img/cart/02.jpg">
                                                                </a>
                                                                <div class="product-box-title">
                                                                    کت مردانه
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
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 col-12">
                            <div class="dt-sn pt-3 pb-3 px-res-1">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>استفاده از کد تخفیف دیجی‌کالا
                                        <span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>بعد از نهایی شدن سفارش کد تخفیف را ثبت نمایید. بعد از ثبت کد تخفیف امکان بازگشت و یا تغییر سبد وجود نخواهد داشت. در صورت تغییر سفارش، کد تخفیف از بین خواهد رفت و امکان اعمال مجدد آن وجود ندارد</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span>
                                    </h2>
                                </div>
                                <p>با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                                <div class="form-ui">
                                    <form action="">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2" placeholder="مثلا 837A2CS">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="#" class="float-right border-bottom-dt"><i class="mdi mdi-chevron-double-right"></i>بازگشت به شیوه ارسال</a>
                        <a href="#" class="float-left border-bottom-dt">ثبت نهایی سفارش<i class="mdi mdi-chevron-double-left"></i></a>
                    </div>
                </section>
            </div>
            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                <div class="dt-sn mb-2">
                    <ul class="checkout-summary-summary">
                        <li>
                            <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                        </li>
                        <li>
                            <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                    <span class="mdi mdi-information-outline"></span>
                                </span></span><span>رایگان</span>
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
                        <a href="#" class="mb-2 d-block">
                            <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                <i class="mdi mdi-arrow-left"></i>
                                پرداخت و ثبت نهایی سفارش
                            </button>
                        </a>
                        <div>
                            <span>
                                کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                مراحل بعدی را تکمیل کنید.
                            </span>
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
</main>