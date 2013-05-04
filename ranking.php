<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>You Owe Me!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">

<style>

	.btn-large{
	font-size:20px;
	width: 400px;
	padding: 15px;
	margin: 20px;
	}

  .idv{
    margin: auto;
  }

	.idv-info{
	font-family: Myriad Pro, "My", Trebuchet MS, Arial, sans-serif;
	display:inline-block;
	vertical-align: top;
	text-align: left;
	}
	.idv-name{
	font-weight: bold;
	padding-bottom: 2px;
	font-size: 29px;
	}
	.idv-ranking{
	font-size: 32px;
	font-weight: bold;
	color: red;
	}
	.idv-date{
	font-size: 18px;
	padding-left: 2px;
	}


	.tb-title{
	font-size:38px;
	}

	#prf-img{
	width:200px;
    }

      .prf {
	margin-bottom: 20px;
	width: 90px;
	}

      /* Main message and sign up button */
      .jumbotron {
        margin: 30px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 80px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* NAV BAR */

      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar {
		margin-top: 20px;
	  }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
	 #zoeira {
		width: 500px;
	 }
   .test {
    text-align: center;
   }
</style>

<script>
function changeButton()
{
document.getElementById("t").innerHTML=document.getElementById("x").firstChild.nodeValue;
}
function changeButton2()
{
document.getElementById("t").innerHTML="Total Debts";
}
function changeButton3()
{
document.getElementById("t").innerHTML="Reputation";
}
</script>

<!--// plugin-specific resources //-->
	<script src='star/jquery.js' type="text/javascript"></script>
	<script src='star/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='star/jquery.rating.js' type="text/javascript" language="javascript"></script>
 <link href='star/jquery.rating.css' type="text/css" rel="stylesheet"/>
 <!--// documentation resources //-->
 <!--<script src="http://code.jquery.com/jquery-migrate-1.1.1.js" type="text/javascript"></script>-->
 <link type="text/css" href="/@/js/jquery/ui/jquery.ui.css" rel="stylesheet" />
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
 <link href='documentation/documentation.css' type="text/css" rel="stylesheet"/>
	<script src='documentation/documentation.js' type="text/javascript"></script>


  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">



    <!-- Navbar
    ================================================== -->
    <div class="container">

      <div class="masthead">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="ranking.html">Ranking</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

<div class ="container">
  <div class="jumbotron"><img align="left" src="http://www.obrigadopelospeixes.com/wp-content/uploads/2012/11/stewie.gif" width="100px" alt="tt">
<h1> Where's my money?!</h1><hr>
</div>
      <div class="row-fluid">





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

    $order = "rank_atual";

    $query = mysql_query("SELECT * FROM t_user ORDER BY '{$order}' DESC");

    $amigos = $facebook->api("/me/friends",'GET');

    $resultado = array();
    while ($res = mysql_fetch_array($query))
    {
      foreach ($amigos['data'] as $value) {
        if ($res['id'] == $value['id']) {
          array_push($resultado, array($res['id'],$res['nome'],$res[$order]));
          break;
        }
      }
    }
    mysql_close($cn);

?>



		<?php
          foreach($resultado as $value) {
    ?>
    <div class="idv" class="test"><span class="idv-img"><img src="<?php echo "http://graph.facebook.com/$value[0]/picture"; ?>" class="img-polaroid prf" alt="img"></span>
		<div class="idv-info"><span class="idv-name"><?php echo $value[1]; ?></span><br><span class="idv-ranking">
      <?php echo $value[2]; ?><br />
       </span><br></div></div>

  <?php } ?>
  </div>





    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>



  </body>
</html>
