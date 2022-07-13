<?php
session_start();



if(!isset($_SESSION['name'])){
   
  header("location:index.php");
}
else{
    $name= $_SESSION['name'];
    $_SESSION=array();
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cam track</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    
    
    <section class="main">
        <div class="circle">
            
            </div>
            <div class="upper">
                <?php
            
            printf('<p class="verif"> logged in as  <span class="inner-verif">'.$name.'</span> </p>');
            printf('<p class="verif la"><a href="index.php">log out</a></p>');
            ?>
            <div class="title">
               <img src="img/logo.png" alt="logo" class="logo_img">
               <div class="line"></div>
               <p> Outil De Diagnostic Gestion <br> Flottes camtrack</p>
            </div>
        </div>

        <div class="activities">
            <div class="group g1">
                <div class="box">
                    <div class="innerbox">
                        <img src="img/ic_poll_24px.svg" alt="">
                    </div>
                     <p><a href="form/index.html">outil de <br> gestion & suivi</a> </p>
                </div>
                <div class="box" style="background-color: #1976D2;">
                    <div class="innerbox" style="background-color: #3F9CF8E5;">
                        <img src="img/Groupe 1.svg" alt="">
                    </div>
                    <p>gestion des<br> chauffeurs</p>

                </div>
            </div>
            <div class="group g1">
                <div class="box" style="background-color: #1976D2;">
                    <div class="innerbox" style="background-color: #449FF8;">
                        <img src="img/ic_ev_station_24px-1.svg" alt="">
                    </div>
                    <p>gestion des <br> vehicules</p>
                </div>
                <div class="box" style="background-color: #01ACE2;">
                    <div class="innerbox" style="background-color: #0fbbf0;">
                        <img src="img/ic_ev_station_24px-1.svg" alt="">
                    </div>
                    <p>exploitation</p>

                </div>
            </div><div class="group g1">
                <div class="box" style="background-color: #1976D2;">
                    <div class="innerbox" style="background-color: #449FF8;">
                        <img src="img/ic_ev_station_24px-1.svg" alt="">
                    </div>
                    <p>securite</p>
                </div>
                <div class="box" style="background-color: #1976D2;">
                    <div class="innerbox" style="background-color: #3F9CF8E5;">
                        <img src="img/ic_ev_station_24px-1.svg" alt="">
                    </div>
                    <p>gestion des <br> vehicules</p>

                </div>
            </div>
           
        </div>
    </section>
    <footer>
       <p>copyright &copy; <span class="year"></span> CAMTRACK SAS all rights reserved </p>

    </footer>
    
    <script>
        let year=document.querySelector(".year")
        let date= new Date().getFullYear()
        year.textContent=date
    </script>
</body>
</html>