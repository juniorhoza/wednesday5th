<?php
 

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['age'])&&isset($_POST['sex'])){
    $submit=$_POST['submit'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $password=$_POST['password'];
    $sex=$_POST['sex'];
  
    if (empty($fname)) {
        header("location:signin.php?error=first name is required");
        exit();
    } else if (empty($lname)) {
        header("location:signin.php?error=last name is required");
        exit();
    }
    else if (empty($name)) {
        header("location:signin.php?error=user name is required");
        exit();
    }
    else if (empty($age)) {
        header("location:signin.php?error=age is required");
        exit();
    }
    else if (empty($password)) {
        header("location:signin.php?error=password is required");
        exit();
    }else{
        //connection
        $conn=mysqli_connect("localhost","root","","camtrack") or die("unable to connect to database, it may be a  400 and 500 error");
//queries
        $sql="SELECT 1 FROM cam WHERE  username= '$name';";
       
        $query="INSERT INTO cam (firstName, lastName, username, age, sex,password)  VALUES ('$fname','$lname','$name','$age','$sex',sha(md5('$password')));";
    //end queries
     $result=mysqli_query($conn,$sql);

     if(mysqli_num_rows($result)<1){
         $put=mysqli_query($conn,$query);
     }
     else{
        header("location:signin.php?error=user name already taken");
        exit();
     }
     mysqli_close($conn);
     
     header("location:index.php");
  }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main class="sec">

        <section class="left">
           <img src="img/logo.png" alt="">
        </section>
        <section class="right">
        <img src="img/logo.png" alt="" class="ko">
               <h1 class="login lo">sign in</h1>
               <p class="welc"> welcome to Cam Track</p>

            <form action="signin.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                    <p class="err"><?php echo $_GET['error'] ?></p>
                <?php } ?>
                <div class="username">
                    <input type="text" name="fname" id="Firstname" autocomplete="false" autofocus placeholder="First Name*">
                    
                    <input type="text" name="lname" id="Lastname" autocomplete="false" autofocus placeholder="Last Name*">
                </div>
                <div class="laa">

                    <label for="Firstname" class="lab"></label>
                    <label for="Lastname" class="lab"></label>
                </div>
                <!-- <label for="name">UserName  </label> -->
            <input type="text" name="name" id="name" autocomplete="false" autofocus placeholder="UserName*">
            <label for="namea"></label>

            <input type="password" name="password" id="password" placeholder="password*">
            <label for="password"></label>
            <div class="username">
                    <input type="number" name="age" id="age" autocomplete="false" autofocus placeholder="age" maxlength="3">
                    
                   <select name="sex" id="sex">
                    <option value="M">M</option>
                    <option value="F">F</option>
                   </select>
                  
                </div>
                <div class="laa">

                    <label for="age" class="lab"></label>
                    <label for="sex" class="lab"></label>
                </div>

            <input type="submit" name="submit" value="Submit" id="submit">
            <p>already have an account? <a href="index.php">log in</a></p>
            </form>


        </section>
    </main>
</body>
</html>