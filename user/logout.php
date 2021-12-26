<?php
if (isset($_SESSION['_user_log_'])) {
    unset($_SESSION['_user_log_']);
    redirect('/');
}