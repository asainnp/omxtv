<head>
<title>Channels <?php echo file_get_contents("/etc/hostname"); ?></title>
<style>
	ul { list-style-type: none; margin:0; padding:0; }
	a  { text-decoration: none; }
	a  { font-size: 2em; background: blue; color: white; border-radius: .2em; padding:.1em; }
	li { margin: 1em; font-size:2em; }
</style>
</head>
<ul>
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
