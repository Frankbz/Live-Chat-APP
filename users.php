<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){ // if user not logged in
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="wrapper">
        <section class="users">
            <header>

            <?php // using unique _id to select all users' data
            include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>

                <div class="content">
                <img src="php/images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span> <?php echo $row['name']; ?></span>
                        <div class="online"><p> <?php echo $row['status']; ?> </p></div>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Log out</a>
            </header>
            <div class="search">
                <span class="text">Select user</span>
                <input type="text" placeholder="Type name to search">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>

</html>