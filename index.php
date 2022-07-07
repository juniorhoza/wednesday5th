<?php
if (isset($_POST['name']) && isset($_POST['password'])) {


    function validate($data)
    {
        
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['name']);
    $password = validate($_POST['password']);
    

    if (empty($uname)) {
        header("location:index.php?error=User name is required");
        exit();
    } else if (empty($password)) {
        header("location:index.php?error=password is required");
        exit();
    } else {
        session_start();
        $_SESSION['name']=$uname;
        $conn=mysqli_connect("localhost","root","","camtrack") or die("unable to connect to database, it may be a  400 and 500 error");
        $query="SELECT * FROM cam WHERE username='$uname' AND password=sha(MD5('$password'));";
         $result=mysqli_query($conn,$query) or die("error during query");
         if(mysqli_num_rows($result)<1){
            header("location:index.php?error=you do not have an account registered consider signing up ");
         }
         else{
             header("location:activities.php");
         }
         
    }

    // $conn=mysqli_connect("localhost","root","","camtrack") or die("unable to connect to database, it may be a  400 and 500 error");
    // $query="SELECT products.id FROM products WHERE products.id = ?;";
    //  $result=mysqli_query($conn,$query) or die("error during query");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=google">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login cam track</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <main class="mn">

        <section class="left">
            <img src="img/logo.png" alt="">
        </section>
        <section class="right pi">
            <img src="img/logo.png" alt="" class="ko">
            <h1 class="login">login</h1>

            <form action="index.php" method="POST">
                <!-- <label for="name">UserName  </label> -->
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="err"><?php echo $_GET['error'] ?></p>
                        <?php } ?>
                <input type="text" name="name" id="name" autocomplete="false" autofocus placeholder="UserName">
                <label for="namea"></label>
                <input type="password" name="password" id="password" placeholder="password">
                <label for="password"></label>
                <input type="submit" value="Login" id="submit" name="login">
                <p>do no have an account? <a href="signin.php">sign up</a></p>
            </form>


        </section>
    </main>
    <script>


    </script>

</body>

</html>