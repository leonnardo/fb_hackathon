<?php
  require_once("src/facebook.php");

  $config = array();
  $config['appId'] = '515665795165016';
  $config['secret'] = 'bc90a12759846175b5c173dbfd37a199';
  $config['fileUpload'] = false; // optional

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
  <html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $user_profile = $facebook->api('/me','GET');
        $friends = $facebook->api('/me/friends','GET');
        $id = $user_profile['id'];
        echo "<a href='list_debts.php?id=".$id."'>Lista das dívidas</a><br />"; 
        echo "Name: " . $user_profile['name'] . "<br />";
        foreach($friends['data'] as $value) {
            echo "<a href='add_debt.php?id1=" . $id . "&id2=" . $value['id'] . "'>" . $value['name'] . "</a><br/>";
        }
        //print_r($friends);
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl();
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }
    } else {
      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>

  </body>
</html>