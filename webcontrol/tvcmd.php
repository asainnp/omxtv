<?php
   function getrq($key, $def=false) { return array_key_exists($key, $_REQUEST) ?$_REQUEST[$key] :$def; }
   
   $cmd  =getrq('cmd');  if ($cmd  === false) exit();
   $par1 =getrq('par1'); if ($par1 !== false) $cmd = "$cmd $par1";

   exec("echo $cmd > /tmp/omxtvstatuslog/maincmdfifo");

   session_start(); if (!isset($_SESSION['omxtvlog'])) $_SESSION['omxtvlog'] =array();
   $_SESSION['omxtvlog'][] ="$cmd";

   header('Location: ' .$_SERVER['HTTP_REFERER']);
?>
