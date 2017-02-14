<head>
<title>GRUNDIG</title>
<style>
	ul { list-style-type: none; margin:0; padding:0; }
	a  { text-decoration: none; }
	a  { font-size: 2em; background: blue; color: white; border-radius: .2em; padding:.1em; }
	li { margin: 1em; font-size:2em; }
</style>
</head>
<ul>
<?php
	if ($fp =fopen("/home/asain/myscripts/tv/tvchlist.txt", "r"))
	{
		$nr=1;
		while ($line =fgets($fp))
		{
                     echo "<li>".($nr++).") <a href='changechannel.php?channel=$line'>$line</a>";
		}
	}
?>
</ul>
