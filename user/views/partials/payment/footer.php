<footer class="mini-footer dt-sl">
    <div class="container main-container">
        <div class="row">
            <div class="col-md-6 col-sm-12 text-left">
                <i class="mdi mdi-phone-outline"></i>
                شماره تماس : <a href="#">
                    ۶۱۹۳۰۰۰۰
                    - ۰۲۱
                </a>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <i class="mdi mdi-email-outline"></i>
                آدرس ایمیل : <a href="#">info@gmail.com</a>
            </div>
            <div class="col-12 text-center mt-2">
                <p class="text-secondary text-footer">
                    استفاده از کارت هدیه یا کد تخفیف، درصفحه ی پرداخت امکان پذیر است.
                </p>
            </div>
            <div class="col-12 text-center">
                <div class="copy-right-mini-footer">
                    Copyright © 2019 Didikala
                </div>
            </div>
        </div>
    </div>
</footer>
</div>


<script src="<?php echo assets('js/vendor/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/popper.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/bootstrap.min.js'); ?>"></script>
<!-- Plugins -->
<script src="<?php echo assets('js/vendor/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/jquery.horizontalmenu.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/jquery.nice-select.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/nouislider.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/wNumb.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/ResizeSensor.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/theia-sticky-sidebar.min.js'); ?>"></script>
<script src="<?php echo assets('js/vendor/sweetalert.js') ?>"></script>
<!-- Main JS File -->
<script src="<?php echo assets('js/main.js') ?>"></script>

<?php
if (isset($_SESSION['message'])) {
    ?>
    <script>
        Swal.fire({
            title: "<?php echo $_SESSION['message']['title'] ?>",
            html: "<?php echo $_SESSION['message']['text'] ?>",
            icon: "<?php echo $_SESSION['message']['type'] ?>",
            buttonsStyling: false,
            confirmButtonText: "متوجه شدم!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    </script>
    <?php
    unset($_SESSION['message']);
}
?>
</body>

</html>
