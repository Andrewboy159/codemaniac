<?php
    include("inc/header.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
        <title>Home</title>
		<style>
			body {
				background-image: url("images/background-image.png");
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
			a {
				color: #002BFF;
			}
			a:link {
				color: #002BFF;
			}
			a:visited {
				color: #002BFF;
			}
			a:hover {
				cursor: pointer;
				color: #002BFF;
			}
			a:active {
				background-color: #002BFF;
				color: #FFFFFF;
			}
		</style>
    </head>

    <body>
	<div class="semi-trans-top">
		<br><br><br><br><br><br><br><br>
        <h1 class="text-center">Welcome to <span style="color: #002BFF"><b>Code Maniac!</b></span></h1>
		<br><br><br><br><br><br>
			<p class="text-center"><span class="glyphicon glyphicon-menu-down" style="font-size: 2em"></span><p>
	</div>
		<br><br><br><br>
		<br><br><br><br>
		<p class="text-center">Here you will learn how to code in a number of languages! After you get the hang<br>
		of our site, you will be a master coder! You will learn to make things like computer games and applications, <br>
		iOS and Android games, applications, Web Applications, and Web Pages (Like this one).</p>

		<p class="text-center">There are two main ways to learn here: Posts, and Video Courses. <br>
		With Posts users will type out an informational forum post that is basically a typed out tutorial. <br>
		But with Video Courses users can ecord and upload video tutorials for specific topics for an <br>
		alternative and more interactive method to learn.</p>

		<p class="text-center">As this is a community site, almost every course will be made by<br>
		users like you. But there will be some made by us to give the users an idea of how to make them.<br>
		Wether they be made by users or us, all topics will fall into what's called a Branch. Branches are essentially<br>
		paths to take in the specified language(s). Any Branchs can go off the original course and lead to more<br>
		specific topics. Here is a visual reference:<br><br>
		</p>
		<img src="/images/diagram.png" style="display: block; margin: 0 auto; width: 75%; height:75%;">
    </body>
</html>
<?php
	include("inc/footer.html");
?>
