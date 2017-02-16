<head>
<title>OMX-TV</title>
<link rel='icon' href='omxtvicon.png' />
<style>
	ul { list-style-type: none; margin:0; padding:0; }
	a  { text-decoration: none; }
	a  { font-size: 4em; background: red; color: white; border-radius: .2em; padding:.1em; }
	li { margin: 1em; font-size:2em; }
</style>
</head>
<ul>
<?php
	if ($fp =fopen("/etc/omxtv/tvaddresses", "r"))
	{
		$nr=0;
		while ($line =fgets($fp))
		{
			$nr++;
			echo "<li><a href='http://$line/tv/local'>TV device $nr </a> ($line)";
		}
	}
?>
</ul>
