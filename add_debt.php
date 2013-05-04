<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
        require_once("src/facebook.php");
        $config = array();
        $config['appId'] = '515665795165016';
        $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
        $fb = new Facebook($config);
        $id1 = $fb->getUser();
        $user_profile = $fb->api('/me','GET');
        $name1 = $user_profile['name'];
        $valor = $_POST['value'];
        $friends = $fb->api('/me/friends','GET');
        $sql_server = "localhost";  // host do mysql
        $sql_login = "root";       // usu�rio
        $sql_password = "12345";     // senha do usu�rio
        $sql_database = "youownme"; // nome da base de dados

        foreach ($friends['data'] as $value) {
            if ($value['name'] == $_POST['nome']) {
                $id2 = $value['id'];
                $name2 = $value['name'];
                break;
            }
        }
        if (!$_POST['value']) {
    ?>

    <?php
       } else {
            $conn = mysqli_connect("localhost","root","12345","youownme");
            if (mysqli_connect_errno($conn)) {
                echo "Desencana!";
               die();
            }
            $cn = mysql_connect($sql_server, $sql_login, $sql_password) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");
            $bd = mysql_select_db($sql_database) or die();
            if ($id1 && $id2 && $valor) {
                $query = mysql_query("SELECT * FROM t_user WHERE id={$id1}");
                if (mysql_num_rows($query) == 0) {
                    echo "Desencana!";
                    mysql_query("INSERT INTO t_user (id, nome, rank, rank_atual, num_trans, tempo_total, quantia_total)
                        VALUES ('$id1', '$name1',0, 0, 0, 0, 0)");
                }
                $query = mysql_query("SELECT * FROM t_user WHERE id={$id2}");
                if (mysql_num_rows($query) == 0) {
                    echo "desencana?";
                    mysql_query("INSERT INTO t_user (id, nome, rank, rank_atual, num_trans, tempo_total, quantia_total)
                        VALUES ('$id2', '$name2',0, 0, 0, 0, 0)");
                }
                mysql_close($cn);
                if ($_POST['optionsRadios'] == 'devendo')
                    $mult = -1;
                else
                    $mult = 1;
                $valor_final = $mult*floatval($valor);
                $query = "INSERT INTO t_debts (id1,id1_name,id2,id2_name,valor,status) VALUES ('$id1', '$name1', '$id2', '$name2', '$valor_final','1')";
    						if ($mult == 1) $who = $id2;
    						else $who = $id1;
    						$q = mysql_query("UPDATE `youownme`.`t_user` SET valor_total = valor_total + {$valor} WHERE id='{$who}'");
                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
                echo "<a href=./>Voltar a pagina inicial</a>";
                mysqli_close($conn);
            }

    				//notificar nova divida
       }

     header("Location: http://localhost/~leonnardo/");
    ?>
</body>
</html>
