<?php
    require_once "google_api/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("683716139381-vi1lstf1vosi497ln1v4qkmgd1g28vbt.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("Google Login");
    $gClient->setRedirectUri("http://localhost:180/LiveChatApp2/controller.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    $login_url = $gClient->createAuthUrl();
?>