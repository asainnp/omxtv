<head>
<style>
   body { font-size: 2em; }
</style>
</head>
<body>
<?php
   $cmd =$_REQUEST["cmd"]; if (!$cmd) exit();
   exec("echo $cmd > /tmp/omxtvstatuslog/maincmdfifo");
   echo "sent command $cmd to "; 
   echo file_get_contents("/etc/hostname");
?>
</body>
