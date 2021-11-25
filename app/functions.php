<?php

// Get current route
function getRoute()
{
	$base = explode("?", trim($_SERVER['REQUEST_URI']))[0];
	$arg = explode("/", $base)[1];
	return $arg ? $arg : $base;
}

function isRoute($arg)
{
	if ($arg) return getRoute() == $arg;
	else return null;
}

function truncateText($str, $limiter)
{
	$length = strlen($str);
	if ($length > $limiter) {
		$result = substr($str, 0, $limiter);
		return $result . '...';
	} else return $str;
}

function paginate($perPage, $items)
{
	$pages = [];
	$page = [];
	foreach ($items as $index => $item) {
		if ($index % $perPage == 0) {
			if (!empty($page)) array_push($pages, $page);
			$page = [];
		}
		if (!empty($item)) array_push($page, $item);
	}
	if (!empty($page)) array_push($pages, $page);

	if (!empty($pages)) return $pages;
	else return [];
}


function site_url()
{
  return rtrim(config('site.url'), '/') . '/';
}

function error($code, $message)
{
  @header("HTTP/1.0 {$code} {$message}", true, $code);
  die($message);
}

function config($key, $value = null)
{

  static $_config = array();

  if ($key === 'source' && file_exists($value))
    $_config = parse_ini_file($value, true);
  else if ($value == null) {

    $levels = explode('.', $key);
    if (count($levels) > 1) return $_config[$levels[0]][$levels[1]];
    else return (isset($_config[$key]) ? $_config[$key] : null);
  } else $_config[$key] = $value;
}

function redirect(/* $code_or_path, $path_or_cond, $cond */)
{

  $argv = func_get_args();
  $argc = count($argv);

  $path = null;
  $code = 302;
  $cond = true;

  switch ($argc) {
    case 3:
      list($code, $path, $cond) = $argv;
      break;
    case 2:
      if (is_string($argv[0]) ? $argv[0] : $argv[1]) {
        $code = 302;
        $path = $argv[0];
        $cond = $argv[1];
      } else {
        $code = $argv[0];
        $path = $argv[1];
      }
      break;
    case 1:
      if (!is_string($argv[0]))
        error(500, 'bad call to redirect()');
      $path = $argv[0];
      break;
    default:
      error(500, 'bad call to redirect()');
  }

  $cond = (is_callable($cond) ? !!call_user_func($cond) : !!$cond);

  if (!$cond)
    return;

  header('Location: ' . $path, true, $code);
  exit;
}

function stash($name, $value = null)
{

  static $_stash = array();

  if ($value === null)
    return isset($_stash[$name]) ? $_stash[$name] : null;

  $_stash[$name] = $value;

  return $value;
}

function content($value = null)
{
  return stash('$content$', $value);
}

function render($view, $locals = null, $layout = null)
{

  if (is_array($locals) && count($locals)) {
    extract($locals, EXTR_SKIP);
  }

  if (($view_root = config('views.root')) == null)
    error(500, "[views.root] is not set");

  ob_start();
  include "{$view_root}/{$view}.html.php";
  content(trim(ob_get_clean()));

  if ($layout !== false) {

    if ($layout == null) {
      $layout = config('views.layout');
      $layout = ($layout == null) ? 'layout' : $layout;
    }

    $layout = "{$view_root}/{$layout}.html.php";

    header('Content-type: text/html; charset=utf-8');

    ob_start();
    require $layout;
    echo trim(ob_get_clean());
  } else {
    echo content();
  }
}

