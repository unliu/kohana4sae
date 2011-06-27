<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="zh">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $title ?></title>
		<!-- Framework CSS --> 
    	<link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>media/css/blueprint/screen.css" type="text/css" media="screen, projection">
    	<link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>media/css/style.css" type="text/css" media="screen, projection">  
    	<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>media/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]--> 
    	<link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>media/css/blueprint/print.css" type="text/css" media="print">
    	<link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>media/css/sexybuttons/sexybuttons.css" type="text/css" media="screen, projection">
    	<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.4.4/jquery.min.js" ></script>
	</head>
	<body>
		<div class="container">
			<h1 class="span-24"><?php echo $title ?></h1>
			<div id="content" class="span-24">
				<?php echo $content?>
			</div>
		</div>
	</body>
</html>