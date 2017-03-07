<?php require_once('../common.php'); ?>
<head>
   <?php echotitle("Channels"); ?>
   <style>
      ul { list-style-type: none; margin:0; padding:0; }
      a  { text-decoration: none; font-size: 4em; background: blue; color: white; border-radius: .2em; padding:.1em; }
      li { margin: 2em; font-size:2em; }
      <?php echologcss(); ?>
   </style>
</style>
</head>
<ul>
<?php echologdiv(); ?>
<?php
	if ($fp =fopen("/opt/omxtv/tvchlist.txt", "r"))
	{
		$nr=0;
		while ($line =fgets($fp))
		{
			$nr++;
			echo "<li>$nr) <a href='../tvcmd.php?cmd=PLAYCH%20$line'>$line</a>";
		}
	}
?>
</ul>
