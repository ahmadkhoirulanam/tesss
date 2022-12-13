<?php
  
  //session_start();
 
function kirimemail($email,$nama,$subject,$pesan){
    require_once 'google/autoload.php'; // or wherever autoload.php is located
    
      $client = new Google_Client();
  //your gmail tied ClientId (aka Google Console)
      $client->setClientId("353334326180-sh1e1jnuniqe0tf17aedaavjotaoss44.apps.googleusercontent.com");
      $client->setClientSecret("niPIH9StiDL_VkSU331_-Uyp");
  //your gmail tied ClientId (aka Google Console)
      $client->setRedirectUri("http://localhost/training/apigmail");
      $client->setAccessType('offline');
      $client->setApprovalPrompt('force');
    
      $client->addScope("https://mail.google.com/");
      $client->addScope("https://www.googleapis.com/auth/gmail.compose");
      $client->addScope("https://www.googleapis.com/auth/gmail.modify");
      $client->addScope("https://www.googleapis.com/auth/gmail.readonly");
    
  $_SESSION['gmail_access_token'] = '{"access_token":"ya29.Glt4B8dzcIAko1fiFAo6FIGpJeZm7HfI92Xj5DRjVICyN5Uz2GgjKLiPEZRIqQXeTbau0qWEct80t4yPLUwkNXhg6rbzE_c5cadRMj11SXOiaslJhOXyNFoktI56","token_type":"Bearer","expires_in":3600,"refresh_token":"1\/bbJwuDjvY-BZw69FWa30IUhIp5lQJdihWhpv82DZB7ZSjlVAMfhNKqyTfXAxjKjc","created":1567499087}'; 
    

  if (isset($_SESSION['gmail_access_token']) && !empty($_SESSION['gmail_access_token']) ) {
    
      $client->setAccessToken($_SESSION['gmail_access_token']);
      $objGMail = new Google_Service_Gmail($client);

      $strSubject = $subject;
    
      $strRawMessage = "From: No-reply UPGRIS <no-reply@upgris.ac.id>\r\n";
      $strRawMessage .= "To: $nama <$email>\r\n";
      $strRawMessage .= 'Subject: =?utf-8?B?' . base64_encode($strSubject) . "?=\r\n";
      $strRawMessage .= "MIME-Version: 1.0\r\n";
      $strRawMessage .= "Content-Type: text/html; charset=utf-8\r\n";
      $strRawMessage .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";
      $strRawMessage .= "$pesan\r\n";
    
      //Users.messages->send - Requires -> Prepare the message in message/rfc822
      try {
          // The message needs to be encoded in Base64URL
          $mime = rtrim(strtr(base64_encode($strRawMessage), '+/', '-_'), '=');
         
          $msg = new Google_Service_Gmail_Message();
          $msg->setRaw($mime);
    
          //The special value **me** can be used to indicate the authenticated user.
          $objSentMsg = $objGMail->users_messages->send("me", $msg);
          return 1;
          //print('Message sent object');
          //print($objSentMsg);
    
      } catch (Exception $e) {
          print($e->getMessage());
          unset($_SESSION['gmail_access_token']);
      }
  }
  else {
      // Failed Authentication
      if (isset($_REQUEST['error'])) {
          //header('Location: ./index.php?error_code=1');
          //echo "error auth";
          return 0;
      }
      else{
          // Redirects to google for User Authentication
          $authUrl = $client->createAuthUrl();
          //header("Location: $authUrl");
          return 0;
      }
  }

}

  ?>