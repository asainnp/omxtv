<?php require_once('../common.php'); ?>
<head>
   <?php echotitle("Set Volume on"); ?>
   <style>
        <?php echocommoncss(); ?>
	form li, form input { font-size:3em; } 
   </style>
</head>
<body>
<?php echocommondiv(); ?>
<form method='get' action='../tvcmd.php'>
	<input type='hidden' name='cmd' value='VOLUMESET'/>
	<ul>
	<li>volume in percents:
	<li><input type='text' name='par1' size='2' />%
	<li><input type='submit' value='SET' />
	<ul>
</form>
</body>
