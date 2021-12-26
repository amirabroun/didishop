<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $path = '../';
}
require_once @$path . 'functions/requests.php';
require_once @$path . 'functions/others.php';
require_once @$path . 'functions/validations.php';