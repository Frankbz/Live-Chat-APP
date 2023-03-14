<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($name) && !empty($email) && !empty($password)){
        // check email validation
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // check if email already exists
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0){
                echo "$email - This email already exists!";
            }
            else{ // check if user upload img
                if (isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name']; // temp name is used to save/move file in folders

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode); // get img extention

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if (in_array($img_ext, $extensions) === true){
                        $time = time(); // we use current time to rename user file
                        
                        // move the user img into our folder
                        $new_image_name = $time.$img_name;
                        if (move_uploaded_file($tmp_name, "images/".$new_image_name)){ // if move successfully
                            $status = "Online";
                            $rand_id = rand(time(),10000000);

                            // put data into datebase
                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, email, password, img, status)
                            VALUES ({$rand_id}, '{$name}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                            if ($insert_query){
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }
                                    else{
                                        echo "This email address doesn't exist!";
                                    }
                            }
                            else{
                                echo "Something went wrong!";
                            }
                        }
                        
                    }
                    else{
                        echo "Please select a jpg, jpeg or png img file!";
                    }
                }
                else{
                    echo "Please upload your cover!";
                }

            }

        }
        else
        {
            echo "$email - This is an invalid email!";
        }
    }
    else{
        echo "All inputs are required!";
    }
?>