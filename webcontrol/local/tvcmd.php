<?php
   $cmd =$_REQUEST["cmd"]; if (!$cmd) exit();

   exec("echo $cmd > /tmp/omxtvstatuslog/maincmdfifo");
?>
