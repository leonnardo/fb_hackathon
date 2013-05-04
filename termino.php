<?php
	
	$sql_server = "localhost";  // host do mysql
	$sql_login = "root";       // usu�rio
	$sql_password = "12345";     // senha do usu�rio
	$sql_database = "youownme"; // nome da base de dados
		
	$cn = mysql_connect($sql_server, $sql_login, $sql_password) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");
	
	$bd = mysql_select_db($sql_database) or die();

	$id = $_GET;
	$query = mysql_query("UPDATE `youownme`.`t_debts` SET status='2' WHERE id='{$id}'");	

	mysql_close($cn);

?>
