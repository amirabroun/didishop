<header class="main-header js-fixed-header dt-sl">
    <!-- Start ads -->
    <a href="#" class="ads-header hidden-sm" target="_blank" style="background-image: url(./assets/img/banner/large-ads.jpg)"></a>
    <!-- End ads -->
    <!-- Start topbar -->
    <div class="container main-container">
        <div class="topbar dt-sl">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="logo-area float-right">
                        <a href="<?php echo url('/'); ?>">
                            <img src="./assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 hidden-sm">
                    <div class="search-area dt-sl">
                        <form action="" class="search">
                            <input type="text" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                            <button type="submit"><img src="<?php echo assets('img/theme/search.png'); ?>" alt=""></button>
                            <button class="close-search-result" type="button"><i class="mdi mdi-close"></i></button>
                            <div class="search-result">
                                <ul>
                                    <li>
                                        <a href="#">موبایل</a>
                                    </li>
                                    <li>
                                        <a href="#">مد و پوشاک</a>
                                    </li>
                                    <li>
                                        <a href="#">میکروفن</a>
                                    </li>
                                    <li>
                                        <a href="#">میز تلویزیون</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-6 topbar-left">
                    <ul class="nav float-left">
                        <li class="nav-item account dropdown">
                            <?php
                            if (isset($_SESSION['_user_log_'])) {
                            ?>
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="label-dropdown">حساب کاربری</span>
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                    <a class="dropdown-item" href="<?php echo url('profile.php'); ?>">
                                        <i class="mdi mdi-account-card-details-outline"></i>پروفایل
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="float-left badge badge-dark">۴</span>
                                        <i class="mdi mdi-comment-text-outline"></i>پیغام ها
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="mdi mdi-account-edit-outline"></i>ویرایش حساب کاربری
                                    </a>
                                    <div class="dropdown-divider" role="presentation"></div>
                                    <a class="dropdown-item" href="<?php echo url('logout.php'); ?>">
                                        <i class="mdi mdi-logout-variant"></i>خروج
                                    </a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" href="javascript:;">
                                    <span class="label-dropdown">ورود/ثبت نام</span>
                                    <i class="fa fa-sign-in vertical-align-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                    <a class="dropdown-item" href="<?php echo url('sign-in.php'); ?>">
                                        <i class=""></i>ورود
                                    </a>
                                    <a class="dropdown-item" href="<?php echo url('sign-up.php'); ?>">
                                        <i class=""></i>ثبت نام
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End topbar -->

    <!-- Start bottom-header -->
    <div class="bottom-header dt-sl mb-sm-bottom-header">
        <div class="container main-container">
            <!-- Start Main-Menu -->
            <nav class="main-menu dt-sl">
                <ul class="list float-right hidden-sm">
                    <?php
                    $CategoryParents = getCategoryParents();
                    foreach ($CategoryParents as $categoryParent) {
                        $getCategoryChilderen = getCategoryChilderen($categoryParent->id);
                    ?>
                        <li class="list-item menu-col-1 <?php echo (!empty($getCategoryChilderen)) ? 'list-item-has-children' : null; ?>">
                            <a class="nav-link" href="<?php echo categoryLink($categoryParent->id); ?>"><?php echo $categoryParent->title ?></a>
                            <?php
                            if ($getCategoryChilderen) {
                            ?>
                                <ul class="sub-menu nav">
                                    <?php
                                    foreach ($getCategoryChilderen as $item) {
                                    ?>
                                        <li class="list-item">
                                            <a class="nav-link" href="<?php echo categoryLink($item->id); ?>"><?php echo $item->title; ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }
                            ?>
                        </li>
                    <?php
                    }
                    ?>
                    <!--<li class="list-item">
                        <a class="nav-link" href="#">ورزش و سفر</a>
                    </li>-->
                </ul>
                <ul class="nav float-left">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="label-dropdown">سبد خرید</span>
                            <i class="mdi mdi-cart-outline"></i>
                            <span class="count">2</span>
                        </a>
                        <div class="dropdown-menu cart dropdown-menu-sm dropdown-menu-left">
                            <div class="dropdown-header">سبد خرید</div>
                            <div class="dropdown-list-icons">
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon">
                                        <img src="./assets/img/cart/01.jpg" alt="">
                                    </div>
                                    <div class="mr-3">
                                        تیشرت مردانه
                                        <div class="pt-1">۵۹,۰۰۰ تومان</div>
                                    </div>
                                    <button class="remove"><i class="mdi mdi-close"></i></button>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon">
                                        <img src="./assets/img/cart/02.jpg" alt="">
                                    </div>
                                    <div class="mr-3">
                                        کت مردانه
                                        <div class="pt-1">۱۹۹,۰۰۰ تومان</div>
                                    </div>
                                    <button class="remove"><i class="mdi mdi-close"></i></button>
                                </a>
                            </div>
                            <hr>
                            <div class="dropdown-footer text-center">
                                <div class="dt-sl mb-3">
                                    <span class="float-right">جمع :</span>
                                    <span class="float-left">۲۵۸,۰۰۰ تومان</span>
                                </div>
                                <a href="<?php echo url('cart.php'); ?>" class="btn btn-success">مشاهده سبد خرید</a>
                                <a href="<?php echo url('cart.php'); ?>" class="btn btn-primary">پرداخت</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="btn-menu">
                    <div class="align align__justify">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="side-menu">
                    <div class="logo-nav-res dt-sl text-center">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                        <form action="">
                            <input type="text" name="s" placeholder="جستجو کنید...">
                            <i class="mdi mdi-magnify"></i>
                        </form>
                    </div>
                    <ul class="navbar-nav dt-sl">
                        <li class="sub-menu">
                            <a href="#">کالای دیجیتال</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">بهداشت و سلامت</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">ابزار و اداری</a>
                            <ul>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li>
                                    <a href="#">عنوان دسته</a>
                                </li>
                                <li class="sub-menu">
                                    <a href="#">عنوان دسته</a>
                                    <ul>
                                        <li>
                                            <a href="#">زیر منو یک</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو دو</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو سه</a>
                                        </li>
                                        <li>
                                            <a href="#">زیر منو چهار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">مد و پوشاک</a>
                        </li>
                        <li>
                            <a href="#">خانه و آشپزخانه</a>
                        </li>
                        <li>
                            <a href="#">ورزش و سفر</a>
                        </li>
                    </ul>
                </div>
                <div class="overlay-side-menu">
                </div>
            </nav>
            <!-- End Main-Menu -->
        </div>
    </div>
    <!-- End bottom-header -->
</header>