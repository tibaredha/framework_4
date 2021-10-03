<?php
require './libs/config.php';
spl_autoload_register(function ($class) {require LIBS . $class .".php";});
$app = new Bootstrap();
?>