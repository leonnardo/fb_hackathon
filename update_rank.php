<?php

	// set the default timezone to use. Available since PHP 5.1
	date_default_timezone_set('UTC');

	$sql_server = "localhost";  // host do mysql
	$sql_login = "root";       // usu�rio
	$sql_password = "12345";     // senha do usu�rio
	$sql_database = "youownme"; // nome da base de dados

	$cn = mysql_connect($sql_server, $sql_login, $sql_password) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");

	$bd = mysql_select_db($sql_database) or die();

	$query = mysql_query("SELECT id1,id2,valor,data_inicio FROM `youownme`.`t_debts` WHERE status='1'");

	$curr_time = date("d") + 30*date("m") + 365*date("Y");
	//$cnt = array();
	//$new_rank = array();
	unset($cnt);
	unset($new_rank);
	while ($res = mysql_fetch_array($query))
	{
		if ($res['valor'] > 0) $who = $res['id2'];
		else $who = $res['id1'];
		if (!isset($cnt[$who])) {
			$cnt[$who] = 1;
			$data = $res['data_inicio'];
			$diff = $curr_time - ($data['d'] + 30*$data['m'] + 365*$data['Y']);
			$val = $res['valor'];
			if ($val < 0) $val *= -1;
			if ($diff == 0) $new_rank[$who] = 10;
			else $new_rank[$who] = min(100,$val/$diff);
		} else {
			$cnt[$who]++;
			$data = $res['data_inicio'];
			$diff = $curr_time - ($data['d'] + 30*$data['m'] + 365*$data['Y']);
			$val = $res['valor'];
			if ($val < 0) $val *= -1;
			if ($diff == 0) $new_rank[$who] += 10;
			else $new_rank[$who] += min(100,$val/$diff);
		}
	}

	$query = mysql_query("SELECT id,rank,num_trans FROM `youownme`.`t_user`");

	while ($res = mysql_fetch_array($query))
	{
		$id = $res['id'];
		if (isset($cnt[$id])) {
			$new_rank[$id] += $res['rank']*$res['num_trans'];
			$new_rank[$id] /= $res['num_trans'] + $cnt[$id];
			$q = mysql_query("UPDATE `youownme`.`t_user` SET rank_atual='{$new_rank[$id]}', tempo_total=tempo_total+1 WHERE id='{$id}'");
		}
	}

	mysql_close($cn);

?>
