<?php
	require("config.php");
	// Create Connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn) {
		$boxMsg = 'Failed to connect, please try again later.';
		$boxMsgClass = 'alert-danger';
	}
