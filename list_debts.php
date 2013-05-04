<?php
    require_once("src/facebook.php");
    $user_id = $_GET['id'];
    $config = array();
    $config['appId'] = '515665795165016';
    $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
    $fb = new Facebook($config);

    if ($user_id) {
        $sql_server = "localhost";  // host do mysql
        $sql_login = "root";       // usu�rio
        $sql_password = "12345";     // senha do usu�rio
        $sql_database = "youownme"; // nome da base de dados
        $cn = mysql_connect($sql_server, $sql_login, $sql_password,$sql_database) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");

        $bd = mysql_select_db($sql_database) or die();

        //SHOW CREDITOS
        $query = mysql_query("SELECT id1,id2,id1_name,id2_name,valor FROM `youownme`.`t_debts` WHERE ((id1={$user_id} AND valor>0) OR (id2={$user_id} AND valor<0)) AND status='1'");

        if (mysql_num_rows($query) != 0) {
            echo "Seus devedores!<br/>";
            while ($res = mysql_fetch_array($query))
            {
                if ($res['id1'] == $user_id) $who = $res['id2_name'];
                else $who = $res['id1_name'];
                echo "{$who} te deve {$res['valor']}<br/>";
            }
        } else echo "Ninguem te deve!<br/>";
        //////////////////////

        //SHOW DIVIDAS
        $query = mysql_query("SELECT id1,id2,id1_name,id2_name,valor FROM `youownme`.`t_debts` WHERE ((id1={$user_id} AND valor<0) OR (id2={$user_id} AND valor>0)) AND status='1'");

        if (mysql_num_rows($query) != 0) {
            echo "Voce deve para:<br/>";
            while ($res = mysql_fetch_array($query))
            {
                if ($res['id1'] == $user_id) $who = $res['id2_name'];
                else $who = $res['id1_name'];
                echo "Voce deve {$res['valor']} para {$who}<br/>";
            }
        } else echo "Voce nao deve pra ninguem!<br/>";
        //////////////////////
    }
?>
<p><a href='./'>Voltar para página principal</a></p>
