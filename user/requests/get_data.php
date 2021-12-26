<?php

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
}

$getCart = getCart($user_id ?? '', $type ?? '');
