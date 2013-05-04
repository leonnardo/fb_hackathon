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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

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
  #rdio{
    width: 50px;
  }

	.btn-large{
	font-size:20px;
	width: 400px;
	padding: 15px;
	margin: 20px;
	}

	.idv-info{
	font-family: Myriad Pro, "My", Trebuchet MS, Arial, sans-serif;
	display:inline-block;
	vertical-align: top;
	}
	.idv-name{
	font-weight: bold;
	padding-bottom: 2px;
	font-size: 29px;
	}
	.idv-debt{
	font-size: 32px;
	font-weight: bold;
	color: red;
	}
	.idv-date{
	font-size: 18px;
	padding-left: 2px;
	}

	.idv-credt{
	font-size: 32px;
	font-weight: bold;
	color:green;
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
        font-size: 100px;
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
      .ui-autocomplete-input {
  border: none;
  font-size: 14px;

  height: 24px;
  margin-bottom: 5px;
  padding-top: 2px;
  border: 1px solid #DDD !important;
  padding-top: 0px !important;
  z-index: 1511;
  position: relative;
}
.ui-menu .ui-menu-item a {
  font-size: 12px;
}
.ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1051 !important;
  float: left;
  display: none;
  min-width: 160px;
  _width: 160px;
  padding: 4px 0;
  margin: 2px 0 0 0;
  list-style: none;
  background-color: #ffffff;
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.2);
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  *border-right-width: 2px;
  *border-bottom-width: 2px;
}
.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;
    text-decoration: none;
}
.ui-state-hover, .ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
}
</style>
<script>
 <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>


  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
   <div id="fb-root"></div>
  <script type="text/javascript">
      var arr;
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '515665795165016', // App ID
          channelUrl : '//localhost/~leonnardo', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });
        FB.Event.subscribe('auth.authResponseChange', function(response) {

          if (response.status === 'connected') {

            testAPI();
          } else if (response.status === 'not_authorized') {
            FB.login();
          } else {
            FB.login();
          }
        });
        };

        // Load the SDK asynchronously
        (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         ref.parentNode.insertBefore(js, ref);
        }(document));

        function findValue(array, key) {
          for (var i = 0; i < array.length; i++) {
            if (array[i] === key) return i;
          }
          return -1;
        }
        // Here we run a very simple test of the Graph API after login is successful.
        // This testAPI() function is only called in those cases.
        function testAPI() {
          nomes = new Array();
          ids = new Array();
          FB.api('/me/friends', function(response) {
            for(i = 0; i < response.data.length; i++) {
              nomes.push(response.data[i].name);
              ids.push(response.data[i].id);
            }
            $("#nome").autocomplete({
              source: nomes,
              select: function(event, ui) {
                  key = findValue(nomes,this.value);
                  if (key != -1) {
                    var id = ids[key];
                    var url = "https://graph.facebook.com/" + id + "/picture?width=200&height=200";
                    console.log(url);
                    $("#profile_photo").html("<img src='" + url + "'>");
                  }
                  else {
                    console.log("ops!");
                  }
                }
            });
          });
        }
  </script>
    <?php
    require_once("src/facebook.php");
    $config = array();
    $config['appId'] = '515665795165016';
    $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
    $fb = new Facebook($config);
    $user_id = $fb->getUser();

    if ($user_id) {
        $sql_server = "localhost";  // host do mysql
        $sql_login = "root";       // usu�rio
        $sql_password = "12345";     // senha do usu�rio
        $sql_database = "youownme"; // nome da base de dados
        $cn = mysql_connect($sql_server, $sql_login, $sql_password,$sql_database) or die("<br><center>Nao foi possivel conectar ao servidor " . mysql_error() . "</center>");

        $bd = mysql_select_db($sql_database) or die();

        // QUERY QUE MOSTRA QUEM TA ME DEVENDO
        $query = mysql_query("SELECT id,id1,id2,id1_name,id2_name,valor,data_inicio FROM `youownme`.`t_debts` WHERE ((id1={$user_id} AND valor>0) OR (id2={$user_id} AND valor<0)) AND status='1'");
        $resultado_creditos = array();
        if (mysql_num_rows($query) != 0) {
            while ($res = mysql_fetch_array($query)) {
                array_push($resultado_creditos,array($res['id'],$res['id2'],$res['id2_name'],$res['valor'],$res['data_inicio']));
            }
        }
        //////////////////////

        //SHOW DIVIDAS
        $query = mysql_query("SELECT id,id1,id2,id1_name,id2_name,valor,data_inicio FROM `youownme`.`t_debts` WHERE ((id1={$user_id} AND valor<0) OR (id2={$user_id} AND valor>0)) AND status='1'");
        $resultado_debitos = array();
        if (mysql_num_rows($query) != 0) {
            while ($res = mysql_fetch_array($query))
            {
                array_push($resultado_debitos,array($res['id'],$res['id2'],$res['id2_name'],$res['valor'],$res['data_inicio']));
            }
        }
        //////////////////////
    }
