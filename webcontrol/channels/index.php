<?php require_once('../common.php'); ?>
<head>
   <?php echotitle("Channels"); ?>
   <style>
      ul { list-style-type: none; margin:0; padding:0; }
      a  { text-decoration: none; font-size: 3em; background: blue; color: white; border-radius: .2em; padding:.1em; }
      li { margin: 2em; font-size:2em; }
      #divsearch { position: fixed; bottom:0; right:0; z-index:5;}
      #divsearch input { font-size:3em; }
      <?php echologcss(); ?>
   </style>
</style>
</head>
<?php echologdiv(); ?>
<ul>
<?php
	$search =getrq('search'); 
	if ($fp =fopen("/opt/omxtv/tvchlist.txt", "r"))
	{
		$nr=0;
		while ($line =fgets($fp))
		{
			$nr++;
			if (!$search || stripos($line, trim($search)) !== false)
			echo "<li>$nr) <a href='../tvcmd.php?cmd=PLAYCH%20$line'>$line</a>";
		}
	}
?>
</ul>
<div id='divsearch'>
   <form method='get'>
      <input name='search' type='text' size='10' <?php if ($search) echo "value='$search'"; ?> />
      <input type='submit' value='Search'/>
   </form>
</div>
