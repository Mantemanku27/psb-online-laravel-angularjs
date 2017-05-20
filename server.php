<?php

/**
 * Laravel - Framework PHP untuk Developer Web.
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// File ini memungkinkan kita untuk meniru fungsi "mod_rewrite" dari Apache Server.
// Web PHP built-in Ini memberikan cara mudah untuk menguji Laravel.
// Aplikasi tanpa harus menginstal perangkat lunak server "real(nyata)" di sini.

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
