<?php
session_start();

require 'app/model/Model.php';
$path = "app/model/";
$handle = opendir($path);
while ($file = readdir($handle)) {
	if ($file != "Model.php" && is_file($path . $file)) {
		require $path . $file;
	}
}

$server_url = "http://" . $_SERVER['SERVER_NAME'] . explode("index.php", $_SERVER['SCRIPT_NAME'])[0];

#gerencia a renderização das paginas do sistema

function _url($url)
{

	$arr = explode("/", $url);

	$urlBack = "http://" . $_SERVER['HTTP_HOST_'] . $_SERVER['REQUEST_URI'];

	if (strstr($url, ".")) {
		if (!file_exists($url) && !file_exists("." . $url)) {
			Header("Location: .app/errors/url.php?url=$url&back=$urlBack");
		}
	} else
	if (file_exists('app/controller/' . $arr[0] . 'Controller.php')) {
		include_once 'app/controller/' . $arr[0] . 'Controller.php';
		$methods = get_class_methods($arr[0] . "Controller");
		if (!in_array($arr[1], $methods)) {
			Header("Location: .app/errors/url.php?url=$url&back=$urlBack");
		}
	} else {
		Header("Location: .app/errors/url.php?url=$url&back=$urlBack");
	}

	$local = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	$local = substr($local, 0, strpos($local, "index.php")) . $url;
	return "http://" . $local;
}
//______________________________________________________________________________________________________
/*
$url = (isset($_GET['url']) ? $_GET['url'] : 'hubhive');
$url = array_filter(explode('/', $url));

if (file_exists('app/controllers/'.$url[0].'Controller.php')){
	include_once 'app/controllers/'.$url[0].'Controller.php';
	$methods = get_class_methods($url[0]."Controller");
	if ( !in_array($url[1],$methods) ){
		print("Pagina não encontrada!");
	}
}
*/

//___________________________________________________________________________________________________
function render($name, $send = array())
{
	global $server_url;
	if (file_exists("app/view/$name.php")) {
		extract($send, EXTR_PREFIX_SAME, "wddx");
		include "app/view/$name.php";
	}
}

function route($route)
{
	global $server_url;
	return $server_url . $route;
}

function assets($route)
{
	global $server_url;
	return $server_url . "public/" . $route;
}
//-----------------------------------------------------------------------------------
$local = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]);
$parts = str_replace($local, "", $_SERVER["REQUEST_URI"]);
$parts = trim(str_replace("index.php", "", $parts), "/");

if (strstr($parts, "#")) {
	$parts = substr($parts, 0, strpos($parts, "#"));
}
if (strstr($parts, "?")) {
	$parts = substr($parts, 0, strpos($parts, "?"));
}

if ($parts != "") {
	$parts = explode("/", $parts);
} else {
	$parts = array();
}

//carrega a classe controle
if (_v($parts, 0) != "") {
	$class = ucwords(strtolower($parts[0]));
} else {
	$class = "Hubhive";
}

include 'app/controller/' . $class . 'Controller.php';

function redirect($url)
{

	if (!strstr($url, "http")) {
		$local = _url($url);
	} else {
		$local = $url;
	}

	Header("Location: $local");
}

function _v($arr, $val)
{
	if (isset($arr[$val])) {
		return $arr[$val];
	} else {
		return "";
	}
}

//carrega o metodo
if (_v($parts, 1) != "") {
	$metodo = $parts[1];
} else {
	$metodo = "index";
}

$class .= "Controller";
#carrega o controller
$controller = new $class();

function model($name)
{
	include 'app/models/' . $name . '.php';
}

function all_models()
{
	global $createTables;
	$model_files = scandir("app/model/");

	foreach ($model_files as $file) {
		$ff = explode('.', $file);
		if (
			strtolower($ff[0]) !== strtolower(__CLASS__) &&
			strtolower($ff[1]) === 'php'
		) {
			require_once("app/model/" . $file);


			if ($createTables)
				$ff[0]::createTable();
		}
	}
}

$params_to_controller = array();

#Converte o request para objetos
$request = $_REQUEST;
$r = new ReflectionMethod($controller, $metodo);
$params = $r->getParameters();
$methodDoc = strtolower($r->getDocComment());

if (!empty($params)) {
	$param_names = array();


	foreach ($params as $param) {
		$obj = null;
		$paramName = $param->getName();

		//Para parametros primitivos somente
		foreach ($request as $key => $req) {
			if ($key == $paramName) {
				if ($_REQUEST[$key] == "") {
					$obj = null;
				} else {
					$obj = $_REQUEST[$key];
				}
				unset($request[$key]);
			}
		}


		array_push($params_to_controller, $obj);
	}
}


if (count($parts) > 2) {

	for ($i = 0; $i < count($params_to_controller); $i++) {
		if ($params_to_controller[$i] == null) {
			$params_to_controller[$i] = $parts[2 + $i];
		}
	}
}


//$obj->$metodo();
call_user_func_array(array($controller, $metodo), $params_to_controller);
?>

<script src="app/scripts/uploadimage.js"></script>
<script src="app/scripts/modals.js"></script>
<script src="app/scripts/addcomponents.js"></script>
<script src="app/scripts/scroll.js"></script>
<script src="app/scripts/draganddrop.js"></script>