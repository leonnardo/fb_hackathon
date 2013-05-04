<?php
    require_once("src/facebook.php");
    $config = array();
    $config['appId'] = '515665795165016';
    $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
    $fb = new Facebook($config);

    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
    $inst1 = $fb->api('/'.$id1,'GET');
    $name1 = $inst1['name'];
    $inst2 = $fb->api('/'.$id2,'GET');
    $name2 = $inst2['name'];
    $str = "add_debt.php?id1=" . $id1 . "&id2=" . $id2;
    if (!$_POST['value']) {
?>
 <form action="<?php echo $str ?>" method="POST">
    <input type="radio" name="type" value="deve">Esse canalha me deve!<br />
    <input type="radio" name="type" value="devendo">Eu que sou o otário que tá devendo<br />
    Quanto? <input type="text" name="value">

    <input type="submit" value="Cobra esse canalha!">
</form>
<?php
   } else {
        $conn = mysqli_connect("localhost","root","12345","youownme");
        if (mysqli_connect_errno($conn)) {
            echo "Desencana!";
           die();
        }
        if ($_GET['id1'] && $_GET['id2'] && $_POST['value']) {
            if ($_POST['type'] == 'devendo')
                $mult = -1;
            else
                $mult = 1;
            $valor = $mult*floatval($_POST['value']);
            $query = "INSERT INTO t_debts (id1,id1_name,id2,id2_name,valor) VALUES ('$id1', '$name1', '$id2', '$name2', '$valor')";
            if (!mysqli_query($conn,$query)) {
                die('Error: ' . mysqli_error($conn));
            }
            echo "<a href=./>Voltar a pagina inicial</a>";
            mysqli_close($conn);
        }
   }
?>

