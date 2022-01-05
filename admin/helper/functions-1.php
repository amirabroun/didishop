<?php
function sluggable($data)
{
    return str_replace(' ', '-', $data);
}

function sanitise($data)
{
    return trim(strip_tags($data));
}

function sanitiseNumber($data)
{
    return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
}

function url($path = '')
{
    return originBaseUrl() . '/' . ltrim($path, '/');
}

function assets($path = '')
{
    return originBaseUrl() . '/assets/' . ltrim($path, '/');
}

function setTitle()
{
    $page = str_replace(['/', '.php'], '', $_SERVER['SCRIPT_NAME']);
    switch ($page) {
        case 'product':
            return APP_TITLE . 'لیست محصولات | ';
        default:
            return APP_TITLE;
    }
}

function categoryLink($id): string
{
    return "/product.php?category=$id";
}

function productLink($slug): string
{
    return url("/single-product.php?product=$slug");
}

function dd(...$data)
{
    die(var_dump($data));
}

function bcrypt($password, $hash = null)
{
    if (!is_null($hash)) {
        return password_verify($password, $hash);
    }
    return password_hash($password, PASSWORD_BCRYPT);
}

function responseJson($data)
{
    die(json_encode($data));
}

function redirect($path)
{
    header("location: $path");
    exit();
}

function recaptchaVerify($secret_key, $token): bool
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['secret' => $secret_key, 'response' => $token]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $captcha_validation = json_decode($response, true);
    return $captcha_validation["success"] === true;
}

function generateDigit(int $length)
{
    try {
        if ($length >= 1) {
            $start = str_repeat("0", $length - 1);
            $end = str_repeat("9", $length - 1);
            return random_int("1$start", "9$end");
        }
        return false;
    } catch (Throwable $exception) {
        return false;
    }
}

function sortingArray(array $input_array, string $sort_key, string $sort_type): array
{
    $column_sort = array_column($input_array, $sort_key);
    if (!$column_sort) {
        return $input_array;
    }
    $sort = ($sort_type === 'ASC') ? SORT_ASC : SORT_DESC;
    array_multisort($column_sort, $sort, $input_array);
    return $input_array;
}

function price($price, $text = true): string
{
    return number_format($price) . ($text === true ? ' تومان' : null);
}

function validateProductCode(string $data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (!preg_match("/^([A-Z]{3}+)-(\d{8})$/", $data)) {
        return false;
    }
    return $data;
}

function isAjaxRequest(): bool
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function POST($key)
{
    return $_POST[$key] ?? null;
}

function GET($key)
{
    return $_GET[$key] ?? null;
}

function REQUEST($key)
{
    return $_REQUEST[$key] ?? null;
}

function back($url = '/')
{
    redirect($_SERVER['HTTP_REFERER'] ?? $url);
}

function originBaseUrl()
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
}

function publicBaseUrl($path = '')
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . PUBLIC_DOMAIN . '/' . ltrim($path, '/');
}

function adminBaseUrl()
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
}

function pageName()
{
    return str_replace(['/', '.php'], '', $_SERVER['SCRIPT_NAME']);
}

