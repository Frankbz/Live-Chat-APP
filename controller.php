<?php
    session_start();
    include_once "php/config.php";
    require_once "google_config.php";

    if (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    }
    else{
        header('Location: index.php');
        exit();
    }
    
    
    $oAuth = new Google\Service\Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    $unique_id = $userData['id'];
    $name = $userData['name'];
    $email = $userData['email'];
    $password = $userData['email'];
    $status = "Online";
   

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) == 0){ // sign up
        $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, email, password, img, status)
                        VALUES ({$unique_id}, '{$name}', '{$email}', '{$password}', '1.png', '{$status}')");
        if ($insert_query){
            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                }
            }
    }
    else{ // log in
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if (mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            // Update status for user in database
            $sql2 = mysqli_query($conn, "UPDATE users SET status = 'Online' WHERE unique_id={$row['unique_id']}");
            if ($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
            }
        }
    }

    header("Location: users.php");
    

   
?>