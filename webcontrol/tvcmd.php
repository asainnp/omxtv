<?php 
   require_once('common.php');
   
   $cmd  =getrq('cmd');  if ($cmd  === false) exit();
   $par1 =getrq('par1'); if ($par1 !== false) $cmd = "$cmd $par1";

   exec("echo $cmd > /tmp/omxtvstatuslog/maincmdfifo");

   session_start(); if (!isset($_SESSION['omxtvlog'])) $_SESSION['omxtvlog'] =array();
   $_SESSION['omxtvlog'][] ="$cmd";

   header('Location: ' .$_SERVER['HTTP_REFERER']);

   //header('refresh:1; url=' .$_SERVER['HTTP_REFERER']);
?>
