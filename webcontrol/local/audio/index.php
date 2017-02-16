<head>
<title>Audio <?php echo file_get_contents("/etc/hostname"); ?></title>
<style>
	ul { list-style-type: none; margin:0; padding:0; }
	a  { text-decoration: none; }
	a  { font-size: 4em; background: blue; color: white; border-radius: .2em; padding:.1em; }
	li { margin: 1em; font-size:2em; }
</style>
</head>
<ul>
	<li><a href='../tvcmd.php?cmd=MUTE'>MUTE</a>
	<li><a href='../tvcmd.php?cmd=UNMUTE'>UNMUTE</a>
	<li><a href='../tvcmd.php?cmd=VOLUMEUP'>UP</a>
	<li><a href='../tvcmd.php?cmd=VOLUMEDOWN'>DOWN</a>
	<li><a href='setvolume.php'>SET</a>
</ul>
