<?php require_once('../common.php'); ?>
<head>
   <?php echotitle("Audio"); ?>
   <title>Audio <?php echo file_get_contents("/etc/hostname"); ?></title>
   <style>
      <?php echocommoncss(); ?>
      .menu a { background: green; }
   </style>
</head>
<body>
<?php echocommondiv(); ?>
<ul class='menu'>
	<li><a href='../tvcmd.php?cmd=MUTE'>MUTE</a>
	<li><a href='../tvcmd.php?cmd=UNMUTE'>UNMUTE</a>
	<li><a href='../tvcmd.php?cmd=VOLUMEUP'>UP</a>
	<li><a href='../tvcmd.php?cmd=VOLUMEDOWN'>DOWN</a>
	<li><a href='setvolume.php'>SET</a>
</ul>
</body>
