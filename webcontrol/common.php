<?php
   function getrq($key, $def=false) { return array_key_exists($key, $_REQUEST) ?$_REQUEST[$key] :$def; }

   function echotitle($title) 
   {  echo "<title>$title " .file_get_contents("/etc/hostname") ."</title>\n";
      echo "<link rel='icon' href='/tv/res/omxtvicon.png' />\n";
   }

   //menu-ul and log-pre elements
   function echocommoncss() 
   {  //temporary closing php, to write clear css 
      ?>
      body,div,ul,li,a,form,input { box-sizing: border-box; margin:0; padding:0; }
      ul { list-style-type: none; }
      a  { text-decoration: none; }
      .break { clear:both; }
      #sidecmdlog { position:fixed; right:0; top:15em; }
      #homemenu   { position:fixed; right:0; top:0; z-index:7; } 
      #homemenu img  { width:12em; height:14em; } 
      .menu a  { font-size: 8em; background:black; color: white; border-radius: .2em; padding:.1em; }
      .menu li { margin: 4em 0; }
      <?php //php back
   }
   function echocommondiv()
   {  echo "<pre id='sidecmdlog'>";
      echo "cmd History:\n-----------------------\n";
      session_start();
      if (isset($_SESSION['omxtvlog'])) 
      {  $arr =$_SESSION['omxtvlog']; $len =count($arr);
         for ($i=$len; $i>0; $i--) echo "$i) " .$arr[$i-1] ."\n";
      }
      echo "</pre>";
      //temporary closing php, to write clear html  
      ?>
      <ul id='homemenu'>
         <li><a href='/tv'><img src='/tv/res/home.png'></a>
      </ul>
      <?php //php back
   }
?>

