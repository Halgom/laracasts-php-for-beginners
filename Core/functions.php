<?php

use Core\Response;

function dd($value): void
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

function urlIs($value): bool
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
  if (! $condition) {
    abort($status);
  }
}

function base_path($path) {
  return BASE_PATH . $path;
}

function view($view_file, $params = []) {
  extract($params);
  require base_path("views/" . $view_file);
}

function abort($code = 404): void
{
  http_response_code($code);
  view("{$code}.view.php");
  die();
}
