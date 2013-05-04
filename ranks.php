<?php

    require_once("src/facebook.php");

    $config = array();
    $config['appId'] = '515665795165016';
    $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
    $config['fileUpload'] = false; // optional

    $facebook = new Facebook($config);
    $user_id = $facebook->getUser();

    $sql_server = "localhost";  // host do mysql
    $sql_login = "root";       // usu�rio
    $sql_password = "12345";     // senha do usu�rio
    $sql_database = "youownme"; // nome da base de dados

    $cn = mysql_connect($sql_server, $sql_login, $sql_password,$sql_database) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");

    $bd = mysql_select_db($sql_database) or die();

    $order = $_GET['order'];

    $query = mysql_query("SELECT * FROM t_user ORDER BY '{$order}' DESC");

    $amigos = $facebook->api("/me/friends",'GET');

    while ($res = mysql_fetch_array($query))
    {
    	foreach ($amigos['data'] as $value) {
    		if ($res['id'] == $value['id']) {
    			echo "'{$res['nome']}' '{$res[$order]}'<br/>";
    			break;
    		}
    	}
    }
    	mysql_close($cn);

?>
