<head>
<title>Menu <?php echo file_get_contents("/etc/hostname"); ?></title>
<style>
	ul { list-style-type: none; margin:0; padding:0; }
	a  { text-decoration: none; }
	a  { font-size: 4em; background: green; color: white; border-radius: .2em; padding:.1em; }
	li { margin: 1em; font-size:2em; }
</style>
</head>
<ul>
	<li><a href='tvcmd.php?cmd=POWERON'>Power ON</a>
	<li><a href='channels'>Channels</a>
	<li><a href='audio'>Audio</a>
	<li><a href='tvcmd.php?cmd=POWEROFF'>Power OFF</a>
</ul>
