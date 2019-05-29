<?php

error_reporting(~E_NOTICE);
session_start();

if($_POST['submitted'])
{
   require 'vendor/autoload.php'; // change path as needed

$fb = new Facebook\Facebook([
  'app_id' => '2040602096267840',
  'app_secret' => '2136a93836822aae9b37d5e1af886c2d',
  'default_graph_version' => 'v2.9',
  ]);

$token = '2040602096267840|tw7TnoG1aSVwPHQfint-OPp-TwI'; //see rest of answer

$message = 'You have people waiting to play';

$request = $fb->request('post', '/863337747342992/notifications?access_token='.$token.'&template='.$message);

$response = $fb->getClient()->sendRequest($request);


// Send the request to Graph
try {
  
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error neverthelss: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

$_SESSION['success'] = $graphNode['success'];

}

?>

<head>

     <title>Login with Facebook</title>

     <link

        href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"

        rel = "stylesheet">

  </head>

  <body>     

  <?php if($_SESSION['fb_id']) {?>

        <div class = "container">

         
              <ul class = "nav nav-list">

                 <h4>Image</h4>

                 <li><?php echo $_SESSION['fb_pic']?></li>

                 <h4>Facebook ID</h4>

                 <li><?php echo  $_SESSION['fb_id']; ?></li>

                 <h4>Facebook fullname</h4>

                 <li><?php echo $_SESSION['fb_name']; ?></li>

                 <h4>Facebook Email</h4>

                 <li><?php echo $_SESSION['fb_email']; ?></li>
                  <h4>Facebook Notification</h4>
                  <li><form  method="post" id="form1">
                                <button type="submit" name="submitted" value="Submit">Send Notification</button>
                        </form>
                    <?php if($_SESSION['success']) {?>    
                            Send Notification Successfully.
                    <?php } ?>


</li>
                
              </ul>

          </div>

<?php } ?>

  </body>

</html>