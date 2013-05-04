<?php

	date_default_timezone_set('UTC');

	$sql_server = "localhost";  // host do mysql
	$sql_login = "root";       // usu�rio
	$sql_password = "12345";     // senha do usu�rio
	$sql_database = "youownme"; // nome da base de dados

	$cn = mysql_connect($sql_server, $sql_login, $sql_password) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");

	$bd = mysql_select_db($sql_database) or die();

	$id = $_GET['id_term'];
	$t = date('Y-m-d H:i:s');
	mysql_query("UPDATE `youownme`.`t_debts` SET status='0',data_fim='{$t}' WHERE id='{$id}'");
	$query = mysql_query("SELECT * FROM t_debts WHERE id={$id}");
	while ($res = mysql_fetch_array($query)) {
		$data = $res['data_inicio'];
		$diff = ($t['d'] + 30*$t['m'] + 365*$t['Y']) - ($data['d'] + 30*$data['m'] + 365*$data['Y']);
		$val = $res['valor'];
		if ($val < 0) $val *= -1;
		if ($diff == 0) $new_rank = 10;
		else $new_rank = min(100,$val/$diff);
	}
	$q = mysql_query("UPDATE t_user SET num_trans=num_trans+1,rank=({$res['rank']}+{$new_rank})/({$res['num_trans']}+1.0)");

	//notificar fim da divida

	mysql_close($cn);

?>