?>

    <!-- Navbar
    ================================================== -->
    <div class="container">

      <div class="masthead">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="casa.php">Home</a></li>
                <li><a href="ranking.html">Ranking</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

<div class ="container">
  <div class="jumbotron">
<h1> You Owe Me! </h1><hr>
</div>

      <div class="row-fluid">
        <div class="span6">
          <h2 class="tb-title">Debts</h2>
		<?php foreach($resultado_debitos as $value) { ?>
    <div class="idv" id="test"><span class="idv-img"><img src="<?php echo "https://graph.facebook.com/$value[1]/picture?width=200&height=200"; ?>" class="img-polaroid prf" alt="img"></span>
		<div class="idv-info">
      <span class="idv-name"><?php echo $value[2]; ?></span><br>
      <span class="idv-debt"><?php $a = -1*$value[3]; echo "R\$$a"; ?></span><br>
      <span class="idv-date"><?php echo $value[4]; ?></span></div></div>
    <?php } ?>

        </div>

        <div class="span6">
          <h2 class="tb-title">Credits</h2>
          <?php foreach($resultado_creditos as $value) { ?>
    <div class="idv" id="test"><span class="idv-img"><img src="<?php echo "https://graph.facebook.com/$value[1]/picture?width=200&height=200"; ?>" class="img-polaroid prf" alt="img"></span>
    <div class="idv-info">
      <span class="idv-name"><?php echo $value[2]; ?></span><br>
      <span class="idv-credt"><?php echo "R\$$value[3]"; ?></span><br>
      <span class="idv-date"><?php echo $value[4]; ?></span></div></div>
    <?php } ?>
       </div>
      </div>

</div>



<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel" align="center">New Debt</h3>
            </div>
            <div class="modal-body">
	<div id="profile_photo"><img src="assets/img/prof.jpg"  alt="img" class="img-polaroid"></div>
	<form action="add_debt.php" method="POST">
  	    <fieldset>
    		  <label>Name</label>
     		 <input type="text" id="nome" name="nome" placeholder="Type your friend's name..."><br>
     		 <label>Quantity</label>
     		 <input type="text" id="value" name="value" onkeypress="return isNumberKey(event)" placeholder="How much?"><br>
  	    </fieldset>
        <div id="rdio">
        <label class="radio"><input type="radio" name="optionsRadios" value="deve">Debt</label>
        <label class="radio"><input type="radio" name="optionsRadios" value="devendo">Credit</label>
        </div>
        </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" align="center" value="Submit">
            </div>
  </form>
          </div>
          <div style="text-align: center">
            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">New Entry</a>
          </div>

    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <p>Designed and built with all the love in the world by Ruanzera, Bigueira, Igao e Clitz</a></p>
       </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
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
