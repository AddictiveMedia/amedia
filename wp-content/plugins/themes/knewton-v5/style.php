<?php 
ob_start();
header('Content-type: text/css');
include "lessc.inc.php";
$less = new lessc("assets/css/style-knewton.less");
$css = $less->parse();
echo $css;
?>