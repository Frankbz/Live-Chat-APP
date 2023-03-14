<?php
    require_once "google_config.php";
?>

<?php
    session_start();
    if (isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
    
?>

<?php include_once "header.php"; ?>

<body>
    <div class="background">
        <div class="shape1"></div>
        <div class="shape2"></div>
    <div class="wrapper">
        <section class="form signup">
            <header>Live Chat App</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off"> 
                <div class="error-text"></div>
                
                <button  onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="go">Log in with Google</button>

                <div class="name-details">
                    <div class="field input">
                        <label>Name</label>
                        <input type="text" name ="name" placeholder="Name" required>
                    </div>

                    <div class="field input">
                        <label>Email</label>
                        <input type="text" name ="email" placeholder="Enter your email" required>
                    </div> 

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name ="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field image">
                        <label>Select your cover</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Sign Up">
                    </div>
                </div>
                
            </form>

            <div class="link">Already signed up? <a href="#"><a href="login.php">Login here</a></div>
        </section>
    </div>
    <script src="javascript/hide_show_password.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>