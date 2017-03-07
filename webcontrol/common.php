<?php
   function getrq($key, $def=false) { return array_key_exists($key, $_REQUEST) ?$_REQUEST[$key] :$def; }

   function echotitle($title) 
   {  echo "<title>$title " .file_get_contents("/etc/hostname") ."</title>\n";
      echo "<link rel='icon' href='/tv/omxtvicon.png' />\n";
   }
   function echologcss() { echo "#sidecmdlog { position:fixed; right:0; top:0; }\n"; }
   function echologdiv()
   {  echo "<pre id='sidecmdlog'>";
      session_start();
      if (isset($_SESSION['omxtvlog'])) 
      {  $arr =$_SESSION['omxtvlog']; $len =count($arr);
         for ($i=$len; $i>0; $i--) echo "$i) " .$arr[$i-1] ."\n";
      }
      echo "</pre>";
   }
?>

