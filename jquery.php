<html><head>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
</head>
<body>
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

      // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
      // for any auth related change, such as login, logout or session refresh. This means that
      // whenever someone who was previously logged out tries to log in again, the correct case below
      // will be handled.
      FB.Event.subscribe('auth.authResponseChange', function(response) {
        // Here we specify what we do with the response anytime this event occurs.
        if (response.status === 'connected') {
          // The response object is returned with a status field that lets the app know the current
          // login status of the person. In this case, we're handling the situation where they
          // have logged in to the app.
          testAPI();
        } else if (response.status === 'not_authorized') {
          // In this case, the person is logged into Facebook, but not into the app, so we call
          // FB.login() to prompt them to do so.
          // In real-life usage, you wouldn't want to immediately prompt someone to login
          // like this, for two reasons:
          // (1) JavaScript created popup windows are blocked by most browsers unless they
          // result from direct user interaction (such as a mouse click)
          // (2) it is a bad experience to be continually prompted to login upon page load.
          FB.login();
        } else {
          // In this case, the person is not logged into Facebook, so we call the login()
          // function to prompt them to do so. Note that at this stage there is no indication
          // of whether they are logged into the app. If they aren't then they'll see the Login
          // dialog right after they log in to Facebook.
          // The same caveats as above apply to the FB.login() call here.
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
                  var url = "https://graph.facebook.com/" + id + "/picture?type=normal";
                  console.log(url);
                  $("#mostra").html("<img src='" + url + "'>");
                }
                else {
                  console.log("ops!");
                }
              }
          });
        });
      }
  </script>
  <!--Below we include the Login Button social plugin. This button uses the JavaScript SDK to-->
  <!--present a graphical Login button that triggers the FB.login() function when clicked.-->
  <fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>

  <form>
    Nome: <input type="text" id="nome">
  </form>
  <div id="mostra"></div>
</body></html>