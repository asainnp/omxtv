<head>
<title>Set Volume on <?php echo file_get_contents("/etc/hostname"); ?></title>
<style>
	li,input { font-size:3em; } 
        ul { list-style-type: none; }
</style>
</head>
<form method='get' action='../tvcmd.php'>
	<input type='hidden' name='cmd' value='VOLUMESET'/>
	<ul>
	<li>volume in percents:
	<li><input type='text' name='par1' size='2' />%
	<li><input type='submit' value='SET' />
	<ul>
</form>
