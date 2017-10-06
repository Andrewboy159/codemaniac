<?php // Load MineQuery - Remastered Core
	require('../core.minequery-remastered.php');
	$minequery = new MineQueryRemastered;
?>

<!DOCTYPE html>

<html>
<head>
	<title>MineQuery Remastered</title>
	<link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
	<style>
	body {
		background-image: url("../images/background-image.png");
		background-size: cover;
		color: #002BFF;
		font-family: Lucida Sans Unicode;
	}
	p {
		margin-top: 40px;
		margin-bottom: 40px;
		font-size: 25px;
	}
	.semi-trans-top{
		opacity: 0.625;
		background: rgba(76,76,76,0.65);
		height: 675px;
		margin-top: 0px;
	}
	.semi-trans-bottom{
		opacity: 0.625;
		background: rgba(76,76,76,0.65);
		height: 150px;
		margin-top: 0px;
	}
	a:link {
		text-decoration: none;
		color: #002473;
	}
	a:visited {
		text-decoration: none;
		color: #002473;
	}
	a:hover {
		text-decoration: none;
		cursor: pointer;
		color: #FFFFFF;
	}
	a:active {
		text-decoration: none;
		background-color: #002473;
		color: #FFFFFF;
	}
	</style>
</head>
	<body>
		<p class="text-center">Here's an example for what you may put on your site:</p>
		<br><br><br><br>
		<?=$minequery::status("us.mineplex.com"); ?>
	</body>
</html>
