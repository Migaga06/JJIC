<?php

function show($stuff)
{
  echo '<pre>';
  print_r($stuff);
  echo '</pre>';
}

function showD($stuff)
{
  echo '<pre>';
  print_r($stuff);
  echo '</pre>';
  die;
}

function redirect($path)
{
  header("Location: " . ROOT . "/" . $path);
}

function get_var($key, $default = "")
{
  if (isset($_POST[$key])) {
    return $_POST[$key];
  }

  return $default;
}

function get_select($key, $value)
{
  if (isset($_POST[$key])) {

    if ($_POST[$key] == $value) {
      return "selected";
    }
  }
  return "";
}

function random_string($length)
{
  $array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

  $text = '';

  for ($i = 0; $i < $length; $i++) {
    $random = rand(0, 61);
    $text .= $array[$random];
  }

  return $text;
}

function views_path($view){
  if (file_exists('../app/views/' . $view . '.tab.php')) {

    return '../app/views/' . $view . '.tab.php';
  } else {

    return '../app/views/404.php';
  }
}

function views($name)
  {
    if (file_exists('../app/views/' . $name . '.php')) {

      require '../app/views/' . $name . '.php';
    } else {

      require '../app/views/404.php';
    }
  }