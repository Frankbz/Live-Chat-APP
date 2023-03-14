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
        <section class="form login">
            <header>Live Chat App</header>
            <form action="#">
                <div class="error-text"></div>
                <button  onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="go">Log in with Google</button>
                <div class="name-details">

                    <div class="field input">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div> 

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <i class="fas fa-eye"></i>
                    </div>


                    <div class="field button">
                        <input type="submit" value="Log In">
                    </div>
                </div>
                
            </form>

            <div class="link">Have not signed up? <a href="index.php">Sign up here</a></div>
        </section>
    </div>
    <script src="javascript/hide_show_password.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>