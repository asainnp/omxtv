<head>
<style>
   body { font-size: 2em; }
</style>
</head>
<body>
<?php
   function getrq($key, $def=false) { return array_key_exists($key, $_REQUEST) ?$_REQUEST[$key] :$def; }
   
   $cmd  =getrq('cmd');  if ($cmd  === false) exit();
   $par1 =getrq('par1'); if ($par1 !== false) $cmd = "$cmd $par1";

   exec("echo $cmd > /tmp/omxtvstatuslog/maincmdfifo");
   echo "sent command $cmd to " .file_get_contents("/etc/hostname");
?>
</body>
