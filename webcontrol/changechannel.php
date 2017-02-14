<?php
   $channel =$_REQUEST["channel"]; if (!$channel) exit();

   exec("tv $channel");
?>
