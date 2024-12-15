<?php

use Core\Response;
use Core\Validator;
use JetBrains\PhpStorm\NoReturn;

/**
 * @param $value
 * @return void
 */
#[NoReturn] function dd($value): void
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

#[NoReturn] function abort(int $error_code = Response::NOT_FOUND): void
{
    // Establece el código de respuesta HTTP
    http_response_code($error_code);

    // Ruta del archivo de la vista del error
    $error_view = base_path("views/$error_code.php");

    // Si la vista específica del error existe, la mostramos; de lo contrario, cargamos una vista genérica
    if (file_exists($error_view)) {
        require $error_view;
    } else {
        require base_path('views/generic_error.php');
    }

    // Finaliza la ejecución del script
    die();
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

#[NoReturn] function redirect($path): void
{
    header("location: {$path}");
    exit();
}
