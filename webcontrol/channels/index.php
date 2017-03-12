<?php require_once('../common.php'); ?>
<head>
   <?php echotitle("Channels"); ?>
   <style>
      <?php echocommoncss(); ?>
      .menu a { background: blue; }
      .menu a  { display:inline-block; white-space:nowrap; max-width:100%; overflow:hidden; } 
      .menu { padding-bottom:8em; }
      .small { font-size:.5em; }
      #divsearch { position: fixed; bottom:0; right:0; z-index:5; text-align:right; }
      #divsearch input { font-size:7em; }
   </style>
</style>
</head>
<body>
<?php echocommondiv(); ?>
<ul class='menu'>
<?php
	$search =getrq('search'); 
	if ($fp =fopen("/opt/omxtv/tvchlist.txt", "r"))
	{
		$nr=0;
		while ($line =fgets($fp))
		{
			$nr++;
			if (!$search || stripos($line, trim($search)) !== false)
			echo "<li><a href='../tvcmd.php?cmd=PLAYCH%20$line'><span class='small'>$nr) </span>$line</a>";
		}
	}
?>
</ul>
<div id='divsearch'>
   <form method='get'>
      <input name='search' type='text' size='5' <?php if ($search) echo "value='$search'"; ?> />
      <input type='submit' value='Search'/>
   </form>
</div>
</body>
