<?php
	include 'handler/conn.php';
	session_destroy();
	header('Location: ../index.php');
?>