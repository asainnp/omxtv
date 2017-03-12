<?php require_once('common.php'); ?>
<head>
   <?php echotitle("OMX-TV"); ?>
   <title>OMX-TV <?php echo file_get_contents("/etc/hostname"); ?></title>
   <style>
      <?php echocommoncss(); ?>
      .menu a { background: red; }
   </style>
</head>
<body>
<?php echocommondiv(); ?>
<ul class='menu'>
	<li><a href='tvcmd.php?cmd=POWERON'>Power ON</a>
	<li><a href='channels'>Channels</a>
	<li><a href='audio'>Audio</a>
	<li><a href='tvcmd.php?cmd=POWEROFF'>Power OFF</a>
</ul>
</body>