function validatorByRules($rules, $input)
{
    $errors = [];
    foreach ($rules as $rule) {
        if ($rule === 'required') {
            if (!isset($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
            continue;
        }
        if ($rule === 'number') {
            if (isset($_REQUEST[$input]) && !validateNumber($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'mobile') {
            if (isset($_REQUEST[$input]) && !validateMobile($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'password') {
            if (isset($_REQUEST[$input]) && !validateLenPass($input)) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'persianChar') {
            if (isset($_REQUEST[$input]) && !validatePersianChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
    }
    return $errors;
}

function translate($word, $is_rule = false)
{
    $attributes = [
        'rules' => [
            'password' => 'کلمه عبور نباید کمتر از 8 کاراکتر باشد!',
            'mobile' => 'شماره تلفن وارد شده نامعتبر است!',
            'number' => 'مقدار فیلد باید فقط عدد باشد!',
            'required' => 'فیلد نباید خالی باشد!',
            'persianChar' => 'لطفا مقدار فیلد را فارسی بنویسید!'
        ],
        'inputs' => [
            'title' => 'عنوان',
            'cellphone' => 'شماره تلفن همراه',
            'password' => 'کلمه عبور',
            'password_rule' => 'کلمه عبور',
            'description' => 'توضیحات',
            'first_name' => 'نام',
            'last_name' => 'نام خانوادگی',
        ],
    ];
    if ($is_rule) {
        return @$attributes['rules'][$word];
    }
    return @$attributes['inputs'][$word];
}

function validator(array $fields)
{
    $errors = [];
    foreach ($fields as $key => $field) {
        $rules = explode('|', $field);
        $validatorByRules = validatorByRules($rules, $key);
        if (!empty($validatorByRules)) {
            $errors[$key] = $validatorByRules;
        }
    }
    if (!empty($errors)) {
        $_SESSION['error'][pageName()] = [
            'errors' => $errors,
            'title' => 'لطفا خطا های زیر را برطرف کنید: ',
        ];
        return ['status' => false];
    }
    return ['status' => true];
}

function initErrors()
{
    $html_last = null;
    $errors = @$_SESSION['error'][pageName()]['errors'];
    $title_error = @$_SESSION['error'][pageName()]['title'];
    if ($errors) {
        foreach ($errors as $key => $error) {
            $input_label = translate($key);
            $html_first = null;
            foreach ($error as $value) {
                $rule_label = translate($value['rule'], true);
                $html_first .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>{$rule_label}</li>";
            }
            $html_last .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>
            <span class='bold fof-15'>{$input_label}:</span>
            <ul style='padding: 0 10px;display: unset;font-size: 13px;'>
                $html_first
            </ul>
        </li>";
        }
        $title_error = (empty($title_error)) ? 'لطفا خطا های زیر را برطرف کنید!' : $title_error;
        unset($_SESSION['error'][pageName()]);
        return "<ul style='padding: 0 10px;display: block;text-align: right;' class='alert alert-danger alert-bold'>
                    <p class='bold fof-17 mt-3'>" . $title_error . ":</p>
                    <hr>
                    $html_last
                </ul>";
    }
    return null;
}

function isEmpty($data): bool
{
    return ($data === '' || $data === null || (is_array($data) && !$data));
}

function convertNumberToEnglish($data)
{
    if (isEmpty($data)) {
        return null;
    }
    return str_replace(['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
    ], $data);
}

function convertNumberToPersian($data)
{
    return str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9',], [
        '۰',
        '۱',
        '۲',
        '۳',
        '۴',
        '۵',
        '۶',
        '۷',
        '۸',
        '۹',
    ], $data);
}

function validatePersianChars($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (!preg_match("/^([\-\_ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژ])+$/u", $data)) {
        return false;
    }
    return $data;
}

function validateEnglishChars($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (preg_match("/[^A-Za-z0-9\-\_\/ ]/", $data)) {
        return false;
    }
    return $data;
}

function validateNumber($data)
{
    if (trim($data) === "") {
        return false;
    }
    if (!preg_match("/[^\D]/", $data)) {
        return false;
    }
    return $data;
}

function validateAddress($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (!preg_match('/^([, 0-9۱-۹-_،پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژ])+$/u', $data)) {
        return false;
    }
    return $data;
}

function validateEmail($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,5}$/ix", $data)) {
        return false;
    }
    return $data;
}

function validatePostalCode($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    $validate_number = sanitiseNumber($data);
    if (strlen($validate_number) !== 10) {
        return false;
    }
    return $validate_number;
}

function validateNationalCode($data): bool
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    if (!preg_match('/^[\d]{10}$/', $data)) {
        return false;
    }
    for ($i = 0; $i < 10; $i++) {
        if (preg_match('/^' . $i . '{10}$/', $data)) {
            return false;
        }
    }
    for ($i = 0, $sum = 0; $i < 9; $i++) {
        $sum += ((10 - $i) * (int)substr($data, $i, 1));
    }
    $ret = $sum % 11;
    $parity = (int)substr($data, 9, 1);
    return ($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity);
}

function validateBirthdate($data)
{
    if (trim($data) == "") {
        return false;
    }
    if (!preg_match('/^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][\d])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|31|([1-2][\d])|(0[1-9]))))$/', $data)) {
        return false;
    }
    return $data;
}

function validateMobile($data)
{
    if (empty(trim($data))) {
        return false;
    }
    $data = convertNumberToEnglish($data);
    if (!preg_match("/^09\d{9}$/", $data)) {
        return false;
    }
    return $data;
}

function validatePhone(string $data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    $data = convertNumberToEnglish($data);
    if (!preg_match("/(041|044|045|031|026|084|077|021|056|051|058|061|024|023|054|071|028|025|066|011|086|076|081|038|087|034|083|074|017|013|035{3}+)([2-9][\d]{7})$/", $data)) {
        return false;
    }
    return $data;
}

function validatePersianDate($data)
{
    if (trim($data) === "" || empty(trim($data))) {
        return false;
    }
    $data = convertNumberToEnglish($data);
    if (!preg_match('/^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2]\d)|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|31|([1-2]\d)|(0[1-9]))))$/', $data)) {
        return false;
    }
    return $data;
}

function validateCardNumber($card, bool $irCard = true): bool
{
    if (trim($card) === "" || empty(trim($card))) {
        return false;
    }
    $card = (string)preg_replace('/\D/', '', $card);
    $strlen = strlen($card);
    if ($irCard == true && $strlen != 16) {
        return false;
    }
    if ($irCard != true && ($strlen < 13 || $strlen > 19)) {
        return false;
    }
    if (!in_array($card[0], [2, 4, 5, 6, 9])) {
        return false;
    }

    for ($i = 0; $i < $strlen; $i++) {
        $res[$i] = $card[$i];
        if (($strlen % 2) == ($i % 2)) {
            $res[$i] *= 2;
            if ($res[$i] > 9) {
                $res[$i] -= 9;
            }
        }
    }
    return array_sum($res) % 10 === 0;
}

function validateLenPass($data)
{
    if (strlen($_REQUEST[$data]) < 8) {
        return false;
    }
    return $data;
}
