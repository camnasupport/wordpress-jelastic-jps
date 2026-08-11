<?php

if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) $_SERVER['HTTPS']='on';

// ** WordPress reverse proxy x-forwarded-for ip fix ** //
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $http_x_headers = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
        $_SERVER['REMOTE_ADDR'] = $http_x_headers[0];
}

if ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
        unset(
                $_SERVER['HTTP_X_REAL_IP'],
                $_SERVER['HTTP_X_FORWARDED_FOR'],
                $_SERVER['HTTP_CLIENT_IP'],
                $_SERVER['HTTP_X_SUCURI_CLIENTIP']
        );
}
