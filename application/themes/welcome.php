<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
	<title>UnivShop - <?php echo $titre; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
	<?php foreach($css as $url): ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
	<?php endforeach; ?>



	<link rel="stylesheet" type="text/css" href=<?php echo css_url("bootstrap.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("font-awesome.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("material-design-iconic-font.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("animate") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("hamburgers.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("animsition.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("select2.min") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("daterangepicker") ?>>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("util")?>>
	<link rel="stylesheet" type="text/css" href=<?php echo css_url("main")?>>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</head>

<body>
<div id="contenu">
	<?php echo $output; ?>
</div>

<?php foreach($js as $url): ?>
	<script type="text/javascript" src="<?php echo $url; ?>"></script>
<?php endforeach; ?>


<script src=<?php echo js_url("jquery-3.2.1.min") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("animsition.min") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("popper") ?>></script>
<script src=<?php echo js_url("bootstrap.min") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("select2.min") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("moment.min") ?>></script>
<script src=<?php echo js_url("daterangepicker") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("countdowntime") ?>></script>
<!--===============================================================================================-->
<script src=<?php echo js_url("main") ?>></script>

</body>

</html>
