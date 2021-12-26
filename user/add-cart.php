<?php
$product = getProduct(GET('product'));
if ($product) {
    if (isset($_SESSION['_user_log_'])) {
        $user_id = $_SESSION['_user_log_'];
        $type = 'user';
    } elseif (isset($_COOKIE['_usr_tkn_'])) {
        $guest_token = explode(':', $_COOKIE['_usr_tkn_']);
        if (is_array($guest_token) && count($guest_token) === 2) {
            $getGuestToken = getGuestToken($guest_token[0], $guest_token[1]);
            if ($getGuestToken) {
                $user_id = $getGuestToken->id;
                $type = 'guest';
            }
        }
    } else {
        $secret = hash('crc32b', microtime());
        $token = hash('whirlpool', microtime());
        $createGuestToken = createGuestToken($secret, $token);
        if ($createGuestToken) {
            setcookie('_usr_tkn_', "$secret:$token", time() + 864000, '/');
            $user_id = $createGuestToken;
            $type = 'guest';
        }
    }
    if (isset($type, $user_id)) {
        createCart($user_id,$type, $product->id, $product->price, $product->price_discounted);
        redirect('/cart.php');
    } else {
        $_SESSION['message'] = [
            'title' => 'عملیات ناموفق',
            'text'  => "عملیات با خطا مواجه شد.لطفا دوباره امتحان کنید!",
            'type'  => 'error',
        ];
        back();
    }
}

$_SESSION['message'] = [
    'title' => 'عملیات ناموفق',
    'text'  => "عملیات با خطا مواجه شد.لطفا دوباره امتحان کنید!",
    'type'  => 'error',
];
back();