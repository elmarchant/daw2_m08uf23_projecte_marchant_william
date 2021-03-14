<?php
	$title = 'default';
	$html = '<h1>default</h1>';
	require './controller/pageHandler.php';
	require './controller/sessionHandler.php';
	require	$path;
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
</head>
<body>
	<?php
		echo $html;
	?>
</body>
</html>