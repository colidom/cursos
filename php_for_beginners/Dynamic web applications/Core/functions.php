<?php

use Core\Response;
use Core\Validator;

/**
 * @param $value
 * @return void
 */
function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

/**
 * @param $value
 * @return bool
 */
function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * @param string $string
 * @return array|string|string[]|null
 */
function filter_string_polyfill(string $string): array|string|null
{
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

/**
 * @param string $path        Ruta del archive de vista.
 * @param array  $attributes  Atributos que se extraerán para la vista.
 * @return void
 */
function view(string $path, array $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path);
}

function abort(int $error_code = Response::NOT_FOUND): void
{
    http_response_code($error_code);
    if ($error_code === $error_code) {
        require base_path("views/{$error_code}.php");
    } else {
        require base_path('views/generic_error.php');
    }
    die();
}

function login($user)
{
    $_SESSION['user'] = [
        'name' => $user['name'],
        'email' => $user['email']
    ];
}

function validate_post_data($data, $maxTitleLength = 64, $maxBodyLength = 255): array
{
    $errors = [];

    // Validar y filtrar los campos
    $title = filter_string_polyfill($data['title']);
    $body = filter_string_polyfill($data['body']);
    $user_id = filter_var($_SESSION['user_id'] ?? 1, FILTER_VALIDATE_INT);

    // Validaciones
    if (empty($title)) {
        $errors['title'] = 'A title is required';
    } elseif (!Validator::string($title, 1, $maxTitleLength)) {
        $errors['title'] = 'The title can not be longer than ' . $maxTitleLength . ' characters';
    }

    if (empty($body)) {
        $errors['body'] = 'A body is required';
    } elseif (!Validator::string($body, 1, $maxBodyLength)) {
        $errors['body'] = 'The body can not be longer than ' . $maxBodyLength . ' characters';
    }

    return [$errors, $title, $body, $user_id];
}

